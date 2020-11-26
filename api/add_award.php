<?php
include_once('../base.php');
// print_r($_POST);


$sql="INSERT INTO `award` (`".
implode("`,`",array_keys($_POST)).
"`) VALUES ('".
implode("','",$_POST).
"')";

// echo $sql;
$pdo->exec($sql);
header('location:../index.php?do=lookaward&meg=add_sus');
?>