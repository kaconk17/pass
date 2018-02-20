<?php
require_once "core/init.php";
require_once "view/header.php";
//require_once "core/halaman.php";
?>
<h3>Stock</h3>
<form action="stock.php" method="post">
    <select name="combo_search" id="combo_search">
        <option value="item">Item</option>
        <option value="spec">Spesifikasi</option>
        <option value="item_code">Item Code</option>
    </select>
    <input type="text" value="<?php echo $search_txt; ?>" name="search_txt">
    <input type="submit" name="submit" value="Search">
</form>
<br>
<table border ='1' width = '1000'>
    </script>
    <tr>
    <th>Item Code</th>
    <th>Min Stock</th>
    <th>Status</th>
    <th>Item</th>
    <th>Spesifikasi</th>
    <th>End Stock</th>
    <th>Uom</th>
    <th>Class</th>
    <th>Used</th>
    </tr>

<?php
$perpage = 30;
$page    = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
$start   = ($page>1) ? ($page * $perpage) - $page :0 ;

$artikel = "SELECT item_code, min_stock, status, item, spesifikasi, end_stock, uom, class, used FROM tb_stock ";
$offset = ($page - 1) * $perpage;

if (isset($_POST['submit'])) {
    $combo = $_POST['combo_search'];
    $search_txt= $_POST['search_txt'];

    if ($combo == 'item') {
        $query = "select top $perpage item_code, min_stock, status, item, spesifikasi, end_stock, uom, class, used from tb_stock where item_code not in (select top $offset item_code from tb_stock order by item_code asc) AND item LIKE '%$search_txt%' order by item_code asc";
        $record = "SELECT COUNT (item_code) as total FROM tb_stock WHERE item LIKE '%$search_txt%'";
    } elseif ($combo == 'spec') {
        $query = "select top $perpage item_code, min_stock, status, item, spesifikasi, end_stock, uom, class, used from tb_stock where item_code not in (select top $offset item_code from tb_stock order by item_code asc) AND spesifikasi LIKE '%$search_txt%' order by item_code asc";
        $record = "SELECT COUNT (item_code) as total FROM tb_stock WHERE spesifikasi LIKE '%$search_txt%'";
    } elseif ($combo == 'item_code'){
        $query = "select top $perpage item_code, min_stock, status, item, spesifikasi, end_stock, uom, class, used from tb_stock where item_code not in (select top $offset item_code from tb_stock order by item_code asc) AND item_code LIKE '%$search_txt%' order by item_code asc";
        $record = "SELECT COUNT (item_code) as total FROM tb_stock WHERE item_code LIKE '%$search_txt%'";
    }
    
} else {
    
    $query= "select top $perpage item_code, min_stock, status, item, spesifikasi, end_stock, uom, class, used from tb_stock where item_code not in (select top $offset item_code from tb_stock order by item_code asc) order by item_code asc" ;
    $record = "SELECT COUNT (item_code) as total FROM tb_stock";
}


$result= sqlsrv_query ($conn,$record);


$total = sqlsrv_fetch_array($result);
$total_record= $total['total'];
$pages = ceil($total_record/$perpage);


$tampil = sqlsrv_query($conn,$query);


  while ($data = sqlsrv_fetch_array($tampil)) {
   
        if ($data['status'] == "NG") {
            $color = 'background-color:#e60000';
        } else {
            $color = 'background-color:#ffffff';
        }
        
        
   
  

    $angka = number_format($data['end_stock']);
    $min = number_format($data['min_stock']);
    
        echo"
        <tr style=".$color.">
        <td>".$data['item_code']."</td>
        <td>".$min."</td>
        <td>".$data['status']."</td>
        <td>".$data['item']."</td>
        <td>".$data['spesifikasi']."</td>
        <td>".$angka."</td>
        <td>".$data['uom']."</td>
        <td>".$data['class']."</td>
        <td>".$data['used']."</td>
        </tr>
         ";
         
 
  }



?>
</table> <br>

<div class="pages">
    <?php 
    if ($pages >1) {
        if ($page == 1) {
            
        } else {
            echo "<a href='stock.php?halaman=1' style='font-size:20px'><<</a>";
            echo " ";
            $back = $page -1;
            
            echo "<a href='stock.php?halaman=$back' style='font-size:20px'><</a>";
        }
        
    } else {
        
    }
    echo "....";
    ?>

    <?php

    if ($pages > 1) {
        if ($page == $pages) {
            
        } else {
            
            
            $next = $page + 1;
            echo "<a href='stock.php?halaman=$next' style='font-size:20px'>></a>";
            echo "  ";
            echo "<a href='stock.php?halaman=$pages' style='font-size:20px'>>></a>";
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