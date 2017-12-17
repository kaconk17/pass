<?php
require_once "core/init.php";

if ( isset($_POST['submit'])) {
    $cari = $_POST['cari'];
    
    if (!empty(trim($cari))) {

        $query = "SELECT item_code, item, spesifikasi, qty, uom, class FROM tb_out WHERE remark IS NULL AND item_code LIKE '%".$cari."%'";
        $result= sqlsrv_query ($conn, $query);

    } else {
        echo 'kosong';
    }
    
}else {
    $query = "SELECT item_code, item, spesifikasi, qty, uom, class FROM tb_out WHERE remark IS NULL";
    $result= sqlsrv_query ($conn, $query);
}



require_once "view/header.php";

?>

<form action="index.php" method = "post">
    <label for="">Cari</label>
    <input type="text" name="cari">
    <input type="submit" name="submit" value="Cari">
    <table border ='1' width = '800'>

</form>
<script type="text/javascript">
    $(document).ready(function () {
        $('#cari').datepicker();
    });

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
<td><a href=function/list.php?item=$data[item_code] style=text-decoration:none onclick=post>Edit</a></td>
    </tr>
    ";
    //sqlsrv_close();
}
require_once "view/footer.php";
?> 