<?php
include_once "base.php";
$inv=$pdo->query("select * from invoices where id='{$_GET['id']}'")->fetch();
?>
<div class="col-md-6 text-center border mx-auto">
    <div class="center">確認刪除以下資料嗎</div>
    <ul class="list-group">
        <li class="list-group-item"><?=$inv['code'].$inv['number']?></li>
        <li class="list-group-item"><?=$inv['date']?></li>
        <li class="list-group-item"><?=$inv['payment']?></li>
    </ul>
    <div class="text-center mt-4">
       <a href="api/del.php?id=<?=$_GET['id'];?>"><button >刪除</button></a> 
       <a href="index.php?do=invoice_list"><button>取消</button></a> 
    </div>
</div>