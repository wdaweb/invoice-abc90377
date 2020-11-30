<?php
include_once('base.php');
session_start();
    $period=ceil(date('m')/2);
    $year=date('Y');
if (isset($_SESSION['result'])) {
    print_r($_SESSION['result']);
    
    $results=array_count_values($_SESSION['result']);
    print_r($results);
    foreach($results as $award => $result ){
        echo "中了".$result."張".$award;
        echo "<br>";
    }
unset($_SESSION['result']);
}
?>

<h3>我要對本期獎項</h3>
<a href="api/do_award.php">開始對獎</a>
<h3>我要對他期獎項</h3>
<form action="api/do_award.php" method="POST">
你要對獎的年份是?
<select name="year" id="">
<option value="<?=$year-1;?>"><?=$year-1;?></option>
<option value="<?=$year;?>" selected><?=$year;?></option>
<option value="<?=$year+1;?>"><?=$year+1;?></option>
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
<input type="submit" value="開始對獎">
</form>


