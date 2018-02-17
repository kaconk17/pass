<?php
//require_once "core/init.php";
require_once "view/header.php";
require_once "core/halaman.php";
?>
<form action="stock.php" method="post">
    <select name="combo_search" id="combo_search">
        <option value="item">Item</option>
        <option value="spec">Spesifikasi</option>
        <option value="item_code">Item Code</option>
    </select>
    <input type="text" name="search_txt">
    <input type="submit" name="submit" value="Search">
</form>

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
$perpage = 20;
$page    = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
//$start   = ($page>1) ? ($page * $perpage) - $page :0 ;
$start = 20;
$artikel = "SELECT item_code, min_stock, status, item, spesifikasi, end_stock, uom, class, used FROM tb_stock ";


if (isset($_POST['submit'])) {
    $combo = $_POST['combo_search'];
    $search_txt= $_POST['search_txt'];

    if ($combo == 'item') {
        $query = "SELECT item_code, min_stock, status, item, spesifikasi, end_stock, uom, class, used FROM tb_stock WHERE item LIKE '%$search_txt%'";
    } elseif ($combo == 'spec') {
        $query = "SELECT item_code, min_stock, status, item, spesifikasi, end_stock, uom, class, used FROM tb_stock WHERE spesifikasi LIKE '%$search_txt%'";
    } elseif ($combo == 'item_code'){
        $query = "SELECT item_code, min_stock, status, item, spesifikasi, end_stock, uom, class, used FROM tb_stock WHERE item_code LIKE '%$search_txt%'";
    }
    
} else {
    //$query = "SELECT item_code, min_stock, status, item, spesifikasi, end_stock, uom, class, used FROM (SELECT *, ROW_NUMBER() OVER(ORDER BY item_code) as row FROM tb_stock) a WHERE row > $start AND row<= $perpage";
    $query= "SELECT item_code, min_stock, status, item, spesifikasi, end_stock, uom, class, used FROM tb_stock ";
}

$record = "SELECT COUNT (item_code) as total FROM tb_stock";
$result= sqlsrv_query ($conn,$record);

$final = sqlsrv_query($conn, $artikel, array(),array("Scrollable" => 'static'));
if (!$final) {
    die( print_r( sqlsrv_errors(), true));
}
$total = sqlsrv_fetch_array($result);
$total_record= $total['total'];
$pages = ceil($total_record/$perpage);

//$tampil = getPage_stock($final, $page, $perpage);
$offset = ($page - 1) * $perpage; 
$rows = array(); 
$i = 0; 
while($data = sqlsrv_fetch_array($final, 
                                SQLSRV_FETCH_ASSOC,
                                SQLSRV_SCROLL_ABSOLUTE, 
                                $offset + $i) 
                                
       && $i < $perpage) 
{ 
   
    $angka = number_format($data['end_stock']);
    
        echo"
        <tr>
        <td>".$data['item_code']."</td>
        <td>".$data['min_stock']."</td>
        <td>".$data['status']."</td>
        <td>".$data['item']."</td>
        <td>".$data['spesifikasi']."</td>
        <td>".$angka."</td>
        <td>".$data['uom']."</td>
        <td>".$data['class']."</td>
        <td>".$data['used']."</td>
        </tr>
         ";
    array_push($rows, $data); 
    $i++; 
} 
echo $data['item'];

//while ($data = sqlsrv_fetch_array($final)){
//foreach ($tampil as $data) {
    

    


//}


?>
</table> <br>
<div class="pages">
<?php for ($p=1; $p <= $pages ; $p++) { ?>
    <a href="stock.php?halaman= <?echo $p?>"><?echo $p?></a>
<?php } ?>
   

</div>
<?php
echo $page;
require_once "view/footer.php";
?>