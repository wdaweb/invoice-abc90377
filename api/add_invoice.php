<?php
include_once('../base.php');
$_POST['period']=ceil(explode('-',$_POST['period'])[1]/2);
//表單裡使用者輸入的是發票日期,要先將日期格式轉為期數

$sql="INSERT into `invoice` (`".(implode('`,`',array_keys($_POST)))."`) values ('". implode("','",$_POST)."')";
$pdo->exec($sql);
header("location:../index.php?do=set&meg=setsus");
//在新增發票頁面顯示訊息提醒使用者新增成功

?>