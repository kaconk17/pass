<?php
require_once "core/init.php";

if ( isset($_POST['submit'])) {
    $cari = $_POST['cari'];
    
    if (!empty(trim($tulisan))) {
        
        cari_item($cari);

    } else {
        echo 'kosong';
    }
    
}


require_once "view/header.php";

?>

<form action="index.php" method = "post">
    <label for="">Cari</label>
    <input type="text" name="cari">
    <input type="submit" name="submit" value="Cari">
</form>


<?php
require_once "view/footer.php";
?>