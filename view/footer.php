
<footer>
    &copy; NPMI 2018
</body>

</footer>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        $('#awal').datepicker({dateFormat:'yy-mm-dd'});
        $('#akhir').datepicker({dateFormat:'yy-mm-dd'});
        document.getElementById("search_txt").value = localStorage.getItem("comment");
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

        //$('#tombol').click(function(){
            //var txt = $('#txt1').text();
            //$.get('core/halaman.php',{'q':"text"}).done (function(data){
            //    $('#test').html(data);
           // });
          // $('#test').text("hello");
        //});
        
    });

</script>

<script type ="text/javascript">
function load_ajax(url , callback){
   var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = cekstatus;

    function cekstatus(){
        if(xhr.readyState === 4 && xhr.status === 200){
            callback(xhr.responseText);
        }
    }
    xhr.open('GET', url , true);
    xhr.send();

}
document.getElementById('tombol').onclick = function (){
    text = document.getElementById('txt1').value;

    load_ajax('core/halaman.php?q='+ text, function(data){
        document.getElementById('test').innerHTML= data;
    });

    
};

</script>
