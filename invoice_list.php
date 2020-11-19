<?php
include_once "base.php";
$period=ceil(date("m")/2);

$period=ceil(date("m")/2);

$sql="select * from `invoices` where period='$period' order by date desc";

$rows=$pdo->query($sql)->fetchAll();
// print_r($rows);
// foreach ($rows as $row) {
//     echo $row['code'].$row['number']."<br>";
// }

?>
<div class="row " > 
<ul>
    
    <li><a href="http://">1 2月</a></li>
    <li><a href="http://">3 4月</a></li>
    <li><a href="http://">5 6月</a></li>
    <li><a href="http://">7 8月</a></li>
    <li><a href="http://">9 10月</a></li>
    <li><a href="http://">11 12月</a></li>
</ul>
</div>

<table class="table">
    <tr>
        <td>發票號碼</td>
        <td>消費日期</td>
        <td>消費金額</td>
        <td>操作</td>
    </tr>
    <?php
foreach ($rows as $row) {
    
    ?>
    <tr <?php echo (!empty($_GET['id'])&&($_GET['id']==$row['id']))?'class="bg-success"':''?>>
        <td><?=$row['code'].$row['number'];?></td>
        <td><?=$row['date'];?></td>
        <td><?=$row['payment'];?></td>
        <td>

        <a href="?do=edit_invoice&id=<?=$row['id'];?>"><button>編輯</button></a>
        <a href="?do=del_invoice&id=<?=$row['id'];?>"><button>刪除</button></a>
        <a href="?do=award&id=<?=$row['id'];?>"><button>兌獎</button></a>
        </td>
    </tr>
    <?php
    }

    ?>
</table>