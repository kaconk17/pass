<?php
require_once "core/init.php";
require_once "view/header.php";



$_SESSION['dept'] = $_GET['item'];
$dept = $_SESSION['dept'];
 $tanggal_awal = $_SESSION['tgl_awal'];
 $tanggal_akhir = $_SESSION['tgl_akhir'];

 $perpage = 30;
 $page    = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
 $start   = ($page>1) ? ($page * $perpage) - $page :0 ;
 $offset = ($page - 1) * $perpage;

$query = "SELECT TOP $perpage in_record_no, request_no, po_no, item_code, item, spesifikasi, qty, uom, price, amount, currency, arrive_date, icl_no, supp_name FROM tb_incoming WHERE in_record_no not in (select top $offset in_record_no from tb_incoming order by in_record_no asc) AND arrive_date >= '$tanggal_awal' AND arrive_date <= '$tanggal_akhir' and dept LIKE '%$dept%' order by request_no asc ";
$record = "SELECT COUNT (in_record_no) as total FROM tb_incoming WHERE arrive_date >= '$tanggal_awal' AND arrive_date <= '$tanggal_akhir' and dept LIKE '%$dept%'";
    



?>
<h3>Total Order <?php echo $dept  ?></h3>
<p><?php echo "Periode : ".$tanggal_awal." Sampai ".$tanggal_akhir."" ?></p>
<div style="overflow-x:auto;">
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
$result= sqlsrv_query ($conn, $record);
$total = sqlsrv_fetch_array($result);
$total_record= $total['total'];
$pages = ceil($total_record/$perpage);


$tampil = sqlsrv_query($conn,$query);


while ($data = sqlsrv_fetch_array($tampil)){
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
</div>
<div class="pages">
<?php 
    if ($pages >1) {
        if ($page == 1) {
            
        } else {
            echo "<a href='list_order.php?halaman=1' style='font-size:30px'><<</a>";
            echo " ";
            $back = $page -1;
            
            echo "<a href='list_order.php?halaman=$back' style='font-size:30px'><</a>";
        }
        
    } else {
        
    }
    ?>

    <?php

    if ($pages > 1) {
        if ($page == $pages) {
            
        } else {
            
            
            $next = $page + 1;
            echo "<a href='list_order.php?halaman=$next item=$dept' style='font-size:30px'>></a>";
            echo " ";
            echo "<a href='list_order.php?halaman=$pages item=$dept' style='font-size:30px'>>></a>";
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