<?php
require_once "core/init.php";
require_once "view/header.php";


?>
<h3>Total Order</h3>

<form action="total_order.php" method = "post">
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

     echo "<p>From ".$tanggal_awal." To ".$tanggal_akhir."</p>";
    $query = "SELECT dept, sum(amount)as total, currency FROM tb_incoming WHERE arrive_date >= '$tanggal_awal' AND arrive_date <= '$tanggal_akhir' group by dept, currency order by dept asc ";
    $result= sqlsrv_query ($conn, $query);
    echo "<table border ='1' width = '800'>
    </script>
    <tr>
    <th rowspan='2'>Departemen</th>
    <th colspan='3'>Total</th>
    <th rowspan='2'>Deatail</th>
    </tr>
    <tr>
    <th>IDR</th>
    <th>USD</th>
    <th>JPY</th>
    </tr>";

    setlocale(LC_MONETARY, 'en_US');

while ($data = sqlsrv_fetch_array($result)){

    if ($data['currency'] == "USD") {
        $usd = number_format( $data['total'],3);
        $jpy = 0;
        $idr=0;
    } elseif ($data['currency'] == "JPY") {
        $jpy= number_format( $data['total']);
        $idr=0;
        $usd=0;
    } else {
        $idr= number_format( $data['total']);
        $usd=0;
        $jpy=0;
    }
    
    

    $angka = number_format($data['total']);

    echo "
   <tr>
   
    <td>".$data['dept']."</td>
    <td align='center'>Rp ".$idr."</td>
    <td align='center'>$ ".$usd."</td>
    <td align='center'>¥ ".$jpy."</td>
<td><a href=list_order.php?item=$data[dept] style=text-decoration:none onclick=post>Detail</a></td>
    </tr>
    ";
    //sqlsrv_close();
}

} else {
    
}

    
?>
</table>
<?php

require_once "view/footer.php";
?>