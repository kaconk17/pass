<?php
require_once "core/init.php";
require_once "view/header.php";
?>
<h3>Price List</h3>
<form action="price.php" method="post">
    <select name="combo_search" id="combo_search">
        <option value="item">Item</option>
        <option value="spec">Spesifikasi</option>
        <option value="item_code">Item Code</option>
        <option value="supplier">Supplier</option>
    </select>
    <input type="text" name="search_txt">
    <input type="submit" name="submit" value="Search">
</form>
<br>
<div style="overflow-x:auto;">
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
$perpage = 30;
$page    = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
$start   = ($page>1) ? ($page * $perpage) - $page :0 ;

//$artikel = "SELECT item_code, min_stock, status, item, spesifikasi, end_stock, uom, class, used FROM tb_stock ";
$offset = ($page - 1) * $perpage;

if (isset($_POST['submit'])) {
    $combo = $_POST['combo_search'];
    $search_txt= $_POST['search_txt'];

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
    
} else {
    
    $query = "select top $perpage item_record_no, item_code, class, item, spesifikasi, uom, price, currency, supplier from tb_masteritem where item_record_no not in (select top $offset item_record_no from tb_masteritem order by item_record_no asc) order by item_record_no asc";
        $record = "SELECT COUNT (item_record_no) as total FROM tb_masteritem";
}


$result= sqlsrv_query ($conn,$record);


$total = sqlsrv_fetch_array($result);
$total_record= $total['total'];
$pages = ceil($total_record/$perpage);


$tampil = sqlsrv_query($conn,$query);


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
</div>
<br>

<div class="pages">
<?php 
    if ($pages >1) {
        if ($page == 1) {
            
        } else {
            echo "<a href='stock.php?halaman=1' style='font-size:30px'><<</a>";
            echo " ";
            $back = $page -1;
            
            echo "<a href='stock.php?halaman=$back' style='font-size:30px'><</a>";
        }
        
    } else {
        
    }
    ?>

    <?php

    if ($pages > 1) {
        if ($page == $pages) {
            
        } else {
            
            
            $next = $page + 1;
            echo "<a href='stock.php?halaman=$next' style='font-size:30px'>></a>";
            echo " ";
            echo "<a href='stock.php?halaman=$pages' style='font-size:30px'>>></a>";
        }
        
    } else {
        # code...
    }
    
    
    
    ?>
<br>
<?php echo "Page ".$page." From ".$pages ?>
   

</div>
<?php

require_once "view/footer.php";
?>