<?php
include_once "base.php";

//rand()

$codeBase=["AB","FF","GD","KJ","FJ","IY"];
echo "資料產生中......";
echo date("Y-m-d H:i:s");
for($i=0;$i<10000;$i++){

    $code=$codeBase[rand(0,5)];
    $number=sprintf("%08d",rand(0,99999999));
    //echo str_pad($number,8,'0',STR_PAD_LEFT)."<br>";
    //echo $number."<br>";

    $payment=rand(1,20000);
    //echo $payment."<BR>";
    $start=strtotime("2020-01-01");
    $end=strtotime("2020-12-31");

    $date=date("Y-m-d",rand($start,$end));
    $period=ceil(explode("-",$date)[1]/2);

    //echo $date."<br>";

    $hope=[
        'code'=>$code,
        'number'=>$number,
        'payment'=>$payment,
        'date'=>$date,
        'period'=>$period
    ];

    $sql="insert into invoices (`".implode("`,`",array_keys($hope))."`) values('".implode("','",$hope)."')";
    $pdo->exec($sql);
}

echo "<hr>";
echo "資料新增完成......";
echo date("Y-m-d H:i:s");

?>