<?php
include_once('../base.php');
for($i=0;$i>2000;$i++){
$year=rand(2019,2020);
$month=rand(1,12);
$period=ceil($month/2);
$day=rand(1,30);
$code=chr(rand(65,90)).chr(rand(65,90));
$payment=rand(1,1000);
$number="";
for($i=0;$i<8;$i++){
$number=$number.strval(rand(0,9));
}
$sql="INSERT into `invoice` (`date`,`code`,`number`,`payment`,`period`,`year`) 
values ('{$year}-{$month}-{$day}','{$code}','{$number}','{$payment}','{$period}','{$year}')";
$pdo->exec($sql);
}