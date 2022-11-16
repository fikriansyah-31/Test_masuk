<?php
require 'MyClass.php';

$str = $argv[1];
$myClass = new MyClass($str);

$myClass->setLowerCase($str);
echo $myClass->getStr() . "\n";

$myClass->setAlternateCase();
echo $myClass->getAlternateStr() . "\n";

$filename = 'test.csv';
$myClass->setFilename($filename);    
$myClass->setCSV();

$myClass->writeContent();