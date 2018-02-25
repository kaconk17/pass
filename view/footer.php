
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

});

</script>
