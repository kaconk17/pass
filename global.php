<?php
require_once "core/init.php";
require_once "view/header.php";
if (!isset($_SESSION['tgl_awal']) && !isset($_SESSION['tgl_akhir'])) {
    
   header('Location: index.php');
    
} else {
    $tanggal_awal = $_SESSION['tgl_awal'];
    $tanggal_akhir = $_SESSION['tgl_akhir'];
    $query = "SELECT dept, sum(price)as total FROM tb_recap WHERE out_date >= '$tanggal_awal' AND out_date <= '$tanggal_akhir' group by dept";
    $result= sqlsrv_query ($conn, $query);
}
//echo $tanggal_awal;
//echo $tanggal_akhir;



?>


<table border ='1' width = '800'>
</script>
<tr>
<th>Departemen</th>
<th>Total</th>
<th>Deatail</th>
</tr>


<?php
setlocale(LC_MONETARY, 'en_US');

while ($data = sqlsrv_fetch_array($result)){

    $angka = number_format($data['total']);

    echo "
   <tr>
   
    <td>".$data['dept']."</td>
    <td>Rp".$angka."</td>
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