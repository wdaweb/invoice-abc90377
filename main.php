<h3 class="text-center">統一發票紀錄與兌獎</h3>
<div class="container">
<div class="col-8 d-flex mx-auto justify-content-between border p-3">
    <?php
    $month=
    [
        1=>"1,2月",
        2=>"3,4月",
        3=>"5,6月",
        4=>"7,8月",
        5=>"9,10月",
        6=>"11,12月",
    ];
    $m=ceil(date('m')/2);
    ?>
    
        
        <div class="text-center"><?=$month[$m]?></div>
        <div class="text-center"><a href="http://">當期發票</a></div>
        <div class="text-center"><a href="http://">兌獎</a></div>
        <div class="text-center"><a href="http://">輸入獎號</a></div>
        </div>
        <div class="col-8 d-flex mx-auto justify-content-between border p-3">
        <form action="api/add_invoice.php">
            <div>年分:<input type="text" name="year"></div>
            期別:<select name="period">

            <option value="1">1,2</option>
            <option value="2">3,4</option>
            <option value="3">5,6</option>
            <option value="4">7,8</option>
            <option value="5">9,10</option>
            <option value="6">11,12</option>
            </select>
            
            <div>發票號碼:
                <input type="text" name="prepend" id="">
                <input type="text" name="number" id="">
            </div>
            <div>發票金額:
                <input type="number" name="payment" id="">
            </div>
            <div class="center">
                <input type="submit" value="送出">
            </div>
        </form>
    </div>
    </div>
