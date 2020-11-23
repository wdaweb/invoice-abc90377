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

</head>
<body >
    <div class="container mx-auto my-5">
      <div class=" col-9 d-flex  border justify-content-between  p-3 mx-auto">
        
            <div class="center"><a href="?do=set">登入發票</a></div>
            <div class="center"><a href="?do=invoices">發票存摺</a></div>
            <div class="center"><a href="?do=doaward">對獎</a></div>
            <div class="center"><a href="?do=lookaward">查獎號</a></div>
            <div class="center"><a href="?do=inputaward">輸入獎號</a></div>
            
        
      </div>
      <div class=" col-9 border mx-auto p-3" style='height:400px'>
      <?php
      if (isset($_GET['do'])) {
          include_once("{$_GET['do']}.php");
      }else{include_once("set.php");}

      ?>
      </div>
    </div>
</body>
</html>

