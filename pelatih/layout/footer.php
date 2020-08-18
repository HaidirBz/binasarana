<div class="modal fade" id="modal_logout">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Confirm Logout</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure to log out ?</p><br>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-danger" id="logout_link"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 1.0
  </div>
  <strong>Copyright &copy; 2019 Bina Sarana Mandiri.</a> All rights.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark" style="display: none;">
  <div class="tab-content">
    <div class="tab-pane" id="control-sidebar-home-tab"></div>
  </div>
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script type="text/javascript">
  function sample(value) {
   if(value=="9" || value=="10" || value=="11" || value=="12" || value=="13" || value=="14") {
     document.getElementById('uploadPembayaran').style.display = 'block'; 
     document.getElementById('kelas').style.display = 'none'; 
   }
   else
   {  
     document.getElementById('uploadPembayaran').style.display = 'none';
     document.getElementById('kelas').style.display = 'block';
   }
 }
</script>
<script type="text/javascript">
  //Delete data
  function confirm_delete(url){
    $("#modal_delete").modal('show', {backdrop: 'static'});
    document.getElementById('delete_link').setAttribute('href', url);
  }
  //reset password
  function confirm_reset_password(url){
    $("#modal_reset_password").modal('show', {backdrop: 'static'});
    document.getElementById('reset_password_link').setAttribute('href', url);
  }
  //logout 
  function confirm_logout(){
    $("#modal_logout").modal('show', {backdrop: 'static'});
    document.getElementById('logout_link').setAttribute('href', 'home.php?module=logout');
  }
  //logout 
  function confirm_pembayaran(url){
    $("#modal_pembayaran").modal('show', {backdrop: 'static'});
    document.getElementById('pembayaran_link').setAttribute('href', url);
  }
</script>
<!-- jQuery 3 -->
<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 3.3.7 -->
<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="../assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- DataTables -->
<script src="../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="../assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- Slimscroll -->
<script src="../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- Select2 -->
<script src="../assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../assets/plugins/iCheck/icheck.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    $('#datepicker2').datepicker({
      autoclose: true
    })

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })

    //Initialize Select2 Elements
    $('.select2').select2()

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })

    $('select[name*="pelatihan_dosen_id"]').change(function() {
      $('select[name*="pelatihan_dosen_id"] option').attr('disabled', false); 

      $('select[name*="pelatihan_dosen_id"]').each(function(){
        var $this = $(this);
        $('select[name*="pelatihan_dosen_id"]').not($this).find('option').each(function(){
          if($(this).attr('value') == $this.val())
            $(this).attr('disabled', true);
        });
      });
    });

    $('select[name*="pelatihan_ruang_id"]').change(function() {
      $('select[name*="pelatihan_ruang_id"] option').attr('disabled', false); 

      $('select[name*="pelatihan_ruang_id"]').each(function(){
        var $this = $(this);
        $('select[name*="pelatihan_ruang_id"]').not($this).find('option').each(function(){
          if($(this).attr('value') == $this.val())
            $(this).attr('disabled', true);
        });
      });
    });
  })
</script>
</body>
</html>