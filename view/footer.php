
<footer>
    &copy; NPMI 2018
</body>

</footer>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        $('#awal').datepicker({dateFormat:'yy-mm-dd'});
        $('#akhir').datepicker({dateFormat:'yy-mm-dd'});

        $('#icon_dept').hover(function(){
            $('#icon_dept').animate({
                height:'80px',
                width: '80px'
            });
        },
        function () {
            $('#icon_dept').animate({
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
    });
</script>