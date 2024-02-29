<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>NASH Cafe Admin</title>
  <link rel="stylesheet" href="{{asset('admininterface/template/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('admininterface/template/assets/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('admininterface/template/assets/vendors/jvectormap/jquery-jvectormap.css')}}">
  <link rel="stylesheet" href="{{asset('admininterface/template/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{asset('admininterface/template/assets/vendors/owl-carousel-2/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('admininterface/template/assets/vendors/owl-carousel-2/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('admininterface/template/assets/css/style.css')}}">
  <link rel="shortcut icon" href="{{asset('admininterface/template/assets/images/favicon.png')}}" />
  <link rel="stylesheet" href="{{asset('admininterface/template/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('admininterface/template/assets/images/favicon.png')}}" />
</head>
<body>
  
  <div class="container-scroller">
    
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="">
          <!-- <img src="{{asset('admininterface/template/assets/images/logo.svg')}}" alt="logo" /> -->
          <img src="{{ asset('interface/assets/img/latest.png') }}" alt="Nash Cafe" style="width:100px; height: 100px;">
        </a>
        <a class="sidebar-brand brand-logo-mini" href="">
          <!-- <img src="{{asset('admininterface/template/assets/images/logo-mini.svg')}}" alt="logo" /> -->
          <img src="{{ asset('interface/assets/img/latest.png') }}" alt="Nash Cafe" style="width:100px; height: 100px;">
        </a>
      </div>
      <ul class="nav">
      <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="{{asset('admininterface/template/assets/images/faces/face15.jpg')}}" alt="">
                  
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name" >
                  <h5 class="mb-0 font-weight-normal">Control Panel</h5>
                  
                  <span >Cafe Admin</span>
                </div>
              </div>
      
            </div>
          </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
          <a href="{{ route('admin.index') }}" class="nav-link">
          <span class="menu-icon">
                <i class="mdi mdi-security"></i>
            </span>
            <span class="menu-title"> Admin Home</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a href="{{ route('admin.product.index') }}" class="nav-link">
          <span class="menu-icon">
                <i class="mdi mdi-security"></i>
            </span>
            <span class="menu-title">List of Products</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a href="{{ route('admin.order.index') }}" class="nav-link">
            
            <span class="menu-icon"><i class="mdi mdi-table-large"></i></span>
            <span class="menu-title">List of Orders</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a href="{{ route('admin.payment.index') }}" class="nav-link">
          <span class="menu-icon">
                <i class="mdi mdi-security"></i>
            </span>
            <span class="menu-title">List of Payments</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a href="{{ route('admin.customer.index') }}" class="nav-link">
          <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
            </span>
            <span class="menu-title">List of Customers</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a href="{{ route('admin.staff.index') }}" class="nav-link">
            <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
            </span>
            <span class="menu-title">List of Staff</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a href="{{ route('admin.category.table') }}" class="nav-link">
          <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
            <span class="menu-title">List of Category</span>
          </a>
        </li>
        <li class="nav-item menu-items ">
          <a href="{{ route('admin.logout') }}" class="nav-link" >
            <span class="menu-icon">
                <i class="mdi mdi-security"></i>
            </span>
            <span class="btn btn-danger">Logout</span>
          </a>
        </li>
      </ul>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <nav class="navbar p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('admininterface/template/assets/images/logo-mini.svg')}}" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
          <ul class="navbar-nav w-100">
            
          </ul>
        </div>
      </nav>
      <div class="main-panel">
        <div class="content-wrapper">
          <main class="py-8">
            @yield('content')
          </main>
        </div>
 
         </div>
    </div>
  </div>
  </div>
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  <script src="{{asset('admininterface/template/assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('admininterface/template/assets/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('admininterface/template/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
  <script src="{{asset('admininterface/template/assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
  <script src="{{asset('admininterface/template/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
  <script src="{{asset('admininterface/template/assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>
  <script src="{{asset('admininterface/template/assets/js/off-canvas.js')}}"></script>
  <script src="{{asset('admininterface/template/assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('admininterface/template/assets/js/misc.js')}}"></script>
  <script src="{{asset('admininterface/template/assets/js/settings.js')}}"></script>
  <script src="{{asset('admininterface/template/assets/js/todolist.js')}}"></script>
  <script src="{{asset('admininterface/template/assets/js/dashboard.js')}}"></script>

  <script src="{{asset('admininterface/template/assets/js/chart.js')}}"></script>

</body>
</html>
