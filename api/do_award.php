<?php
session_start();
$_SESSION['result']=[];
include_once('../base.php');
if (!empty($_POST['period'])) {
    $period=$_POST['period'];
    $year=$_POST['year'];
}else {
    $period=ceil(date('m')/2);
    $year=date('Y');

}
$awards_sql="select * from `award` where `period`='$period' && `year`='$year'";
$awards=$pdo->query($awards_sql)->fetch();
$inv_sql="select * from `invoice` where `period`='$period' && `year`='$year'";
$inv=$pdo->query($inv_sql)->fetchALL();
// print_r($awards);
// echo "<hr>";
// print_r($inv);
$result="沒中";
foreach($inv as $invoice){
   $num=$invoice['number'];
if (substr($num, -3)==$awards['sixprize_1']) {
    $result="增開六獎";
}
if (substr($num, -3)==$awards['sixprize_2']) {
    $result="增開六獎";
}
for ($i=-3; $i >=-8 ; $i--) { 
    if (substr($num,$i)==substr($awards['firstprize_1'],$i)) {
        $result=$i;
    }elseif (substr($num,$i)==substr($awards['firstprize_2'],$i)) {
        $result=$i;
    }elseif (substr($num,$i)==substr($awards['firstprize_3'],$i)) {
        $result=$i;
    }
    switch ($result) {
        case -3:
            $result="六獎";
            break;
        case -4:
            $result="五獎";
            break;
        case -5:
            $result="四獎";
            break;
        case -6:
            $result="三獎";
            break;
        case -7:
            $result="二獎";
            break;
        case -8:
            $result="頭獎";
            break;
  

    }
}
if ($num==$awards['grandprize']) {
    $result="特獎";
}
if ($num==$awards['specialprize']) {
    $result="特別獎";
}
$_SESSION['result'][]=$result;
}
header('location:../index.php?do=doaward');

?>
