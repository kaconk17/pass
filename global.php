<?php
require_once "core/init.php";
require_once "view/header.php";
if (isset($_POST['submit'])) {
    $tanggal_awal = $_POST['awal'];
    $tanggal_akhir = $_POST['akhir'];
    $query = "SELECT dept, sum(price)as total FROM tb_recap WHERE out_date >= '$tanggal_awal' AND out_date <= '$tanggal_akhir' group by dept";
    $result= sqlsrv_query ($conn, $query);
} else {
    # code...
}




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

    echo "
   <tr>
   
    <td>".$data['dept']."</td>
    <td>".$data ['total']."</td>
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