<?php
require_once "core/init.php";
require_once "view/header.php";

$dept = $_GET['item'];
$_SESSION['dept']=$dept;
 $tanggal_awal = $_SESSION['tgl_awal'];
 $tanggal_akhir = $_SESSION['tgl_akhir'];
$query = "SELECT po_no, request_no, item_code, item, spesifikasi, qty, uom, price, amount, currency, arrive_date, icl_no, supp_name FROM tb_incoming WHERE arrive_date >= '$tanggal_awal' AND arrive_date <= '$tanggal_akhir' and dept LIKE '%$dept%'";

    $result= sqlsrv_query ($conn, $query);

?>
<h3>Total Order <?php echo $dept  ?></h3>
<p><?php echo "Periode : ".$tanggal_awal." Sampai ".$tanggal_akhir."" ?></p>
<table border ='1' width = '1000'>
</script>
<tr>
<th>Nomer PO</th>
<th>Request No.</th>
<th>Item Code</th>
<th>Item</th>
<th>Spesifikasi</th>
<th>qty</th>
<th>Uom</th>
<th>Supplier</th>
<th>Price</th>
<th>Amount</th>
<th>Currency</th>
<th>Arrive Date</th>
<th>ICL No.</th>
</tr>

<?php
while ($data = sqlsrv_fetch_array($result)){
$qty = number_format($data['qty']);
$price = number_format($data['price']);
$amount = number_format($data['price']*$data['qty']);
$format = date_format($data ['arrive_date'],"d F Y");
    echo "
   
    <tr >
    <td>".$data['po_no']."</td>
    <td>".$data ['request_no']."</td>
    <td>".$data ['item_code']."</td>
    <td>".$data['item']."</td>
    <td>".$data['spesifikasi']."</td>
    <td>".$qty."</td>
    <td>".$data ['uom']."</td>
    <td>".$data ['supp_name']."</td>
    <td>".$price."</td>
    <td>".$amount."</td>
    <td>".$data ['currency']."</td>
    <td>".$format."</td>
    <td>".$data ['icl_no']."</td>
    </tr>
    ";
    //sqlsrv_close();
}
?>
</table>
<?php

require_once "view/footer.php";
?>