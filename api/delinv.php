<?php

include_once('../base.php');
$id=$_GET['id'];
$sql="DELETE FROM `invoice`
WHERE `id`='$id'";
$pdo->exec($sql);
header("location:../?do=invoices&meg=刪除成功&chose_year={$_GET['chose_year']}&chose_period={$_GET['chose_period']}");
?>