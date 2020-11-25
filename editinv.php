<?php
include_once('base.php');
$sql="SELECT * FROM `invoice` WHERE `id` ='{$_GET['id']}'";

$inv=$pdo->query($sql)->fetch();

?>
<div class="container ">

<form action="api/edit_invoice.php" method="post">
<div class="form-group">

<input type="hidden" name="id" value="<?=$inv['id'];?>">
<label for="" class="col-2">時間:</label>
<input type="date" name="date" value="<?=$inv['date'];?>" >
</div>
<div class="form-group">
<label for="" class="col-2">發票號碼:</label>
<input type="text"  name="code" style="width:50px" value="<?=$inv['code'];?>"><input type="text" name="number" value="<?=$inv['number'];?>">
</div>
<div class="form-group">
<label for="" class="col-2" >花費:</label>

<input type="text" name="payment" value="<?=$inv['payment'];?>" >

</div>
<div class="form-group ">
<label class="col-2"></label>
<input type="submit" value="輸入">
</div>
</div>
</form>