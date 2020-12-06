<!-- //登入發票 -->
<div class="container ">
<?php
$date=date('Y-m-d');
if (isset($_GET['meg'])) {
    if ($_GET['meg']=='setsus') {
        echo '<div class="rounded rounded-lg award border p-3 d-flex m-3 ">
        <i class="fab fa-angellist"></i>&nbsp;新增成功,可以去發票存摺查看您新增的發票喔!</div>';
    }
}
session_start();
function meg($field){
    if (isset($_SESSION[$field]['meg'])){
        echo $_SESSION[$field]['meg'];
    }unset($_SESSION[$field]);
    }

    
?>
<form action="api/add_invoice.php" method="post" class="col-6">

<div class="form-group">
<label for="date" >時間:</label>
<input id="date"  class="form-control" type="date" name="date" value="<?=$date;?>">
<?=meg('date');?>
</div>
<div class="form-group">
<label for="code" >發票號碼:</label>
<div class="d-block">
<input type="text"  class="form-control d-inline col-2" id="code" name="code" ><input type="number"  class="form-control d-inline col-10"  name="number" id="number">
<?=meg('number');?>
</div>
</div>
<div class="form-group">
<label for="payment">花費:</label>
<input type="number"  class="form-control" id="payment" name="payment" >
<?=meg('payment');?>
</div>


<input type="submit" value="輸入" class="btn btn-sm mt-3" style="background:#6D8C8E;color:white" >

</form>
</div>
