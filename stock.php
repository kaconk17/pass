<?php
require_once "core/init.php";
require_once "view/header.php";
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

<table border ='1' width = '800'>
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
$perpage = 2;
$page    = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
$start   = ($page>1) ? ($page * $perpage) - $page :0 ;

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
    $query = "SELECT item_code, min_stock, status, item, spesifikasi, end_stock, uom, class, used FROM (SELECT *, ROW_NUMBER() OVER(ORDER BY name) as row FROM tb_stock) a WHERE row > $start AND row<= $perpage";
}

$record = "SELECT COUNT (item) FROM tb_stock";
$result= sqlsrv_query ($conn,$record);

$final = sqlsrv_query($conn, $query);

//$total = sqlsrv_num_rows($result);

$pages = ceil($result/$perpage);

while ($data = sqlsrv_fetch_array($final)){

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


}


?>
</table> <br>
<div class="pages">
<?php for ($i=1; $i <= $pages ; $i++) { ?>
    <a href="halaman= <?echo $i?>"><?echo $i?></a>
<?php } ?>
   

</div>
<?php
echo $result;
require_once "view/footer.php";
?>