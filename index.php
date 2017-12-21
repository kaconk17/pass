<?php
require_once "core/init.php";

if ( isset($_POST['submit'])) {
    $cari = $_POST['cari'];
    $tanggal_awal = $_POST['awal'];
    $tanggal_akhir = $POST['akhir'];
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

<form action="global.php" method = "post">
    <label for="">From</label><br>
    <input type="text" id="awal" name="awal"> <br><br>
    <label for="">To</label><br>
    <input type="text" id="akhir" name="akhir"> <br>
    <input type="submit" name="submit" value="Submit">
    

</form>



<?php

require_once "view/footer.php";
?> 
<script type="text/javascript">
    $(document).ready(function () {
        $('#awal').datepicker({dateFormat:'yy-mm-dd'});
        $('#akhir').datepicker({dateFormat:'yy-mm-dd'});
    });
</script>