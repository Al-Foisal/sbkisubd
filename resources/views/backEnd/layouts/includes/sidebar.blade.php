  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/admin/dashboard')}}" class="brand-link">
      <img src="{{asset('public/backEnd')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><strong>Hatbodol</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" >
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="image ">
              <img src="{{asset(auth::user()->image)}}" class="img-circle elevation-2" alt="User brand-imagee">
            </div>
          </div>
          <div class="col-lg-12">
            <div class="info">
              <i class="fa fa-circle"></i>
              <a href="#" class="d-block">{{auth::user()->name}}</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @if(Auth::user()->role_id==1)
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="sidebar-icon fe fe-user"></i>
              <p>
                Users
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/superadmin/user/add')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/superadmin/user/manage')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Manage</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- nav item end -->
          @endif
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <i class="sidebar-icon fa fa-houzz"></i>
              <p>
                Logo
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/editor/logo/add')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/editor/logo/manage')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Manage</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- nav item end -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="sidebar-icon fe fe-text-align-left"></i>
              <p>
                Reports
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/show/ads/request')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Ads Request</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- nav item end -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="sidebar-icon fe fe-bar-chart"></i>
              <p>
                Ad Report
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/editor/ad/reports/')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Ad Report List </p>
                </a>
              </li>
            </ul>
          </li>
          <!-- nav item end -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="sidebar-icon fe fe-text-align-left"></i>
              <p>
                Category
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/editor/category/add')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/editor/category/manage')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Manage</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- nav item end -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="sidebar-icon fe fe-sunny-o"></i>
              <p>
                Subcategory
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/editor/subcategory/add')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/editor/subcategory/manage')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Manage</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- nav item end -->

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="sidebar-icon fe fe-tag"></i>
              <p>
                Tag
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/editor/tag/add')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/editor/tag/manage')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Manage</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- nav item end -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="sidebar-icon fe fe-cage"></i>
              <p>
                City
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/editor/city/add')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/editor/city/manage')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Manage</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- nav item end -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="sidebar-icon fe fe-map"></i>
              <p>
                Area
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/editor/area/add')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/editor/area/manage')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Manage</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="sidebar-icon fe fe-book"></i>
              <p>
                Custom Ads
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/editor/customads/add')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/editor/customads/manage')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Manage</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="sidebar-icon fe fe-book"></i>
              <p>
               Contact Info
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/editor/contactinfo/add')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/editor/contactinfo/manage')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Manage</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- nav item end -->
         <!--  <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="sidebar-icon fe fe-feather"></i>
              <p>
                Writter
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/editor/writter/add')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/editor/writter/manage')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Manage</p>
                </a>
              </li>
            </ul>
          </li> -->
          <!-- nav item end -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="sidebar-icon fe fe-bar-chart"></i>
              <p>
                Reports
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/customer/list')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Customer List </p>
                </a>
              </li>
            </ul>
          </li>
          <!-- nav item end -->
          
          
          
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
