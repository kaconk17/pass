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
    echo "<table border ='1' width = '800' id='tblSample' >
    <thead>
    <tr>
    <th rowspan='2'>Departemen</th>
    <th colspan='3'>Total</th>
    <th rowspan='2'>Deatail</th>
    </tr>
    <tr>
    <th>IDR</th>
    <th>USD</th>
    <th>JPY</th>
    </tr>
    </thead>";

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
    <tbody>
   <tr>
   
    <td>".$data['dept']."</td>
    <td align='center'>Rp ".$idr."</td>
    <td align='center'>$ ".$usd."</td>
    <td align='center'>¥ ".$jpy."</td>
<td><a href=list_order.php?item=$data[dept] style=text-decoration:none onclick=post>Detail</a></td>
    </tr></tbody>
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
<script type="text/javascript">
    /*$(document).ready(function () {
        $('#tblSample').each(function () {
            var Column_number_to_Merge = 1;
 
            // Previous_TD holds the first instance of same td. Initially first TD=null.
            var Previous_TD = null;
            var i = 1;
            $("tbody",this).find('tr').each(function () {
                // find the correct td of the correct column
                // we are considering the table column 1, You can apply on any table column
                var Current_td = $(this).find('td:nth-child(' + Column_number_to_Merge + ')');
                 
                if (Previous_TD == null) {
                    // for first row
                    Previous_TD = Current_td;
                    i = 1;
                } 
                else if (Current_td.text() == Previous_TD.text()) {
                    // the current td is identical to the previous row td
                    // remove the current td
                    Current_td.remove();
                    // increment the rowspan attribute of the first row td instance
                    //Previous_TD.attr('rowspan', i + 1);
                    Previous_TD.attr('rowspan', i + 1);
                    i = i + 1;
                } 
                else {
                    // means new value found in current td. So initialize counter variable i
                    Previous_TD = Current_td;
                    i = 1;
                }
            });
        });
    });
    */
</script>