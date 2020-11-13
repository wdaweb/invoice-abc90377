<?php
include_once('../base.php');
print_r($_POST);
$update="update `invoices` set `code`='{$_POST['code']}',`number`='{$_POST['number']}',`date`='{$_POST['date']}',`payment`='{$_POST['payment']}' where `id`='{$_POST['id']}'";
$pdo->exec($update);
header("location:../index.php?do=invoice_list&id={$_POST['id']}");