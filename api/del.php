<?php
include_once("../base.php");
$del="delete from invoices where id='{$_GET['id']}'";
$pdo->exec($del);
header("location:../index.php?do=invoice_list");