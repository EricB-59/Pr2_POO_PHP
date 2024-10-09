<?php

//  --------------- [Start testing bank account #1, No overdraft] ----------------
$bankAccount1 = 400;
$bankActivity1 = true;
$bankOverdraft1 = false;

echo "My balance : ".$bankAccount1."<br>";

$bankActivity1 = false;
echo "My account is now ";
echo $bankActivity1 ? "reopened.<br>" : "closed.<br>";

$bankActivity1 = true;
echo "My account is now ";
echo $bankActivity1 ? "reopened.<br>" : "closed.<br>";

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

// --------------- [Start testing bank account #2, Silver overdraft (100.0 founds)] ----------------
echo "<br>";
$bankAccount2 = 200;
$bankActivity2 = true;
$bankOverdraft2 = true;
$bankOverdraftLimit2 = 100;

echo "My balance : ".$bankAccount2."<br>";

echo "Doing transaction deposit (+100) with current balance ".$bankAccount2."<br>";
$bankAccount2 += 100;
echo "My new balance after the deposit (+100) : ".$bankAccount2."<br>";

echo "Doing transaction withdrawl (-300) with current balance ".$bankAccount2."<br>";
$bankAccount2 -= 300;
echo "My new balance after the withdrawl (-300) : ".$bankAccount2."<br>";

echo "Doing transaction withdrawl (-50) with current balance ".$bankAccount2."<br>";
if (($bankOverdraftLimit2 - 50) >= 100) {
    echo "My balance after failed last transaction : -50";
    echo "Error transaction: withdrawl exceeds overdraft limit.<br>";
}else {
    $bankAccount2 -= 50;
    $bankOverdraftLimit2 -= 50;
    echo "My new balance after the withdrawl (-50) : ".$bankAccount2."<br>";
}

echo "Doing transaction withdrawl (-120) with current balance ".$bankAccount2."<br>";

if (($bankOverdraftLimit2 - 120) <= $bankOverdraftLimit2) {
    echo "Error transaction: withdrawl exceeds overdraft limit.<br>";
    echo "My balance after failed last transaction : $bankAccount2<br>";
}else {
    $bankAccount2 -= 120;
    echo "My new balance after the withdrawl (-120) : ".$bankAccount2."<br>";
}

echo "Doing transaction withdrawl (-20) with current balance ".$bankAccount2."<br>";
if (($bankOverdraftLimit2 - 20) <= 0) {
    echo "My balance after failed last transaction : -20";
    echo "Error transaction: withdrawl exceeds overdraft limit.<br>";
}else {
    $bankAccount2 -= 20;
    echo "My new balance after the withdrawl (-20) : ".$bankAccount2."<br>";
}

$bankActivity2 = false;
echo "My account is now ";
echo $bankActivity2 ? "reopened.<br>" : "closed.<br>";

echo "Error: Account is alredy ";
echo $bankActivity2 ? "reopened.<br>" : "closed.<br>";