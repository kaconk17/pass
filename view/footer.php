
<footer>
    &copy; NPMI 2018
</body>

</footer>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        $('#awal').datepicker({dateFormat:'yy-mm-dd'});
        $('#akhir').datepicker({dateFormat:'yy-mm-dd'});

        $('#alldept_btn').hover(function(){
            $('#alldept_btn').css('color: blue');
        },
        function () {
            $('#alldept_btn').css('color: red');
        });
    });
</script>