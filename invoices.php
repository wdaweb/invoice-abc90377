<div class="rounded rounded-lg info border p-3 d-flex m-3 ">

<form action="?" method="GET">
<h3><i class="fas fa-search-dollar"></i>我要查他期發票</h3>
你要查詢的年份是?
<?php
$year=date('Y');
?>
<select name="chose_year" id="">
<option value="<?=$year-1;?>"><?=$year-1;?></option>
<option value="<?=$year;?>" selected><?=$year;?></option>
</select>
<br>
你要查詢的月份是?
<select name="chose_period" id="">
    <option value="1">1~2月</option>
    <option value="2">3~4月</option>
    <option value="3">5~6月</option>
    <option value="4">7~8月</option>
    <option value="5">9~10月</option>
    <option value="6">11~12月</option>
    
</select>
<input type="hidden" name="do" value="invoices">

<input type="submit" value="送出" class="btn btn-sm " style="background:#6D8C8E;color:white">
</form>
</div>
<?php


include_once('base.php');

if (!empty($_GET['chose_period'])) {
  $year=$_GET['chose_year'];
  $period=$_GET['chose_period']; 
   
}elseif(!empty($_GET['page'])){
  $year=$_GET['year'];
  $period=$_GET['period'];

}
else{
  $period=ceil(date('n')/2);
  $year=date('Y');
  
}
if(!empty($_GET['page'])){
  $i=$_GET['page'];
  $first=(($i-1)*10);
  $last=$first+9;
  
}else{
  $i=1;
  $first=(($i-1)*10);
  
}
$sql="SELECT * FROM `invoice` Where `year`='{$year}' && `period`='{$period}' ORDER BY `date` limit {$first},10"; 
// echo $sql;
$invoices=$pdo->query($sql)->fetchALL();
if (isset($_GET['meg'])) {
    if ($_GET['meg']=='修改成功') {
      echo '<div class="rounded rounded-lg award border p-3 d-flex m-3 ">';
        echo "<i class='fab fa-angellist'></i>&nbsp;</i>&nbsp;發票已修改成功!";
        echo '</div>';
    }elseif ($_GET['meg']=='刪除成功') {
      echo '<div class="rounded rounded-lg award border p-3 d-flex m-3 ">';
        echo "<i class='fab fa-angellist'></i>&nbsp;發票已刪除成功!";
        echo '</div>';
    }
}

switch($period){
        
case 1:
  $month="1~2";
  break;  
case 2:
  $month="3~4";
  break;  
case 3:
  $month="5~6";
  break;  
case 4:
  $month="7~8";
  break;  
case 5:
  $month="9~10";
  break;  
case 6:
  $month="11~12";
  break;  

    }
    echo "<div class='container'><h3>";
    echo "這是{$year}年-{$month}月的發票";
    echo "</h3>";


?>

<table class='table'>
<tr>
<td>日期</td>
<td>發票號碼</td>
<td>金額</td>
<td>功能</td>
</tr>
<?php

foreach($invoices as $invoice){
    echo '<tr>';
    echo "<td>".$invoice['date']."</td>";
    echo "<td>".$invoice['code'].$invoice['number']."</td>";
    echo "<td>".$invoice['payment']."</td>";
    echo "<td>";
    echo "<a href='?do=editinv&id={$invoice['id']}'><button class='btn btn-sm ' style='background:#6D8C8E;color:white'>編輯</button></a>";
    echo "<a href='?do=delcheck&id={$invoice['id']}&year={$year}&period={$period}'><button class='btn btn-sm mx-1' style='background:#D28A7C;color:white'>刪除</button></a>";
    echo "</td>";
    echo '<tr>';
}

?>

</table>
<?php
$data_amount=$pdo->query("SELECT COUNT(*) FROM `invoice` WHERE `year`='{$year}' && `period`='{$period}'")->fetch();
$page_amount=ceil($data_amount[0]/10);
// print_r($data_amount);
// echo $page_amount;


?>
<nav aria-label="Page navigation example " style='color:#6F5F5E'>
  <ul class="pagination  flex-wrap" >
  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
  <?php
  for($i=1;$i<=$page_amount;$i++){
    
   echo "<li class='page-item'><a class='page-link' href='?do=invoices&year=$year&period=$period&page=$i'>$i</a></li>";
}
    ?>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
</div>