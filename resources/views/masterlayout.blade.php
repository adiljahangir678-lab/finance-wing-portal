<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Dashboard-@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
  <meta content="Coderthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <!-- App css -->
  <link href="{{asset('assets/css2/bootstrap-creative.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
  <link href="{{asset('assets/css2/app-creative.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

  <link href="{{asset('assets/css2/bootstrap-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
  <link href="{{asset('assets/css2/app-creative-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" disabled />

  <!-- icons -->
  <link href="{{asset('assets/css2/icons.min.css')}}" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="style.css">
</head>

<body data-layout-mode="detached"
  data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>
  
  <!-- Begin page -->
  <div id="wrapper">
    
    <!-- Topbar Start -->
    <div class="navbar-custom">
      <div class="container-fluid">
        
        <!-- Right Side: Welcome Branch Name + Logout Button -->
        <ul class="list-unstyled topnav-menu float-right mb-0 d-flex align-items-center" style="height: 70px;">
          
          <!-- Branch Name Text -->
          <li class="nav-link text-white font-weight-bold mr-3 my-auto" style="font-size: 0.95rem; line-height: 1;">
            Welcome, {{ Auth::user()->branch_incharge_name }}
          </li>

          <!-- Logout Button -->
          <li class="nav-link my-auto">
            <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-light px-3">
              <i class="fe-log-out mr-1"></i> Logout
            </a>
          </li>

        </ul>

        <!-- LOGO -->
        <div class="logo-box">
          <a href="#" class="logo logo-dark text-center">
            <span class="logo-sm">
              <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22" />
            </span>
            <span class="logo-lg">
              <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="20" />
            </span>
          </a>

          <a href="#" class="logo logo-light text-center">
            <span class="logo-sm">
              <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22" />
            </span>
            <span class="logo-lg">
              <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="20" />
            </span>
          </a>
        </div>

        <!-- Left Menu Toggle Button -->
        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
          <li>
            <button class="button-menu-mobile waves-effect waves-light">
              <i class="fe-menu"></i>
            </button>
          </li>
        </ul>

        <div class="clearfix"></div>
      </div>
    </div>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">
      <div class="h-100" data-simplebar>
        
        <!-- User box -->
        <div class="user-box text-center">
          <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md" />
          <p class="text-muted mt-2">Finance Wing CPO</p>
        </div>

        <!--- Sidemenu -->
        @include('sidebar')
        <!-- End Sidebar -->

        <div class="clearfix"></div>
      </div>
    </div>
    <!-- Left Sidebar End -->

    <!-- Content Area -->
    @yield('content')
  
    {{-- <!-- Footer Start -->
    <footer class="footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            2015 -
            <script>
              document.write(new Date().getFullYear());
            </script>
            &copy; UBold theme by <a href="">Coderthemes</a>
          </div>
          <div class="col-md-6">
            <div class="text-md-right footer-links d-none d-sm-block">
              <a href="javascript:void(0);">About Us</a>
              <a href="javascript:void(0);">Help</a>
              <a href="javascript:void(0);">Contact Us</a>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- end Footer --> --}}

  </div>

  <!-- Right bar overlay-->
  <div class="rightbar-overlay"></div>

  <!-- Vendor js -->
  <script src="{{asset('assets/js2/vendor.min.js')}}"></script>

  <!-- Plugins js-->
  <script src="{{asset('assets/libs2/flatpickr/flatpickr.min.js')}}"></script>
  <script src="{{asset('assets/libs2/apexcharts/apexcharts.min.js')}}"></script>

  <!-- Dashboard 1 init js-->
  <script src="{{asset('assets/js2/pages/dashboard-1.init.js')}}"></script>

  <!-- App js-->
  <script src="{{asset('assets/js2/app.min.js')}}"></script>
</body>

</html>