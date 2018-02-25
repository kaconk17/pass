$(document).ready(function(){
/* fungsi load & cari halaman price */
    $('#tombol').click(function(){
        var search = $('#search_txt').val();
        var combo = $('#combo_search').val();
        
        $.get('table/halaman.php',{'halaman':"1", 'search_txt':search,'combo_search':combo}).done (function(data){
            $('#area').html(data);
        });
       
    });
    $.get('table/halaman.php',{'halaman':"1"}).done (function(data){
            $('#area').html(data);
        });
    
    $('#btn_next').click(function(){

        var search = $('#search_txt').val();
        var combo = $('#combo_search').val();
        var c = $('.pages').attr("id");
        var max = c*1;
        var id = $('.page').attr("id");
        var a = 1;
        var x = (id*1) + a;

        if ((id*1) >= max) {
             removeClass('maju');

        } else {
            if (combo == "") {
                $.get('table/halaman.php',{'halaman': x}).done (function(data){
            $('#area').html(data);
        });
            } else {
                $.get('table/halaman.php',{'halaman': x,'combo_search':combo,'search_txt':search}).done (function(data){
            $('#area').html(data);
        });
            }
            
         }
        
         addClass('mundur');
    



    });
$('#btn_last').click(function(){

        var search = $('#search_txt').val();
        var combo1 = $('#combo_search').val();
        var c = $('.pages').attr("id");
        var max = c*1;
      if (combo1 == "") {
        $.get('table/halaman.php',{'halaman': max}).done (function(data){
        $('#area').html(data);
    });
    removeClass('maju');
    addClass('mundur');
       } else {
        $.get('table/halaman.php',{'halaman': max,'combo_search':combo1,'search_txt':search}).done (function(data){
        $('#area').html(data);
   });
    removeClass('maju');
    addClass('mundur');
}
        
    });

    $('#btn_back').click(function(){
        var search = $('#search_txt').val();
        var combo = $('#combo_search').val();
        var id = $('.page').attr("id");
        var a = 1;
        var x = (id*1) - a;
        
        if ((id*1) <= a) {
             removeClass('mundur');
        } else {
            if (combo == "") {
                $.get('table/halaman.php',{'halaman': x}).done (function(data){
                $('#area').html(data);
    });
    addClass('maju');
            } else {
                $.get('table/halaman.php',{'halaman': x,'combo_search':combo,'search_txt':search}).done (function(data){
                $('#area').html(data);
    });
    addClass('maju');
           }
            
         }
        
    });
    $('#btn_first').click(function(){
        var search = $('#search_txt').val();
        var combo = $('#combo_search').val();
        if (combo == "") {
            $.get('table/halaman.php',{'halaman': "1"}).done (function(data){
        $('#area').html(data);
    });
    removeClass('mundur');
    addClass('maju');
        } else {
            $.get('table/halaman.php',{'halaman': "1",'combo_search':combo,'search_txt':search}).done (function(data){
        $('#area').html(data);
    });
    removeClass('mundur');
    addClass('maju');
        }
        
    });

/*===============================================================*/


    
});