<?php
session_start();
$_SESSION['result']=[];
$_SESSION['money']="";
$_SESSION['inv']=[];
include_once('../base.php');
if (!empty($_POST['period'])) {
    $period=$_POST['period'];
    $year=$_POST['year'];
}else {
    $period=ceil(date('m')/2);
    $year=date('Y');

}
$awards_sql="select * from `award` where `period`='$period' && `year`='$year'";
$if_award_isset=$pdo->query($awards_sql)->fetch();






$awards=$pdo->query($awards_sql)->fetch();
$inv_sql="select * from `invoice` where `period`='$period' && `year`='$year'";
$inv=$pdo->query($inv_sql)->fetchALL();
// print_r($awards);
// echo "<hr>";
// print_r($inv);
$result="";
$money=0;
$inv_num="";
foreach($inv as $invoice){
   $num=$invoice['number'];
if (substr($num, -3)==$awards['sixprize_1']) {
    $result="增開六獎";
    $money=200;
    $inv_num=$num;
}
if (substr($num, -3)==$awards['sixprize_2']) {
    $result="增開六獎";
    $money=200;
    $inv_num=$num;
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
            $money=200;
            $inv_num=$num;
            break;
        case -4:
            $result="五獎";
            $money=1000;
            $inv_num=$num;
            break;
        case -5:
            $result="四獎";
            $money=4000;
            $inv_num=$num;
            break;
        case -6:
            $result="三獎";
            $money=10000;
            $inv_num=$num;
            break;
        case -7:
            $result="二獎";
            $money=40000;
            $inv_num=$num;
            break;
        case -8:
            $result="頭獎";
            $money=200000;
            $inv_num=$num;
            break;
    }
}
if ($num==$awards['grandprize']) {
    $result="特獎";
    $money=2000000;
    $inv_num=$num;
}
if ($num==$awards['specialprize']) {
    $result="特別獎";
    $money=10000000;
    $inv_num=$num;
}
if (!empty($result)) {
    $_SESSION['result'][]=$result;
    $_SESSION['money'][]=$money;
    $_SESSION['inv'][]=['number'=>$inv_num,'result'=>$result,'money'=>$money];


}else {
    $_SESSION['result']=[];
    $_SESSION['money']=[];
    $_SESSION['inv']=[];
}

}
print_r($_SESSION['inv']);
if (empty($if_award_isset)) {
    header('location:../index.php?do=doaward&meg=獎號不存在');
}else{
    header('location:../index.php?do=doaward');
}


?>
