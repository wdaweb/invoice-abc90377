<!-- //登入發票 -->
<div class="container ">
<?php
$date=date('Y-m-d');
if (isset($_GET['meg'])) {
    if ($_GET['meg']=='setsus') {
        echo '新增成功,可以去發票存摺查看您新增的發票喔!';
    }
}
session_start();
function meg($field){
    if (isset($_SESSION[$field]['meg'])){
        echo $_SESSION[$field]['meg'];
    }unset($_SESSION[$field]);
    }

    
?>
<form action="api/add_invoice.php" method="post">
<div class="form-group">
<label for="" class="col-2">時間:</label>
<input type="date" name="date" value="<?=$date;?>">
<?=meg('date');?>
</div>
<div class="form-group">
<label for="" class="col-2">發票號碼:</label>
<input type="text"  name="code" style="width:50px"><input type="number" name="number" id="">
<?=meg('number');?>
</div>
<div class="form-group"></div>
<label for="" class="col-2">花費:</label>
<input type="number" name="payment" >
<?=meg('payment');?>
</div>
<div class="form-group ">
<label class="col-2"></label>
<input type="submit" value="輸入">
</div>
</div>
</form>