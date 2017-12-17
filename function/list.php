<?php
$item = $_GET['item'];
echo $item;
function cari_item($cari){

    global $conn;

    $query = "SELECT item_code, item, spesifikasi, qty, uom, class FROM tb_out WHERE remark IS NULL AND item_code LIKE '%".$cari."%'";
    if (sqlsrv_query($conn, $query)) {
       
    } else {
        # code...
    }
    
}

?>