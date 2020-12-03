<form action="?" method="GET">
你要輸入獎號的年份是?
<?php
$year=date('Y');
?>
<select name="chose_year" id="">
<option value="<?=$year-1;?>"><?=$year-1;?></option>
<option value="<?=$year;?>" selected><?=$year;?></option>
</select>
<br>
你要輸入獎號的月份是?
<select name="chose_period" id="">
    <option value="1">1~2月</option>
    <option value="2">3~4月</option>
    <option value="3">5~6月</option>
    <option value="4">7~8月</option>
    <option value="5">9~10月</option>
    <option value="6">11~12月</option>
    
</select>
<input type="hidden" name="do" value="invoices">
<input type="submit" value="送出">
</form>
<?php

$now_period=ceil(date('n')/2);
include_once('base.php');
if (!empty($_GET['chose_period'])) {
    $sql="SELECT * FROM `invoice` Where `year`='{$_GET['chose_year']}' && `period`='{$_GET['chose_period']}'";
}else{
   $sql="SELECT * FROM `invoice` Where `year`='$year' && `period`='$now_period'"; 
}

$invoices=$pdo->query($sql)->fetchALL();
if (isset($_GET['meg'])) {
    if ($_GET['meg']=='修改成功') {
        echo "發票已修改成功!";
    }elseif ($_GET['meg']=='刪除成功') {
        echo "發票已刪除成功!";
    }
}
if (!empty($_GET['chose_period'])) {
    switch($_GET['chose_period']){
        
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
    echo "<h1>";
    echo "這是{$_GET['chose_year']}年-{$month}月的發票";
    echo "</h1>";

}else{
  switch($now_period){
        
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
  echo "<h1>";
    echo "這是{$year}年-{$month}月的發票";
    echo "</h1>";
}
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
    echo "<a href='?do=editinv&id={$invoice['id']}'><button>編輯</button></a>";
    echo "<a href='?do=delcheck&id={$invoice['id']}'><button>刪除</button></a>";
    echo "</td>";
    echo '<tr>';
}

?>
</table>