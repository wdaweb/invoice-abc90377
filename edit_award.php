<?php
include_once('base.php');
$period=$_GET['period'];
$year=$_GET['year'];
$sql="select * from `award` where `period`='$period' && `year`='$year'";
$award=$pdo->query($sql)->fetch();

?>
<form action="./api/edit_award.php" method="POST">
  <table class="table table-bordered" summary="統一發票中獎號碼單"> 
    <tbody>
     <tr> 
      <th id="group0">年月份</th> 
      <td headers="group0" class="title"> <?=$year;?>年 
      <?php
      switch ($period) {
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
      <input type="hidden" name="year" value="<?=$year?>">
      <input type="hidden" name="period" value="<?=$period?>">
    
       </td> 
     </tr> 
     <tr> 
      <th id="group1" rowspan="2">特別獎</th> 
      <td headers="group1" class="number">
      <p><input type="text" name="specialprize" value="<?=$award['specialprize'];?>"></p>
      </td> 
     </tr> 
     <tr> 
      <td headers="specialPrize"> 同期統一發票收執聯8位數號碼與特別獎號碼相同者獎金1,000萬元 </td> 
     </tr> 
     <tr> 
      <th id="group2" rowspan="2">特獎</th> 
      <td headers="group2" class="number">
      
      <p><input type="text" name="grandprize" value="<?=$award['grandprize'];?>"></p>
       </td> 
     </tr> 
     <tr> 
      <td headers="grandPrize"> 同期統一發票收執聯8位數號碼與特獎號碼相同者獎金200萬元 </td> 
     </tr> 
     <tr> 
      <th id="group3" rowspan="2">頭獎</th> 
      <td headers="group3" class="number">
      <p><input type="text" name="firstprize_1" value="<?=$award['firstprize_1'];?>"></p>
      <p><input type="text" name="firstprize_2" value="<?=$award['firstprize_2'];?>"></p>
      <p><input type="text" name="firstprize_3" value="<?=$award['firstprize_3'];?>"></p>
      </td> 
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
      <p><input type="text" name="sixprize_1" value="<?=$award['sixprize_1'];?>"></p>
      <p><input type="text" name="sixprize_2" value="<?=$award['sixprize_2'];?>"></p>
       </td> 
     </tr> 
    
    </tbody>
   </table>
   <input type="submit" >
   </form>