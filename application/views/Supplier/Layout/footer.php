<footer class="main-footer">
    <strong>INVENTORY TOKO AGUS</strong>

</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 4 -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- daterangepicker -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('asset/AdminLTE/') ?>dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('asset/AdminLTE/') ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('asset/AdminLTE/') ?>dist/js/demo.js"></script>
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
AdminLTE App
<script src="<?= base_url('asset/AdminLTE/') ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('asset/AdminLTE/') ?>dist/js/demo.js"></script>
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/select2/js/select2.full.min.js"></script>
<!-- page script -->

<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

    })
</script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });

        //Date range picker
        $('#reservationdate').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    });
</script>
<script>
    $("#create_user").click(function() {
        if ($("#show_input_user").first().is(":hidden")) {
            $("#show_input_user").show("slow");
        } else {
            $("#show_input_user").slideUp();
        }
    });
</script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000)
</script>
<script>
    console.log = function() {}
    $("#produk").on('change', function() {

        $(".qty").html($(this).find(':selected').attr('data-qty'));
        $(".qty").val($(this).find(':selected').attr('data-qty'));


        $(".id").html($(this).find(':selected').attr('data-id'));
        $(".id").val($(this).find(':selected').attr('data-id'));

        $(".stok").html($(this).find(':selected').attr('data-stok'));
        $(".stok").val($(this).find(':selected').attr('data-stok'));
    });
</script>

</body>

</html>