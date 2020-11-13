<?php
include_once "base.php";
$sql="select * from `invoices` order by `date`";
$rows=$pdo->query($sql)->fetchAll();
// print_r($rows);
// foreach ($rows as $row) {
//     echo $row['code'].$row['number']."<br>";
// }

?>
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
    <tr>
        <td><?=$row['code'].$row['number'];?></td>
        <td><?=$row['date'];?></td>
        <td><?=$row['payment'];?></td>
        <td>

        <a href="?do=edit_invoice&id=<?=$row['id'];?>"><button>編輯</button></a>
        <button>刪除</button>
        </td>
    </tr>
    <?php
    }

    ?>
</table>