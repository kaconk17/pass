<?php
require_once "core/init.php";
require_once "view/header.php";

?>
<h3>Stock</h3>
<form action="stock.php" method="post">
    <select name="combo_search" id="combo_search">
        <option value=""></option>
        <option value="item">Item</option>
        <option value="spesifikasi">Spesifikasi</option>
        <option value="item_code">Item Code</option>
    </select>
    <input type="text" name="search_txt" id="search_txt">
    
    <input type="button" id="cari_stock" value="Search">
</form>
<br>
<div id="area_stock"></div>
<div class="mundur_stock" style="float:left">
<input type="button" id="first_stock" value="First">
<input type="button" id="back_stock" value="Back">
</div>
<div class="maju_stock" style="float:right">
<input type="button" id="next_stock" class="button" value="Next" >
<input type="button" id="last_stock" class="button" value="Last">
</div>

<script type="text/javascript">
$(document).ready(function () {
    $.get('table/table_stock.php',{'halaman': "1"}).done (function(data){
    $('#area_stock').html(data);
});

$('#cari_stock').click(function(){
        var search = $('#search_txt').val();
        var combo = $('#combo_search').val();
        
        $.get('table/table_stock.php',{'halaman':"1", 'search_txt':search,'combo_search':combo}).done (function(data){
            $('#area_stock').html(data);
        });
       
    });


    $('#next_stock').click(function(){

var search = $('#search_txt').val();
var combo = $('#combo_search').val();
var c = $('.pages_stock').attr("id");
var max = c*1;
var id = $('.page_stock').attr("id");
var a = 1;
var x = (id*1) + a;

if ((id*1) >= max) {
    
    removeClass('maju_stock');
} else {
    if (combo == "") {
        $.get('table/table_stock.php',{'halaman': x}).done (function(data){
    $('#area_stock').html(data);
});
    } else {
        $.get('table/table_stock.php',{'halaman': x,'combo_search':combo,'search_txt':search}).done (function(data){
    $('#area_stock').html(data);
});
    }
    
 }
addClass('mundur_stock');
 
});

$('#last_stock').click(function(){

    var search = $('#search_txt').val();
    var combo1 = $('#combo_search').val();
    var c = $('.pages_stock').attr("id");
    var max = c*1;
    if (combo1 == "") {
        $.get('table/table_stock.php',{'halaman': max}).done (function(data){
        $('#area_stock').html(data);
        });

        removeClass('maju_stock');

        addClass('mundur_stock');
    } else {
        $.get('table/table_stock.php',{'halaman': max,'combo_search':combo1,'search_txt':search}).done (function(data){
        $('#area_stock').html(data);
        });

        removeClass('maju_stock');

         addClass('mundur_stock');
    }

});

$('#back_stock').click(function(){
        var search = $('#search_txt').val();
        var combo = $('#combo_search').val();
        var id = $('.page_stock').attr("id");
        var a = 1;
        var x = (id*1) - a;
        
        if ((id*1) <= a) {
            
             //$('.mundur_stock').hide();
             removeClass('mundur_stock');
        } else {
            if (combo == "") {
                $.get('table/table_stock.php',{'halaman': x}).done (function(data){
                $('#area_stock').html(data);
                });
               
                //$('.maju_stock').show();
                addClass('maju_stock');
            } else {
                $.get('table/table_stock.php',{'halaman': x,'combo_search':combo,'search_txt':search}).done (function(data){
                $('#area_stock').html(data);
                });
               
                //$('.maju_stock').show();
                addClass('maju_stock');
           }
            
         }
        
    });

    $('#first_stock').click(function(){
        var search = $('#search_txt').val();
        var combo = $('#combo_search').val();
        if (combo == "") {
            $.get('table/table_stock.php',{'halaman': "1"}).done (function(data){
        $('#area_stock').html(data);
        });
    
        //$('.maju_stock').show();
        //$('.mundur_stock').hide();
        addClass('maju_stock');
        removeClass('mundur_stock');
        } else {
            $.get('table/table_stock.php',{'halaman': "1",'combo_search':combo,'search_txt':search}).done (function(data){
        $('#area_stock').html(data);
    });
   
    //$('.maju_stock').show();
    //$('.mundur_stock').hide();
    addClass('maju_stock');
        removeClass('mundur_stock');
        }
        
    });

    

});
</script>
<?php

require_once "view/footer.php";
?>