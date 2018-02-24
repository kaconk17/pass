
<footer>
    &copy; NPMI 2018
</body>

</footer>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        $('#awal').datepicker({dateFormat:'yy-mm-dd'});
        $('#akhir').datepicker({dateFormat:'yy-mm-dd'});
       
        $('#btn_pemakaian').hover(function(){
            $('#btn_pemakaian').animate({
                height:'80px',
                width: '80px'
            });
        },
        function () {
            $('#btn_pemakaian').animate({
                height:'50px',
                width:'50px'
            });
        });

        $('#stock').hover(function(){
            $('#stock').animate({
                height:'80px',
                width: '80px'
            });
        },
        function () {
            $('#stock').animate({
                height:'50px',
                width:'50px'
            });
        });

        $('#btn_price').hover(function(){
            $('#btn_price').animate({
                height:'80px',
                width: '80px'
            });
        },
        function () {
            $('#btn_price').animate({
                height:'50px',
                width:'50px'
            });
        });

        $('#btn_buy').hover(function(){
            $('#btn_buy').animate({
                height:'80px',
                width: '80px'
            });
        },
        function () {
            $('#btn_buy').animate({
                height:'50px',
                width:'50px'
            });
        });

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

//var search = $('#search_txt').val();
//var combo = $('#combo_search').val();
            var c = $('.pages').attr("id");
            var max = c*1;
            var id = $('.page').attr("id");
            var a = 1;
            var x = (id*1) + a;

            if ((id*1) >= max) {
                 removeClass('maju');
            } else {
     
             }
            $.get('table/halaman.php',{'halaman': x}).done (function(data){
            $('#area').html(data);
        });
        addClass('mundur');
        



        });
$('#btn_last').click(function(){
            var c = $('.pages').attr("id");
            var max = c*1;
           
            $.get('table/halaman.php',{'halaman': max}).done (function(data){
            $('#area').html(data);
        });
        removeClass('maju');
        addClass('mundur');
        });

        $('#btn_back').click(function(){
            
            var id = $('.page').attr("id");
            var a = 1;
            var x = (id*1) - a;

            if ((id*1) <= a) {
                 removeClass('mundur');
            } else {
     
             }
            $.get('table/halaman.php',{'halaman': x}).done (function(data){
            $('#area').html(data);
        });
        addClass('maju');
        });
        $('#btn_first').click(function(){
            $.get('table/halaman.php',{'halaman': "1"}).done (function(data){
            $('#area').html(data);
        });
        removeClass('mundur');
        addClass('maju');
        });
        
});

</script>