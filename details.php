<?php
require_once "core/init.php";
require_once "view/header.php";

$dept = $_SESSION['dept'];
$item_code = $_GET['item'];
 $tanggal_awal = $_SESSION['tgl_awal'];
 $tanggal_akhir = $_SESSION['tgl_akhir'];
//$query = "SELECT out_no, out_date, dept, item_code, item, spesifikasi, qty, uom, class, used FROM tb_recap WHERE out_date >= '$tanggal_awal' AND out_date <= '$tanggal_akhir' AND dept ='$dept' AND item_code = '$item_code'";
$query = "SELECT out_no, out_date, dept, item_code, item, spesifikasi, qty, uom, class FROM tb_recap WHERE item_code = '$item_code'";

    $result= sqlsrv_query ($conn, $query);

   echo $dept;
    echo $item_code;
    echo $tanggal_akhir;

?>
<table border ='1' width = '800'>
</script>
<tr>
<th>Nomer Out</th>
<th>Tanggal Out</th>
<th>Departemen</th>
<th>Item Code</th>
<th>Item</th>
<th>Spesifikasi</th>
<th>Qty</th>
<th>Uom</th>
<th>Class</th>

</tr>

<?php
while ($data = sqlsrv_fetch_array($result)){

    echo "
   <tr>
   
    <td>".$data['out_no']."</td>
    <td>".$data['out_date']."</td>
    <td>".$data['dept']."</td>
    <td>".$data['item_code']."</td>
    <td>".$data['item']."</td>
    <td>".$data['spesifikasi']."</td>
    <td>".$data['qty']."</td>
    <td>".$data['uom']."</td>
    <td>".$data['class']."</td>
    
    </tr>
    ";
    //sqlsrv_close();
}
?>
</table>
<?php

require_once "view/footer.php";
?>