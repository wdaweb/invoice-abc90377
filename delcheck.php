<?php

echo "<script> if(confirm( '是否真的要刪除這張發票？ '))  location.href='api/delinv.php?id={$_GET['id']}&chose_year={$_GET['year']}&chose_period={$_GET['period']}';
else location.href='?do=invoices&chose_year={$_GET['year']}&chose_period={$_GET['period']}'; </script>";


?>