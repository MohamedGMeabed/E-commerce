<!-- jquery -->
<script src="{{ URL::asset('assets/admin/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('assets/admin/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script type="text/javascript">var plugin_path = '{{ asset('assets/admin/js') }}/';</script>

<!-- chart -->
<script src="{{ URL::asset('assets/admin/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('assets/admin/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('assets/admin/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('assets/admin/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets/admin/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<!-- toastr -->
@yield('js')
<script src="{{ URL::asset('assets/admin/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('assets/admin/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('assets/admin/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('assets/admin/js/custom.js') }}"></script>


<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    } );
</script>



@if (App::getLocale() == 'en')
    <script src="{{ URL::asset('assets/js/bootstrap-datatables/en/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap-datatables/en/dataTables.bootstrap4.min.js') }}"></script>
@else
    <script src="{{ URL::asset('assets/js/bootstrap-datatables/ar/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap-datatables/ar/dataTables.bootstrap4.min.js') }}"></script>
@endif

