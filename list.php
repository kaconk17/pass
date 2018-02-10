<?php
require_once "core/init.php";
require_once "view/header.php";

$dept = $_GET['item'];
$_SESSION['dept']=$dept;
 $tanggal_awal = $_SESSION['tgl_awal'];
 $tanggal_akhir = $_SESSION['tgl_akhir'];
$query = "SELECT tb_recap.item_code, tb_recap.item, tb_recap.spesifikasi, tb_quota.quota , sum(tb_recap.qty) as total, tb_recap.uom FROM tb_recap LEFT JOIN tb_quota ON tb_recap.item_code = tb_quota.item_code AND tb_recap.dept=tb_quota.departemen WHERE tb_recap.out_date >= '$tanggal_awal' AND tb_recap.out_date <= '$tanggal_akhir' and tb_recap.dept ='$dept' GROUP BY tb_recap.item_code, tb_recap.item,tb_recap.spesifikasi, tb_quota.quota, tb_recap.uom";

    $result= sqlsrv_query ($conn, $query);

?>
<h1><?php echo $dept  ?></h1>
<p><?php echo "Periode : ".$tanggal_awal." Sampai ".$tanggal_akhir."" ?></p>
<table border ='1' width = '800'>
</script>
<tr>
<th>Item Code</th>
<th>Item</th>
<th>Spesifikasi</th>
<th>Forecast</th>
<th>Aktual</th>
<th>Uom</th>
<th>Detail</th>
</tr>

<?php
while ($data = sqlsrv_fetch_array($result)){
$pakai = number_format($data['total']);
$quota = number_format($data['quota']);

if ($quota > 0){
    if ($data['total'] > $data['quota']) {
        $color = 'background-color:#e60000';
    } else {
        $color = 'background-color:#ffffff';
    }
    
    
}else {
    $color = 'background-color:#ffffff';
    }
//$angka = number_format($data['total']);

    echo "
   
    <tr style=".$color.">
    <td>".$data['item_code']."</td>
    <td>".$data ['item']."</td>
    <td>".$data ['spesifikasi']."</td>
    <td align='center'>".$quota."</td>
    <td align='center'>".$pakai."</td>
    <td>".$data ['uom']."</td>
<td><a href=details.php?item=$data[item_code] style=text-decoration:none onclick=post>Detail</a></td>
    </tr>
    ";
    //sqlsrv_close();
}
?>
</table>
<?php

require_once "view/footer.php";
?>