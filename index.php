<?php
require_once "core/init.php";

if ( isset($_POST['submit'])) {
   // $cari = $_POST['cari'];
     $tanggal_awal = $_POST['awal'];
    $tanggal_akhir = $_POST['akhir'];
    if (!empty($tanggal_awal) && !empty($tanggal_akhir) ) {

        $_SESSION ['tgl_awal']= $tanggal_awal;
        $_SESSION ['tgl_akhir']= $tanggal_akhir;

        header('Location: global.php');
    } else {
        echo 'Mohon diisi tanggal periodenya';
    }
    
}else {
  
}



require_once "view/header.php";

?>

<form action="index.php" method = "post">
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