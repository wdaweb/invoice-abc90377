<?php
$dsn="mysql:host=localhost;dbname=invoice;charset=utf8";
$pdo=new PDO($dsn,'root','');
session_start();
$awardStr=['頭','二','三','四','五','六'];
?>