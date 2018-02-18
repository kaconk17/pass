<?php
require_once "core/init.php";





require_once "view/header.php";

?>

<div class="purchasing">
Purchasing <br><br>
<a href="price.php">
<img src="view/images/tags.png" id="btn_price" > Price List
</a>
<br><br>
<a href="total_order.php">
<img src="view/images/buy.png" id="btn_buy"> Order
</a>
</div>

<div class="warehouse">
Warehouse <br><br>
    <a href="alldept.php" > 
    <img src="view/images/alldept.png" id="btn_pemakaian"> Usage
    </a>


<br> <br>
<a href="stock.php">
    <img src="view/images/graph.png" id="stock"> Stock
</a>

</div>



<?php

require_once "view/footer.php";
?> 
