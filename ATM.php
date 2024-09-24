<?php
$balance = 0;
$transactions = [];
$continue = true;

echo "Welcome to ID Bank\n";

while ($continue) {
    echo "\n1. Deposit\n2. Withdraw\n3. Balance Check\n4. Mini Statement\n";
    $choice = intval(readline("Enter your choice: "));

    switch ($choice) {
        case 1:
            $deposit = intval(readline("How much do you want to deposit? "));
            $balance += $deposit;
            $transactions[] = $deposit;
            echo "You have deposited Rs$deposit\n";
            echo "Your current balance = Rs$balance\n";
            break;

        case 2:
            $withdraw = intval(readline("How much do you want to withdraw? "));
            if ($withdraw <= $balance) {
                $balance -= $withdraw;
                $transactions[] = -$withdraw;
                echo "You have withdrawn Rs$withdraw\n";
                echo "Your current balance = Rs$balance\n";
            } else {
                echo "Insufficient Balance!!!\n";
            }
            break;

        case 3:
            echo "Your current balance = Rs$balance\n";
            break;

        case 4:
            echo "Mini Statement:\n";
            foreach ($transactions as $transaction) {
                echo "$transaction\n";
            }
            break;

        default:
            echo "Invalid Choice\n";
            break;
    }

    $cnt = intval(readline("Do you want to continue banking? (1. Yes 2. No): "));
    if ($cnt == 2) {
        echo "Thank you for banking with us.\n";
        $continue = false;
    }
}

function readline($prompt = "")
{
    echo $prompt;
    return rtrim(fgets(STDIN));
}
?>
 
