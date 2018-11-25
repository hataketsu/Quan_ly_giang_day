@if(Auth::check())
    <script>
        current_user_id = '{{Auth::id()}}';
    </script>
@endif

<!-- jQuery 3 -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/bower_components/fastclick/lib/fastclick.js"></script>

<script src="/adminlte/js/adminlte.min.js"></script>
<script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>


<script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/bower_components/iCheck/icheck.min.js"></script>
<script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="/js/bootstrap-confirmation.min.js"></script>
<script src="/js/bootbox.min.js"></script>
<script src="/bower_components/raty/lib/jquery.raty.js"></script>

<script src="/bower_components/select2/dist/js/select2.full.min.js"></script>

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();
    });
    _token='{{csrf_token()}}';

</script>



