<?php

//撰寫建立各期中獎號碼的程式
//將表單傳送過來的中獎號碼寫入資料庫

include_once("../base.php");
$year=$_POST['year'];
$period=$_POST['period'];

$sql="insert into 
award_numbers 
(`year`,`period`,`number`,`type`)  
values
('$year','$period','{$_POST['special_prize']}','1')";//特別獎t1
$pdo->exec($sql);
$sql="insert into 
award_numbers 
(`year`,`period`,`number`,`type`)  
values
('$year','$period','{$_POST['grand_prize']}','2')";//特獎t2
$pdo->exec($sql);
foreach($_POST['first_prize'] as $first){
    if (!empty($first)) {
        $sql="insert into 
award_numbers 
(`year`,`period`,`number`,`type`)  
values
('$year','$period','{$first}','3')";//頭獎t3
$pdo->exec($sql);}
    }
foreach($_POST['add_six_prize'] as $six){
    if (!empty($six)) {
        $sql="insert into 
award_numbers 
(`year`,`period`,`number`,`type`)  
values
('$year','$period','{$six}','4')";//增開六獎t4
$pdo->exec($sql);}
    }

echo "新增完成";
header("location:../index.php?do=award_numbers_list&pd={$year}-{$period}");
?>