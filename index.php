<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>發票兌獎系統</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<style>

body{
    background:#AEC8CA;
    color:#6F5F5E;
}



</style>
</head>
<body >
    <div class="container mx-auto my-5">
      <div class=" col-9 d-flex   rounded-top justify-content-between p-3 mx-auto" style="background:#6D8C8E">
        <?php
        $set="";
        $invoices="";
        $doaward="";
        $lookaward="";
        $inputaward="";
        if (isset($_GET['do'])) {
            switch ($_GET['do']) {
                case 'set':
                    $set="font-weight-bold";
                    break;
                case 'invoices':
                    $invoices="font-weight-bold";
                    break;
                case 'doaward':
                    $doaward="font-weight-bold";
                    break;
                case 'lookaward':
                    $lookaward="font-weight-bold";
                    break;
                case 'inputaward':
                    $inputaward="font-weight-bold";
                    break;
                

            }
        }

        ?>
            <div class="nav center  <?=$set?>"><a href="?do=set" class="text-white">登入發票</a></div>
            <div class="nav center  text-white <?=$invoices?>"><a href="?do=invoices" class="text-white" >發票存摺</a></div>
            <div class="nav center  text-white <?=$doaward?>"><a href="?do=doaward" class="text-white" >對獎</a></div>
            <div class="nav center  text-white <?=$lookaward?>"><a href="?do=lookaward" class="text-white" >查獎號</a></div>
            <div class="nav center  text-white <?=$inputaward?>"><a href="?do=inputaward" class="text-white" >輸入獎號</a></div>
            
        
      </div>
      <div class=" col-9  mx-auto p-3 rounded-bottom bg-light" style=''>
      <?php
      if (isset($_GET['do'])) {
          include_once("{$_GET['do']}.php");
      }else{include_once("set.php");}

      ?>
      </div>
    </div>
</body>
</html>

