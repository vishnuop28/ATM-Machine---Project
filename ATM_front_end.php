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
                        document.getElementById('result').innerText = `You have deposited Rs${amount}`;
                    }
                    break;
                case 'withdraw':
                    amount = prompt("How much do you want to withdraw?");
                    if (amount) {
                        document.getElementById('result').innerText = `You have withdrawn Rs${amount}`;
                    }
                    break;
                case 'balance':
                    document.getElementById('result').innerText = "Your current balance is RsXXXX";
                    break;
                case 'statement':
                    document.getElementById('result').innerText = "Mini Statement:\n1. +Rs1000\n2. -Rs500\n3. +Rs200";
                    break;
                default:
                    document.getElementById('result').innerText = "Invalid action";
            }
        }
    </script>
</body>
</html>
 
