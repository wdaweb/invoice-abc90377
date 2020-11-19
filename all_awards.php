
<div class="d-flex flex-column">
<?php
//全部兌獎
$period_str=[
    1=>'1、2月',
    2=>'3、4月',
    3=>'5、6月',
    4=>'7、8月',
    5=>'9、10月',
    6=>'11、12月'
];
echo "你要對的發票是".$period_str[$_GET['period']];
include_once('base.php');
$sql="SELECT * FROM `invoices` WHERE `period`='{$_GET['period']}' && left(`date`,4)={$_GET['year']} Order by `date` desc";
$invoices=$pdo->query($sql)->fetchALL();
// echo "<pre>";
// print_r($invoices);
// echo"</pre>";
?>
<?php
//撈出該期獎號
$sqlaward="SELECT * from `award_numbers` where `period`='{$_GET['period']}'";
$awardNumber=$pdo->query($sqlaward)->fetchALL();
// echo "<pre>";
// print_r($awardNumber);
// echo"</pre>";

?>
<?php
//兌獎程式
$all_res=-1;
foreach($invoices as $inv){
$number=$inv['number'];

$date=$inv['date'];
//explode(-,$date)取得陣列 陣列的第二個元素就是月
//月份就可以推算期數,有期數月份就可以找到開獎號碼
$period=ceil(explode('-',$date)[1]/2);
$year=explode('-',$date)[0];
// echo $period;
// echo $year;
// echo "<pre>";
// print_r($awards);
// echo "<pre>";

foreach($awardNumber as $award){
switch($award['type']){
    case 1:
        if($award['number']==$number){
        echo "<br>號碼=".$number." <br>";
        echo "中了特別獎";
        $all_res=1;
        }
        
    break;
    case 2:
        if($award['number']==$number){
        echo "<br>號碼=".$number."<br>";
        echo "中了特獎";
        $all_res=1;
        }
    break;
    case 3:
        $res=-1;
        for($i=5;$i>=0;$i--){
        $target=mb_substr($award['number'],$i,(8-$i),'utf8');
        $mynumber=mb_substr($number,$i,(8-$i),'utf8');
        if($target==$mynumber){

            $res=$i;
        }else{
        break;
        }   
        }
        if($res!=-1){
        echo "<br>號碼=".$number."<br>";
        echo "獎號=".$award['number']."<br>";
        echo "中了{$awardStr[$res]}獎<br>";
        $all_res=1;
        
    
    }
    break;
        case 4:
            if($award['number']==mb_substr($number,5,3,'utf8')){
                echo "<br>號碼=".$number."<br>";
                echo "中了增開六獎";
                $all_res=1;
            }
        break;
}
}

}
if($all_res==-1){
    echo "沒中";
}
?>

<!-- <table class="table">
    <?php
    //該期發票
    foreach($invoices as $invoice){
        echo "<tr>";
        echo "<td>".$invoice['code'].$invoice['number']."</td>";
        echo "<td>".$invoice['date']."</td>";

    echo "</tr>";
    }
    ?>
</table> -->
</div>