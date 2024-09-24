<?php
session_start();

if (!isset($_SESSION['balance'])) {
    $_SESSION['balance'] = 0;
    $_SESSION['transactions'] = [];
}

$action = $_POST['action'];
$amount = isset($_POST['amount']) ? intval($_POST['amount']) : 0;

switch ($action) {
    case 'deposit':
        $_SESSION['balance'] += $amount;
        $_SESSION['transactions'][] = $amount;
        echo "You have deposited Rs$amount. Your current balance is Rs" . $_SESSION['balance'];
        break;
    case 'withdraw':
        if ($amount <= $_SESSION['balance']) {
            $_SESSION['balance'] -= $amount;
            $_SESSION['transactions'][] = -$amount;
            echo "You have withdrawn Rs$amount. Your current balance is Rs" . $_SESSION['balance'];
        } else {
            echo "Insufficient Balance!!!";
        }
        break;
    case 'balance':
        echo "Your current balance is Rs" . $_SESSION['balance'];
        break;
    case 'statement':
        echo "Mini Statement:\n";
        foreach ($_SESSION['transactions'] as $transaction) {
            echo "$transaction\n";
        }
        break;
    default:
        echo "Invalid action";
}
?>
 
