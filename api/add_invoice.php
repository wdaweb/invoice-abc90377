<?php
//以下為登入檢查
session_start();

include_once('../base.php');
function accept($field){
if (empty($_POST[$field])) {
   $_SESSION[$field]['meg']="此欄位不得為空";
   return 1;
   
}}
function length($field,$len){
if(!empty($_POST[$field])){
if (strlen($_POST[$field])<$len) {
   $_SESSION[$field]['meg']="此欄位長度錯誤"; 
   return 1;
}}}

accept('number');
accept('payment');
length('number',8);
if (accept('number')||accept('payment')||length('number',8)) {
    header('location:../index.php?do=set');
}else{

$_POST['period']=ceil(explode('-',$_POST['date'])[1]/2);
$_POST['year']=explode('-',$_POST['date'])[0];
//表單裡使用者輸入的是發票日期,將日期格式轉為期數

$sql="INSERT into `invoice` (`".(implode('`,`',array_keys($_POST)))."`) values ('". implode("','",$_POST)."')";
echo $sql;

$pdo->exec($sql);
header("location:../index.php?do=set&meg=setsus");
//在新增發票頁面顯示訊息提醒使用者新增成功

}




?>