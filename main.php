
        <form action="api/add_invoice.php" method="POST">
            <div>日期:<input type="date" name="date"></div>
            期別:<select name="period">

            <option value="1">1,2</option>
            <option value="2">3,4</option>
            <option value="3">5,6</option>
            <option value="4">7,8</option>
            <option value="5">9,10</option>
            <option value="6">11,12</option>
            </select>
            
            <div>發票號碼:
                <input type="text" name="code" id="">
                <input type="number" name="number" id="">
            </div>
            <div>發票金額:
                <input type="number" name="payment" id="">
            </div>
            <div class="center">
                <input type="submit" value="送出">
            </div>
        </form>

