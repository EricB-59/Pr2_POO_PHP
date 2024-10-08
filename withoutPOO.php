<?php
$bankAccount1 = 400;
$bankActivity1 = true;
$bankOverdraft1 = false;

echo "My balance : ".$bankAccount1."<br>";

$bankActivity1 = true;
echo "My account is now ";
echo $bankActivity1 ? "closed.<br>" : "reopened.<br>";

$bankActivity1 = false;
echo "My account is now ";
echo $bankActivity1 ? "closed.<br>" : "reopened.<br>";

echo "Doing transaction deposit (+150) with current balance ".$bankAccount1."<br>";
$bankAccount1 += 150;
echo "My new balance after the deposit (+150) : ".$bankAccount1."<br>";

echo "Doing transaction withdrawl (-25) with current balance ".$bankAccount1."<br>";
$bankAccount1 -= 25;
echo "My new balance after the withdrawl (-25) : ".$bankAccount1."<br>";

echo "Doing transaction withdrawl (-600) with current balance ".$bankAccount1."<br>";
if (!$bankOverdraft1 && ($bankAccount1 - 600) <= 0) {
    echo "Error transaction: Insufficient balance to complete the withdrawl<br>";
    echo "My balance after failed last transicition : ".$bankAccount1."<br>";
}

$bankActivity1 = false;
echo "My account is now closed.<br>";
