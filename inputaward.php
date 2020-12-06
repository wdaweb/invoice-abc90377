<?php
$year=date('Y');
$period=ceil(date('n')/2);


include_once('base.php');
if (isset($_GET['meg'])) {
   if ($_GET['meg']=='repeat') {
    echo "<div class='award rounded rounded-lg border p-3 m-3 '>";
    echo "<i class='fas fa-exclamation-triangle'></i>&nbsp;您已經輸入過這期的獎號囉,請去「查獎號>編輯獎號」修改即可!";
    
    echo "</div>";
    
   }elseif ($_GET['meg']=='add_sus') {
    echo "已為您新增獎號,請去「查獎號」查看即可!";
}
}
?>
<?php
if (empty($_POST['chose_period'])) {

?>
<div class='info rounded rounded-lg border p-3 m-3 '>
<form action="index.php?do=inputaward" method="POST">
你要輸入獎號的年份是?
<select name="chose_year" id="">
<option value="<?=$year-1;?>"><?=$year-1;?></option>
<option value="<?=$year;?>" selected><?=$year;?></option>

</select>
<br>
你要輸入獎號的月份是?
<select name="chose_period" id="">
    <option value="1" <?=$period==1?'selected':'';?>>1~2月</option>
    <option value="2" <?=$period==2?'selected':'';?>>3~4月</option>
    <option value="3" <?=$period==3?'selected':'';?>>5~6月</option>
    <option value="4" <?=$period==4?'selected':'';?>>7~8月</option>
    <option value="5" <?=$period==5?'selected':'';?>>9~10月</option>
    <option value="6" <?=$period==6?'selected':'';?>>11~12月</option>
    
</select>
<input type="submit" value="送出" class='btn btn-sm ' style='background:#6D8C8E;color:white'>
</form>
</div>
<?php
}else{
    $sql="SELECT * FROM `award` WHERE `period`='{$_POST["chose_period"]}' && `year`='{$_POST["chose_year"]}' ";
$check=$pdo->query($sql)->fetch();
if (!empty($check)) {
    header('location:?do=inputaward&meg=repeat');}
    ?>
    <form action="api/add_award.php" method="POST">
    <table class="table table-bordered" summary="統一發票中獎號碼單"> 
    <tbody>
     <tr> 
      <th id="group0">年月份</th> 
      <td headers="group0" class="title"> <?=$_POST['chose_year']?>年 
      <?php
      switch ($_POST['chose_period']) {
          case '1':
              echo "1~2月";
              break;
          case '2':
            echo "3~4月";
              break;
          case '3':
            echo "5~6月";
              break;
          case '4':
            echo "7~8月";
              break;
          case '5':
            echo "9~10月";
              break;
          case '6':
            echo "11~12月";
              break;

      }

      ?>
      <input type="hidden" name="year" value="<?=$_POST["chose_year"];?>">
      <input type="hidden" name="period" value="<?=$_POST["chose_period"];?>">
       </td> 
     </tr> 
     <tr> 
      <th id="group1" rowspan="2">特別獎</th> 
      <td headers="group1" class="number">
      <input type="text" name="specialprize" >
      </td> 
     </tr> 
     <tr> 
      <td headers="specialPrize"> 同期統一發票收執聯8位數號碼與特別獎號碼相同者獎金1,000萬元 </td> 
     </tr> 
     <tr> 
      <th id="group2" rowspan="2">特獎</th> 
      <td headers="group2" class="number">
      <input type="text" name="grandprize" >
       </td> 
     </tr> 
     <tr> 
      <td headers="grandPrize"> 同期統一發票收執聯8位數號碼與特獎號碼相同者獎金200萬元 </td> 
     </tr> 
     <tr> 
      <th id="group3" rowspan="2">頭獎</th> 
      <td headers="group3" class="number">
       <p><input type="text" name="firstprize_1" ></p> 
       <p><input type="text" name="firstprize_2" ></p> 
       <p><input type="text" name="firstprize_3" ></p> </td> 
     </tr> 
     <tr> 
      <td headers="firstPrize"> 同期統一發票收執聯8位數號碼與頭獎號碼相同者獎金20萬元 </td> 
     </tr> 
     <tr> 
      <th id="group4">二獎</th> 
      <td headers="group4"> 同期統一發票收執聯末7 位數號碼與頭獎中獎號碼末7 位相同者各得獎金4萬元 </td> 
     </tr> 
     <tr> 
      <th id="group5">三獎</th> 
      <td headers="group5"> 同期統一發票收執聯末6 位數號碼與頭獎中獎號碼末6 位相同者各得獎金1萬元 </td> 
     </tr> 
     <tr> 
      <th id="group6">四獎</th> 
      <td headers="group6"> 同期統一發票收執聯末5 位數號碼與頭獎中獎號碼末5 位相同者各得獎金4千元 </td> 
     </tr> 
     <tr> 
      <th id="group7">五獎</th> 
      <td headers="group7"> 同期統一發票收執聯末4 位數號碼與頭獎中獎號碼末4 位相同者各得獎金1千元 </td> 
     </tr> 
     <tr> 
      <th id="group8">六獎</th> 
      <td headers="group8"> 同期統一發票收執聯末3 位數號碼與 頭獎中獎號碼末3 位相同者各得獎金2百元 </td> 
     </tr> 
     <tr> 
      <th id="group9">增開六獎</th> 
      <td headers="group9" class="number"> 
      <input type="text" name="sixprize_1" >
      <input type="text" name="sixprize_2" >
       </td> 
     </tr> 
    
    </tbody>
   </table>
   <input type="submit" class='btn btn-sm' style='background:#6D8C8E;color:white' value="確認新增">
   </form>
<?php
}
?>