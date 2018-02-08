<?php
require_once "core/init.php";
require_once "view/header.php";

$dept = $_SESSION['dept'];
$item_code = $_GET['item'];
 $tanggal_awal = $_SESSION['tgl_awal'];
 $tanggal_akhir = $_SESSION['tgl_akhir'];
//$query = "SELECT out_no, out_date, dept, item_code, item, spesifikasi, qty, uom, class, used FROM tb_recap WHERE out_date >= '$tanggal_awal' AND out_date <= '$tanggal_akhir' AND dept ='$dept' AND item_code = '$item_code'";
$query = "SELECT out_no, out_date, dept, item_code, item, spesifikasi, qty, uom FROM tb_recap WHERE item_code = '$item_code' AND dept = '$dept' AND out_date >= '$tanggal_awal' AND out_date <= '$tanggal_akhir'";

    $hasil= sqlsrv_query ($conn, $query);

    ?>
    <h1><?php echo $dept  ?></h1>
<p><?php echo "Periode : ".$tanggal_awal." Sampai ".$tanggal_akhir."" ?></p>
<table border ='1' width = '800'>
</script>
<tr>
<th>Item Code</th>
<th>Item</th>
<th>Spesifikasi</th>
<th>Qty</th>
<th>Uom</th>
<th>Departemen</th>
<th>Tgl Out</th>
<th>No. Out</th>
</tr>

<?php
while ($data = sqlsrv_fetch_array($hasil)){
    $angka = number_format($data['qty']);
$format = date_format($data ['out_date'],"d F Y");
    echo "
   <tr>
   
    <td>".$data['item_code']."</td>
    <td>".$data ['item']."</td>
    <td>".$data ['spesifikasi']."</td>
    <td>".$angka."</td>
    <td>".$data ['uom']."</td>
    <td>".$data ['dept']."</td>
    <td>".$format."</td>
    <td>".$data ['out_no']."</td>

    </tr>
    ";
    //sqlsrv_close();
}
?>
</table>
<?php

require_once "view/footer.php";
?>