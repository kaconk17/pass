<?php
require_once "core/init.php";
require_once "view/header.php";

$dept = $_GET['item'];
 $tanggal_awal = $_SESSION['tgl_awal'];
 $tanggal_akhir = $_SESSION['tgl_akhir'];
$query = "SELECT tb_recap.item_code, tb_recap.item, tb_quota.quota , sum(tb_recap.qty) as total, tb_recap.uom FROM tb_recap LEFT JOIN tb_quota ON tb_recap.item_code = tb_quota.item_code AND tb_recap.dept=tb_quota.dept WHERE tb_recap.out_date >= '$tanggal_awal' AND tb_recap.out_date <= '$tanggal_akhir' and tb_recap.dept ='$dept' GROUP BY tb_recap.item_code, tb_recap.item,tb_quota.quota, tb_recap.uom";

    $result= sqlsrv_query ($conn, $query);

?>
<table border ='1' width = '800'>
</script>
<tr>
<th>Item Code</th>
<th>Item</th>
<th>Forecast</th>
<th>Aktual</th>
<th>Uom</th>
<th>Detail</th>
</tr>

<?php
while ($data = sqlsrv_fetch_array($result)){

    echo "
   <tr>
   
    <td>".$data['item_code']."</td>
    <td>".$data ['item']."</td>
    <td>".$data ['quota']."</td>
    <td>".$data ['total']."</td>
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