<?php
include_once('../base.php');
$_POST['period']=ceil(explode('-',$_POST['date'])[1]/2);
$sql="UPDATE `invoice` SET 
`date`='{$_POST['date']}', 
`code`='{$_POST['code']}', 
`number`='{$_POST['number']}', 
`payment`='{$_POST['payment']}', 
`period`='{$_POST['period']}'
 WHERE
`id`='{$_POST['id']}';
";
$pdo->exec($sql);
header('location:../?do=invoices&meg=修改成功')

?>