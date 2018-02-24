<?php
require_once "core/init.php";
require_once "view/header.php";
?>
<h3>Price List</h3>
<form action="price.php" method="post" id="frm_price" onClick=>
    <select name="combo_search" id="combo_search">
    <option value="blank"></option>
        <option value="item">Item</option>
        <option value="spec">Spesifikasi</option>
        <option value="item_code">Item Code</option>
        <option value="supplier">Supplier</option>
    </select>
    <input type="text" name="search_txt" id="search_txt" >
    <input type="submit" name="submit_price" value="Search">
    <input type="button" id="tombol" value= "test">
</form>
<br>
<div id="test"></div>
<div id="area"></div>
<div class="mundur">
<input type="button" id="btn_first" value="First">
<input type="button" id="btn_back" value="Back">
</div>
<div class="maju" style="float:left">
<input type="button" id="btn_next" value="Next">
<input type="button" id="btn_last" value="Last">
</div>

<?php
/*$perpage = 4;
$page = 1;
//$page    = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
//$start   = ($page>1) ? ($page * $perpage) - $page :0 ;


//$offset = ($page - 1) * $perpage;


$record = "SELECT COUNT (item_record_no) as total FROM tb_masteritem";

$result= sqlsrv_query ($conn,$record);


$total = sqlsrv_fetch_array($result);
$total_record= $total['total'];
$pages = ceil($total_record/$perpage);


?>




<div class="pages">
<?php 
    if ($pages >1) {
        if ($page == 1) {
            
        } else {
            //echo "<a href='price.php?halaman=1' style='font-size:30px'><<</a>";
            echo"<input type='button' id='first_btn' value='First'>";
            echo " ";
            $back = $page -1;
            
            echo "<input type='button' id='back_btn' value='Back'>";
        }
        
    } else {
        
    }
    ?>

    <?php

    if ($pages > 1) {
        if ($page == $pages) {
            
        } else {
            
            
            $next = $page + 1;
            //echo "<a href='price.php?halaman=$next' style='font-size:30px'>></a>";
            echo"<input type='button' class='btn_next' id=".$page." value='Next'>";
            echo " ";
            echo "<input type='button' class='btn_last' id=".$pages." value='Last'>";
        }
        
    } else {
        # code...
    }
    
    
    
    ?>
<br>

<?php 
echo"Page <div id='page'>".$page."</div> From <div>".$pages."</div>";
//echo "Page ".$page." From ".$pages 
*/
?>
   


<?php

require_once "view/footer.php";
?>
