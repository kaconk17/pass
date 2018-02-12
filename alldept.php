<?php
require_once "core/init.php";
require_once "view/header.php";
?>

<form action="alldept.php" method = "post">
    <label for="">From</label>
    <input type="text" id="awal" name="awal"> 
    <label for="">To</label>
    <input type="text" id="akhir" name="akhir">
    <input type="submit" name="submit" value="Submit"><br> <br>
    

</form>

<?php
if (isset($_POST['submit'])) {
    $tanggal_awal = $_POST['awal'];
    
    $tanggal_akhir = $_POST['akhir'];
    
   $_SESSION['tgl_awal'] = $tanggal_awal;
     $_SESSION['tgl_akhir'] = $tanggal_akhir;
    $query = "SELECT dept, sum(price)as total FROM tb_recap WHERE out_date >= '$tanggal_awal' AND out_date <= '$tanggal_akhir' group by dept";
    $result= sqlsrv_query ($conn, $query);
    echo "<table border ='1' width = '800'>
    </script>
    <tr>
    <th>Departemen</th>
    <th>Total</th>
    <th>Deatail</th>
    </tr>";

    setlocale(LC_MONETARY, 'en_US');

while ($data = sqlsrv_fetch_array($result)){

    $angka = number_format($data['total']);

    echo "
   <tr>
   
    <td>".$data['dept']."</td>
    <td align='center'>Rp ".$angka."</td>
<td><a href=list.php?item=$data[dept] style=text-decoration:none onclick=post>Detail</a></td>
    </tr>
    ";
    //sqlsrv_close();
}

} else {
    
}

    
?>





<?php

?>
</table>
<?php

require_once "view/footer.php";
?>