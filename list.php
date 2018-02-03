<?php
require_once "core/init.php";
require_once "view/header.php";

$dept = $_GET['item'];
 $tanggal_awal = $_SESSION['tgl_awal'];
 $tanggal_akhir = $_SESSION['tgl_akhir'];
echo $dept;
echo $tanggal_awal;
echo $tanggal_akhir;
$query = "SELECT item_code, item, qty, uom FROM tb_recap WHERE out_date >= '$tanggal_awal' AND out_date <= '$tanggal_akhir' and dept ='$dept'";
//$query = "SELECT item_code, item, qty, uom FROM tb_recap WHERE dept = '$dept'";
    $result= sqlsrv_query ($conn, $query);

?>
<table border ='1' width = '800'>
</script>
<tr>
<th>Item Code</th>
<th>Item</th>
<th>Qty</th>
<th>Uom</th>
<th>Detail</th>
</tr>

<?php
while ($data = sqlsrv_fetch_array($result)){

    echo "
   <tr>
   
    <td>".$data['item_code']."</td>
    <td>".$data ['item']."</td>
    <td>".$data ['qty']."</td>
    <td>".$data ['uom']."</td>
<td><a href=list.php?item=$data[dept] style=text-decoration:none onclick=post>Detail</a></td>
    </tr>
    ";
    //sqlsrv_close();
}
?>
</table>
<?php

require_once "view/footer.php";
?>