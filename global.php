<?php
require_once "core/init.php";
require_once "view/header.php";
if (isset($_POST['submit'])) {
    $tanggal_awal = $_POST['awal'];
    $tanggal_akhir = $_POST['akhir'];
    $query = "SELECT item_code, item, spesifikasi, qty, uom, class FROM tb_out WHERE remark IS NULL AND out_date >= '$tanggal_awal' AND out_date <= '$tanggal_akhir'";
    $result= sqlsrv_query ($conn, $query);
} else {
    # code...
}




?>


<table border ='1' width = '800'>
</script>
<tr>
<th>Item Code</th>
<th>Item</th>
<th>Spesifikasi</th>
<th>Qty out</th>
<th>Uom</th>
<th>Class</th>
<th>Deatail</th>
</tr>


<?php


while ($data = sqlsrv_fetch_array($result)){

    echo "
   <tr>
   
    <td>".$data['item_code']."</td>
    <td>".$data ['item']."</td>
    <td>".$data['spesifikasi']."</td>
    <td>".$data['qty']."</td>
       <td>".$data ['uom']."</td>
<td>".$data['class']."</td>
<td><a href=function/list.php?item=$data[item_code] style=text-decoration:none onclick=post>Detail</a></td>
    </tr>
    ";
    //sqlsrv_close();
}
?>
</table>
<?php

require_once "view/footer.php";
?>