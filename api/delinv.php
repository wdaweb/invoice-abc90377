<?php


 


include_once('../base.php');
$id=$_GET['id'];
$sql="DELETE FROM `invoice`
WHERE `id`='$id'";
$pdo->exec($sql);
header('location:../?do=invoices&meg=刪除成功');
?>