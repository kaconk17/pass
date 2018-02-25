<?php
require_once "core/init.php";
require_once "view/header.php";

if (isset($_GET['item'])) {
    $_SESSION['dept']= $_GET['item'];
    $dept= $_SESSION['dept'];
 $tanggal_awal = $_SESSION['tgl_awal'];
 $tanggal_akhir = $_SESSION['tgl_akhir'];
} else {
    $dept= $_SESSION['dept'];
    $tanggal_awal = $_SESSION['tgl_awal'];
    $tanggal_akhir = $_SESSION['tgl_akhir'];
}

?>
<h3 class="total_order" id="<?php echo $dept ?>">Total Order <?php echo $dept  ?></h3>

<div class='tanggal_awal' id="<?php echo $tanggal_awal; ?>" style='float:left'> From <?php echo $tanggal_awal; ?> </div>  <div class='tanggal_akhir' id="<?php echo $tanggal_akhir; ?>" style='float:left'>To <?php echo $tanggal_akhir; ?> </div> <br>
<br>
<div id="order_area"></div>

<div class="mundur_order" style="float:left">
<input type="button" id="first_order" value="First">
<input type="button" id="back_order" value="Back">
</div>
<div class="maju_order" style="float:right">
<input type="button" id="next_order" class="button" value="Next" >
<input type="button" id="last_order" class="button" value="Last">
</div>
<?php

require_once "view/footer.php";
?>
<script type="text/javascript">
$(document).ready(function(){
    var dept = $('.total_order').attr("id");
    var awal = $('.tanggal_awal').attr("id");
    var akhir = $('.tanggal_akhir').attr("id");

    $.get('table/table_order.php',{'halaman': "1", 'dept':dept,'tgl_awal':awal,'tgl_akhir':akhir}).done (function(data){
    $('#order_area').html(data);
});
$('#next_order').click(function(){

    var dept = $('.total_order').attr("id");
    var awal = $('.tanggal_awal').attr("id");
    var akhir = $('.tanggal_akhir').attr("id");
    var c = $('.pages_order').attr("id");
    var max = c*1;
    var id = $('.page_order').attr("id");
    var a = 1;
    var x = (id*1) + a;

if ((id*1) >= max) {
    
    removeClass('maju_order');
} else {
   
        $.get('table/table_order.php',{'halaman': x, 'dept':dept,'tgl_awal':awal,'tgl_akhir':akhir}).done (function(data){
    $('#order_area').html(data);
});
   
    
 }
addClass('mundur_order');
 
});

$('#last_order').click(function(){

    var dept = $('.total_order').attr("id");
    var awal = $('.tanggal_awal').attr("id");
    var akhir = $('.tanggal_akhir').attr("id");
    var c = $('.pages_order').attr("id");
    var max = c*1;
    

    $.get('table/table_order.php',{'halaman': max, 'dept':dept,'tgl_awal':awal,'tgl_akhir':akhir}).done (function(data){
        $('#order_area').html(data);
        });

        removeClass('maju_order');

        addClass('mundur_order');


});

$('#back_order').click(function(){

var dept = $('.total_order').attr("id");
var awal = $('.tanggal_awal').attr("id");
var akhir = $('.tanggal_akhir').attr("id");
var id = $('.page_order').attr("id");
var a = 1;
var x = (id*1) - a;

if ((id*1) <= a) {

removeClass('mundur_order');
} else {

    $.get('table/table_order.php',{'halaman': x, 'dept':dept,'tgl_awal':awal,'tgl_akhir':akhir}).done (function(data){
$('#order_area').html(data);
});


}
addClass('maju_order');

});

$('#first_order').click(function(){

var dept = $('.total_order').attr("id");
var awal = $('.tanggal_awal').attr("id");
var akhir = $('.tanggal_akhir').attr("id");


$.get('table/table_order.php',{'halaman': "1", 'dept':dept,'tgl_awal':awal,'tgl_akhir':akhir}).done (function(data){
    $('#order_area').html(data);
    });

    removeClass('mundur_order');

    addClass('maju_order');


});

});
</script>