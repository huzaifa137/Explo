<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Explo Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/assets2/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/assets2/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/assets2/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/assets2/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/assets2/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/assets2/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="/assets2/images/favicon.png" />
  </head>
  <body>

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
          <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="{{route('Admin.AgentDashboard')}}"><img src="/assets2/images/logo.svg" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="{{route('Admin.AgentDashboard')}}"><img src="/assets2/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <div class="search-field d-none d-xl-block">
              <form class="d-flex align-items-center h-100" action="#">
                <div class="input-group">
                  <div class="input-group-prepend bg-transparent">
                    <i class="input-group-text border-0 mdi mdi-magnify"></i>
                  </div>
                  <input type="text" class="form-control bg-transparent border-0" placeholder="Search ">
                </div>
              </form>
            </div>
            <ul class="navbar-nav navbar-nav-right">
              {{-- <li class="nav-item  dropdown d-none d-md-block">
                <a class="nav-link dropdown-toggle" id="reportDropdown" href="#" data-toggle="dropdown" aria-expanded="false"> Reports </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="reportDropdown">
                  <a class="dropdown-item" href="#">
                    <i class="mdi mdi-file-pdf mr-2"></i>PDF </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">
                    <i class="mdi mdi-file-excel mr-2"></i>Excel </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">
                    <i class="mdi mdi-file-word mr-2"></i>doc </a>
                </div>
              </li> --}}
             
              <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <div class="nav-profile-img">
                    <img src="{{ url('public/agent_profile_pic/'.$LoggedUser1->profile_photo) }}" alt="image">
                  </div>
                  <div class="nav-profile-text">
                    <p class="mb-1 text-black">{{$LoggedUser1['fname']}}</p>
                  </div>
                </a>
                <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                  <div class="p-3 text-center bg-primary">
                    <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{ url('public/agent_profile_pic/'.$LoggedUser1->profile_photo) }}" alt="">
                  </div>
                  <div class="p-2">
                    <h5 class="dropdown-header text-uppercase pl-2 text-dark">Agent Options</h5>
                    <a class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="{{route('auth.agent-logout')}}">
                      <span>Log Out</span>
                      <i class="mdi mdi-logout ml-1"></i>
                    </a>
                  </div>
                </div>
              </li>
              
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
          <!-- partial:partials/_sidebar.html -->
          <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
              <li class="nav-item nav-category">Main</li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('Admin.AgentDashboard')}}">
                  <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                  <span class="menu-title">Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                  <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
                  <span class="menu-title">Tasks</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('All-assigned-Tasks')}}">Assigned Tasks</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('All-completed-Tasks')}}">Completed Tasks</a></li>
                  </ul>
                </div>
              </li>
            </ul>
          </nav>
                @yield('content')
          <footer class="footer">
            <div class="footer-inner-wraper">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © codeeagles.com 2022</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
              </div>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/assets2/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/assets2/vendors/chart.js/Chart.min.js"></script>
    <script src="/assets2/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/assets2/js/off-canvas.js"></script>
    <script src="/assets2/js/hoverable-collapse.js"></script>
    <script src="/assets2/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="/assets2/js/dashboard.js"></script>
    <!-- End custom js for this page -->
</body>
</html>