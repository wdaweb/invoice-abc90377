<?php
include_once("base.php");
$inv_id=$_GET['id'];
$invoice=$pdo->query("select * from `invoices` where `id`='$inv_id'")->fetch();
// echo "<pre>";
// print_r($invoice);
// echo "<pre>";
$number=$invoice['number'];

//找出獎號
//1確認期數
//2得到期數資料後撈出那期開獎獎號

$date=$invoice['date'];
//explode(-,$date)取得陣列 陣列的第二個元素就是月
//月份就可以推算期數,有期數月份就可以找到開獎號碼
$period=ceil(explode('-',$date)[1]/2);
$year=explode('-',$date)[0];
$awards=$pdo->query("select * from `award_numbers` where `year`='$year' && `period`='$period'")->fetchALL(PDO::FETCH_ASSOC);
// echo $period;
// echo $year;
// echo "<pre>";
// print_r($awards);
// echo "<pre>";

foreach($awards as $award){
switch($award['type']){
    case 1:
        if($award['number']==$number){
        echo "<br>號碼=".$number." <br>";
        echo "中了特別獎";
        }
        
    break;
    case 2:
        if($award['number']==$number){
        echo "<br>號碼=".$number."<br>";
        echo "中了特獎";
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
        
    
    }
    break;
        case 4:
            if($award['number']==mb_substr($number,5,3,'utf8')){
                echo "<br>號碼=".$number."<br>";
                echo "中了增開六獎";
            }
        break;
}
}
?>
