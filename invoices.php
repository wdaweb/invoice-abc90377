<?php
include_once('base.php');
$sql="SELECT * FROM `invoice` ";
$invoices=$pdo->query($sql)->fetchALL();

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
    echo "<td></td>";
    echo '<tr>';
}

?>
</table>