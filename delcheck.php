<?php

echo "<script> if(confirm( '是否真的要刪除這張發票？ '))  location.href='api/delinv.php?id={$_GET['id']}';else location.href='?do=invoices'; </script>";


?>