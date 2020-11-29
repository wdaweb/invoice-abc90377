<!-- //登入發票 -->
<div class="container ">
<?php
$date=date('Y-m-d');
if (isset($_GET['meg'])) {
    if ($_GET['meg']=='setsus') {
        echo '新增成功,可以去發票存摺查看您新增的發票喔!';
    }
}
?>
<form action="api/add_invoice.php" method="post">
<div class="form-group">
<label for="" class="col-2">時間:</label>
<input type="date" name="date" value="<?=$date;?>">
</div>
<div class="form-group">
<label for="" class="col-2">發票號碼:</label>
<input type="text"  name="code" style="width:50px"><input type="text" name="number" id="">
</div>
<div class="form-group">
<label for="" class="col-2">花費:</label>

<input type="text" name="payment" >

</div>
<div class="form-group ">
<label class="col-2"></label>
<input type="submit" value="輸入">
</div>
</div>
</form>