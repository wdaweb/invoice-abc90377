<div class="container">
<?php
include_once('base.php');

session_start();
    $period=ceil(date('m')/2);
    $year=date('Y');
if (isset($_SESSION['result'])) {
    if (!empty($_SESSION['result'])) {
    $results=array_count_values($_SESSION['result']);
    $result_total=0;

    foreach($results as $award => $result ){
        $result_total=$result_total+$result;
        
        
    }
    echo "<div class='award rounded rounded-lg border p-3 m-3 '>";
    echo "<h3>您總共中了".$result_total."張發票</h3>";
    echo "<br>";
    unset($_SESSION['result']);
}elseif(empty($_SESSION['result'])&&empty($_GET['meg'])){
    echo "<div class='award rounded rounded-lg border p-3 m-3 '>";
    echo "<h3>很可惜,這期都沒有中</h3>";
    echo "</div>";
    unset($_SESSION['result']);
}elseif($_GET['meg']='獎號不存在'){
    echo "<div class='award rounded rounded-lg border p-3 m-3 '>";
    echo "<h3>你還沒輸入這期獎號喔!</h3>";
    unset($_SESSION['result']);
    echo "</div>";

}
}
if (isset($_SESSION['money'])) {
    if (!empty($_SESSION['money'])) {
    $moneys=$_SESSION['money'];
    $money_total=0;
    foreach($moneys as $money){
        $money_total=$money_total+$money;
    }
    echo "<h3>您總共中了".$money_total."元</h3>";
    echo "</div>";
    }
unset($_SESSION['money']);
}
if(!empty($_SESSION['inv'])) {
    echo "<hr>";

    echo "<h3>中獎發票清單</h3>";
    echo "<table class='table'>";
    echo "<thead class='thead-light'>
    <tr>
    <th>中獎發票號碼</th>
    <th>中獎獎項</th>
    <th>獎金</th>
    </tr>

    </thead>
    <tbody>
    ";
    foreach($_SESSION['inv'] as $inv){
        echo "<tr>";
            echo "<td>";
            echo $inv['number'];
            echo "</td>";
            echo "<td>";
            echo $inv['result'];
            echo "</td>";
            echo "<td>";
            echo $inv['money'];
            echo "</td>";

        echo "<tr>";
    }
    echo "</tbody></table>";
    unset($_SESSION['inv']);
    echo "<hr>";
}
?>
<div class="rounded rounded-lg info border p-3  m-3 ">

<h3><i class="fas fa-search-dollar"></i>我要對本期獎項</h3>
<a href="api/do_award.php"  class='btn btn-sm ' style='background:#6D8C8E;color:white'>開始對獎</a>
</div>
<div class="mt-3 rounded rounded-lg box border p-3  m-3" >
<h3><i class="fas fa-search-dollar"></i>我要對他期獎項</h3>
<form action="api/do_award.php" method="POST">
你要對獎的年份是?
<select name="year" id="">
<option value="<?=$year-1;?>"><?=$year-1;?></option>
<option value="<?=$year;?>" selected><?=$year;?></option>

</select>
<br>
你要對獎的月份是?
<select name="period" id="">
    <option value="1">1~2月</option>
    <option value="2">3~4月</option>
    <option value="3">5~6月</option>
    <option value="4">7~8月</option>
    <option value="5">9~10月</option>
    <option value="6">11~12月</option>
    
</select>
<br>
<input type="submit"  class='btn btn-sm ' style='background:#6D8C8E;color:white' value="開始對獎">
</form>
</div>
</div>



