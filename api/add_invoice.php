<?php
include_once('../base.php');
$_POST['period']=ceil(explode('-',$_POST['date'])[1]/2);
$_POST['year']=explode('-',$_POST['date'])[0];
//表單裡使用者輸入的是發票日期,將日期格式轉為期數

$sql="INSERT into `invoice` (`".(implode('`,`',array_keys($_POST)))."`) values ('". implode("','",$_POST)."')";
echo $sql;

$pdo->exec($sql);
header("location:../index.php?do=set&meg=setsus");
//在新增發票頁面顯示訊息提醒使用者新增成功

?>