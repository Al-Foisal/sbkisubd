
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong> Developerd By<a target="_blank" href="https://www.gatewayit.net/"> Gateway IT</a>.</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark right-sidebar" style="background: #6069C6;padding: 20px 0">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link">
              <img src="{{asset('public/backEnd/images/sign-out.png')}}">
              <p>Logout</p>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
             </form>
            </a>
          </li>
          <!-- nav item end -->
          <li class="nav-item has-treeview">
            <a href="{{url('password/change')}}" class="nav-link">
             <img src="{{asset('public/backEnd/images/key.png')}}">
              <p>Change Password</p>
            </a>
          </li>
          <!-- nav item end -->
      </ul>
    </nav>
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('public/backEnd/')}}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/backEnd/')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/backEnd/')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('public/backEnd/')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('public/backEnd/')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('public/backEnd/')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('public/backEnd/')}}/plugins/jqvmap/maps/jquery.vmap.world.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('public/backEnd/')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('public/backEnd/')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('public/backEnd/')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('public/backEnd/')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('public/backEnd/')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/backEnd/')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- FastClick -->
<script src="{{asset('public/backEnd/')}}/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/backEnd/')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/backEnd/')}}/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
</body>

<!-- Mirrored from adminlte.io/themes/dev/AdminLTE/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Sep 2018 07:33:22 GMT -->
</html>
