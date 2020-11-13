<?php
//撰寫新增消費發票的程式碼
//將發票的號碼及相關資訊寫入資料庫
// foreach ($_POST as $key => $value) {
//     // echo"欄位".$key."==值".$value."<br>";
//     $tmp[]=$key;
// }
// foreach ($_POST as $key => $value) {
//     // echo"欄位".$key."==值".$value."<br>";
//     $tmp2[]=$value;
// }
// print_r($tmp);
// echo "<br>";
// echo "insert into invoice(`".implode("`,`",array_keys($_POST))."`)";
// echo "values('".implode("','",$_POST)."')";
// $dsn="mysql:host=localhost;dbname=invoice;charset=utf8";
// $pdo=new PDO($dsn,'root','');
include_once("../base.php");
$sql="insert into invoices (`".implode("`,`",array_keys($_POST))."`)  values('".implode("','",$_POST)."')";
$pdo->exec($sql);
echo $sql;
header("location:../index.php?do=invoice_list");
?>