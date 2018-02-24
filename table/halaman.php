<?php
include '../function/koneksi.php';

$perpage = 4;
$page    = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
//$page = 2;
$offset = ($page - 1) * $perpage;

$combo = $_GET['combo_search'];
$search_txt= $_GET['search_txt'];

if ($combo == 'item') {
    $query = "select top $perpage item_record_no, item_code, class, item, spesifikasi, uom, price, currency, supplier from tb_masteritem where item_record_no not in (select top $offset item_record_no from tb_masteritem order by item_record_no asc) AND item LIKE '%$search_txt%' order by item_record_no asc";
    $record = "SELECT COUNT (item_record_no) as total FROM tb_masteritem WHERE item LIKE '%$search_txt%'";
} elseif ($combo == 'spec') {
    $query = "select top $perpage item_record_no, item_code, class, item, spesifikasi, uom, price, currency, supplier from tb_masteritem where item_record_no not in (select top $offset item_record_no from tb_masteritem order by item_record_no asc) AND spesifikasi LIKE '%$search_txt%' order by item_record_no asc";
    $record = "SELECT COUNT (item_record_no) as total FROM tb_masteritem WHERE spesifikasi LIKE '%$search_txt%'";
} elseif ($combo == 'item_code'){
    $query = "select top $perpage item_record_no, item_code, class, item, spesifikasi, uom, price, currency, supplier from tb_masteritem where item_record_no not in (select top $offset item_record_no from tb_masteritem order by item_record_no asc) AND item_code LIKE '%$search_txt%' order by item_record_no asc";
    $record = "SELECT COUNT (item_record_no) as total FROM tb_masteritem WHERE item_code LIKE '%$search_txt%'";
} elseif ($combo == 'supplier') {
    $query = "select top $perpage item_record_no, item_code, class, item, spesifikasi, uom, price, currency, supplier from tb_masteritem where item_record_no not in (select top $offset item_record_no from tb_masteritem order by item_record_no asc) AND supplier LIKE '%$search_txt%' order by item_record_no asc";
    $record = "SELECT COUNT (item_record_no) as total FROM tb_masteritem WHERE supplier LIKE '%$search_txt%'";
}

else {


$query = "select top $perpage item_record_no, item_code, class, item, spesifikasi, uom, price, currency, supplier from tb_masteritem where item_record_no not in (select top $offset item_record_no from tb_masteritem order by item_record_no asc) order by item_record_no asc";
    $record = "SELECT COUNT (item_record_no) as total FROM tb_masteritem";
}


$result= sqlsrv_query ($conn,$record);


$total = sqlsrv_fetch_array($result);
$total_record= $total['total'];
$pages = ceil($total_record/$perpage);


$tampil = sqlsrv_query($conn,$query);

?>
<table border ='1' width = '1000'>
    </script>
    <tr>
    <th>Item Code</th>
    <th>Class</th>
    <th>Item</th>
    <th>Spesifikasi</th>
    <th>Uom</th>
    <th>Unit Price</th>
    <th>Currency</th>
    <th>Supplier</th>
    
    </tr>
<?php

while ($data = sqlsrv_fetch_array($tampil)) {
  


//$angka = number_format($data['end_stock']);
// $min = number_format($data['min_stock']);

    echo"
    <tr>
    <td>".$data['item_code']."</td>
    <td>".$data['class']."</td>
    <td>".$data['item']."</td>
    <td>".$data['spesifikasi']."</td>
    <td>".$data['uom']."</td>
    <td>".$data['price']."</td>
    <td>".$data['currency']."</td>
    <td>".$data['supplier']."</td>
    
    </tr>
     ";
     

}



?>
</table> 
<?php 
    /*if ($pages >1) {
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
            echo "<div class='pages' >";
            echo"<input type='button' class='btn_next' id=".$next." value='Next'>";
            echo " ";
            echo "<input type='button' class='btn_last' id=".$pages." value='Last'>";
            echo "</div>";
        }
        
    } else {
        # code...
    }
    
    */
    
    ?>
<br>

<?php 
echo"<div class='page' id=".$page." style='float:left'> Page ".$page." </div>  <div class='pages' id=".$pages." style='float:left'>From ".$pages." </div> <br>";
//echo "Page ".$page." From ".$pages 

?>