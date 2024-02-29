<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>NASH Cafe Staff</title>

  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('admininterface/template/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{asset('admininterface/template/assets/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->

  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('admininterface/template/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
  <link rel="stylesheet" href="{{asset('admininterface/template/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
  <link rel="stylesheet" href="{{asset('admininterface/template/assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{asset('admininterface/template/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
  <!-- End plugin css for this page -->

  <!-- inject:css -->
  <!-- endinject -->

  <!-- Layout styles -->
  <link rel="stylesheet" href="{{asset('admininterface/template/assets/css/style.css') }}">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="{{asset('admininterface/template/assets/images/favicon.png') }}" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="">
          <!-- <img src="{{asset('admininterface/template/assets/images/logo.svg') }}" alt="logo" /> -->
          <img src="{{ asset('interface/assets/img/latest.png') }}" alt="Nash Cafe" style="width:100px; height: 100px;">
        </a>
        <a class="sidebar-brand brand-logo-mini" href="">
          <!-- <img src="{{asset('admininterface/template/assets/images/logo-mini.svg') }}" alt="logo" /> -->
          <img src="{{ asset('interface/assets/img/latest.png') }}" alt="Nash Cafe" style="width:auto; height: auto;">
        </a>
      </div>
      <ul class="nav">
        <li class="nav-item profile">
          <div class="profile-desc">
            <div class="profile-pic">
              <div class="count-indicator">
                <img class="img-xs rounded-circle " src="{{asset('admininterface/template/assets/images/faces/face15.jpg') }}" alt="">
                <span class="count bg-success"></span>
              </div>
              <div class="profile-name">
                <h5 class="mb-0 font-weight-normal">{{$staff->name}}</h5>
                <span >{{$staff->username}}</span>
              </div>
            </div>
            <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
          </div>
        </li>
        <li class="nav-item nav-category">
          <span class="nav-link">Navigation</span>
        </li>

        <li class="nav-item menu-items">
          <a href="{{ route('order.list') }}" class="nav-link">
          <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
            <span class="menu-title">List of Orders</span>
          </a>
        </li>
        <li class="nav-item menu-items ">
          <a href="{{ route('staff.logout') }}" class="nav-link" >
            <span class="menu-icon">
                <i class="mdi mdi-security"></i>
            </span>
            <span class="btn btn-danger">Logout</span>
          </a>
        </li>
      </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card corona-gradient-card">
                <div class="card-body py-0 px-0 px-sm-3">
                  <div class="row align-items-center">
                    <div class="col-4 col-sm-3 col-xl-2">
                      <img src="assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Transaction History</h4>
                <canvas id="transaction-history" class="transaction-chart"></canvas>
                <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                  <div class="text-md-center text-xl-left">
                    <h6 class="mb-1">Transfer to Paypal</h6>
                    <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                  </div>
                  <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                    <h6 class="font-weight-bold mb-0">$236</h6>
                  </div>
                </div>
                <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                  <div class="text-md-center text-xl-left">
                    <h6 class="mb-1">Tranfer to Stripe</h6>
                    <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                  </div>
                  <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                    <h6 class="font-weight-bold mb-0">$593</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <!-- content-wrapper ends -->
        <div class="main-panel">
        <div class="content-wrapper">
        <main class="py-4">
          @yield('content')
        </main>
        </div>
        </div>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->

  <!-- Plugin js for this page -->
  <script src="{{asset('admininterface/template/assets/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{asset('admininterface/template/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
  <script src="{{asset('admininterface/template/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
  <script src="{{asset('admininterface/template/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
  <script src="{{asset('admininterface/template/assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
  <!-- End plugin js for this page -->

  <!-- inject:js -->
  <script src="{{asset('admininterface/template/assets/js/off-canvas.js') }}"></script>
  <script src="{{asset('admininterface/template/assets/js/hoverable-collapse.js') }}"></script>
  <script src="{{asset('admininterface/template/assets/js/misc.js') }}"></script>
  <script src="{{asset('admininterface/template/assets/js/settings.js') }}"></script>
  <script src="{{asset('admininterface/template/assets/js/todolist.js') }}"></script>
  <!-- endinject -->

  <!-- Custom js for this page -->
  <script src="{{asset('admininterface/template/assets/js/dashboard.js') }}"></script>
  <!-- End custom js for this page -->
</body>

</html>
