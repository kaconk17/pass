
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
            $('#icon_dept').css('width', '80px','height','80px');
        },
        function () {
            $('#icon_dept').css('width', '50px', 'height', '50px');
        });
    });
</script>