<?php
include_once('../base.php');

$sql="UPDATE `award` SET 
`specialprize`='{$_POST['specialprize']}', 
`grandprize`='{$_POST['grandprize']}', 
`firstprize_1`='{$_POST['firstprize_1']}', 
`firstprize_2`='{$_POST['firstprize_2']}', 
`firstprize_3`='{$_POST['firstprize_3']}', 
`sixprize_1`='{$_POST['sixprize_1']}', 
`sixprize_2`='{$_POST['sixprize_2']}'

 WHERE
 `period`='{$_POST['period']}'&&
`year`='{$_POST['year']}'

";
$pdo->exec($sql);
echo $sql;
header('location:../?do=lookaward&meg=修改成功')

?>