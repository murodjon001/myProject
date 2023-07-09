<?php
session_start();
var_dump($_SESSION);

$test = $_SESSION['test'];
$test1 = $test;

echo $test1;
$a = 5;

$b = $a;

$a = 4;

echo $b;