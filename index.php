<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM Machine</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        h1 {
            color: #333;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to ID Bank</h1>
        <button onclick="performAction('deposit')">Deposit</button>
        <button onclick="performAction('withdraw')">Withdraw</button>
        <button onclick="performAction('balance')">Balance Check</button>
        <button onclick="performAction('statement')">Mini Statement</button>
        <div class="result" id="result"></div>
    </div>

    <script>
        function performAction(action) {
            let amount;
            switch(action) {
                case 'deposit':
                    amount = prompt("How much do you want to deposit?");
                    if (amount) {
                        fetch(`index.php?action=deposit&amount=${amount}`)
                            .then(response => response.text())
                            .then(data => document.getElementById('result').innerText = data);
                    }
                    break;
                case 'withdraw':
                    amount = prompt("How much do you want to withdraw?");
                    if (amount) {
                        fetch(`index.php?action=withdraw&amount=${amount}`)
                            .then(response => response.text())
                            .then(data => document.getElementById('result').innerText = data);
                    }
                    break;
                case 'balance':
                    fetch('index.php?action=balance')
                        .then(response => response.text())
                        .then(data => document.getElementById('result').innerText = data);
                    break;
                case 'statement':
                    fetch('index.php?action=statement')
                        .then(response => response.text())
                        .then(data => document.getElementById('result').innerText = data);
                    break;
                default:
                    document.getElementById('result').innerText = "Invalid action";
            }
        }
    </script>
</body>
</html>

<?php
session_start();

if (!isset($_SESSION['balance'])) {
    $_SESSION['balance'] = 5000; // Example initial balance
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'deposit':
            if (isset($_GET['amount'])) {
                $amount = floatval($_GET['amount']);
                $_SESSION['balance'] += $amount;
                echo "You have deposited Rs{$amount}. New balance is Rs{$_SESSION['balance']}";
            }
            break;
        case 'withdraw':
            if (isset($_GET['amount'])) {
                $amount = floatval($_GET['amount']);
                if ($amount <= $_SESSION['balance']) {
                    $_SESSION['balance'] -= $amount;
                    echo "You have withdrawn Rs{$amount}. New balance is Rs{$_SESSION['balance']}";
                } else {
                    echo "Insufficient balance";
                }
            }
            break;
        case 'balance':
            echo "Your current balance is Rs{$_SESSION['balance']}";
            break;
        case 'statement':
            echo "Mini Statement:\n1. +Rs1000\n2. -Rs500\n3. +Rs200";
            break;
        default:
            echo "Invalid action";
    }
}
?>
