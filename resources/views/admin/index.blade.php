<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <span class="d-none d-lg-block">Control Shop</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        
        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              Tavar nomi
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">soni</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            
            <li class="dropdown-footer">
              <a href="#">Hammasini ko'rish</a>
            </li>

          </ul>
          
          <!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
            <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->name}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{Auth::user()->name}}</h6>
              <span>{{Auth::user()->role}}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('users.show',Auth::user()->id) }}">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <!-- <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li> -->

            <li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                @csrf
                <button class="w-100 btn btn-outline-danger">Sign Out</button>
              </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

<li class="nav-heading">Sotuv bo'limi</li>

    <li class="nav-item ">
        <a class="nav-link" href="{{ route('dashbord') }}">
        <i class="bi bi-grid btn btn-warning"></i>
        <span>Dashboard</span>
        </a>
    </li><!-- End Dashboard Nav -->


<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-layout-text-window-reverse btn btn-warning"></i><span>Sotuv Paneli</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
        <a href="{{ route('shop-index') }}">
        <i class="bi bi-circle "></i><span>Asosiy Sotuv paneli</span>
        </a>
    </li>
    <li>
        <a href="{{ route('sotuvlar') }}">
        <i class="bi bi-circle"></i><span>Sotuvlar ro'yxati</span>
        </a>
    </li>
    </ul>
</li><!-- End Sotuv Nav -->

<li class="nav-heading">Omborxona</li>
<!-- Kategory start -->
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-menu-button-wide   btn btn-warning"></i><span>Kategoriyalar</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
        <a href="{{ route('category.index') }}">
        <i class="bi bi-circle"></i><span>Hamma Kategoriyalar</span>
        </a>
    </li>
    <li>
        <a href="{{ route('category.create') }}">
        <i class="bi bi-circle"></i><span>Kategoriya Yaratish</span>
        </a>
    </li>
    </ul>
</li><!-- End Kategoriya Nav -->

<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-journal-text   btn btn-warning"></i><span>Tavarlar</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
        <a href="{{ route('product.index') }}">
        <i class="bi bi-circle"></i><span>Hamma Tavarlar</span>
        </a>
    </li>
    <li>
        <a href="{{ route('product.create') }}">
        <i class="bi bi-circle"></i><span>Tavar Yaratish</span>
        </a>
    </li>
    </ul>
</li><!-- End Tavar Nav -->


<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-gem btn btn-warning"></i><span>Omborxona</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
        <a href="{{ route('ombor') }}">
        <i class="bi bi-circle"></i><span>Asosiy Omborxona</span>
        </a>
    </li>
    </ul>
</li><!-- End Icons Nav -->
<li class="nav-item">
    <a class="nav-link collapsed"  href="{{ route('taminot.index') }}">
    <i class="bi bi-arrow-down-square-fill btn btn-warning"></i><span>Taminot</span>
    </a>
    
</li>
<li class="nav-heading">Qarz</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('qarz.index') }}">
    <i class="bi bi-bank btn btn-warning"></i>
    <span>Qarz</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('shaxsiyqarz.index') }}">
    <i class="bi bi-bank btn btn-warning"></i>
    <span>Shaxsiy Qarz</span>
    </a>
</li>
<!-- hodim -->
<li class="nav-heading">Hodim</li>
<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-hodim" data-bs-toggle="collapse" href="#">
    <i class="bi bi-menu-button-wide btn btn-warning"></i><span>Hodimlar</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-hodim" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
        <a href="{{ route('hodim.index') }}">
        <i class="bi bi-circle"></i><span>Hamma Hodimlar</span>
        </a>
    </li>
    <li>
        <a href="{{ route('hodim.show') }}">
        <i class="bi bi-circle"></i><span>Hodimlar daftari </span>
        </a>
    </li>
    </ul>
</li>
<!-- admin -->

<li class="nav-heading">Adminstrator</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('users.index') }}">
    <i class="bi bi-person btn btn-warning"></i>
    <span>Users</span>
    </a>
</li><!-- End Profile Page Nav -->

<li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('users.create') }}">
    <i class="bi bi-card-list btn btn-warning"></i>
    <span>Register</span>
    </a>
</li><!-- End Register Page Nav -->

<li class="nav-item">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
        @csrf
        <button class="w-100 btn btn-outline-danger">Sign Out</button>
    </form>
</li><!-- End Login Page Nav -->

</ul>
</aside><!-- End Sidebar-->
<div class="container content my-5 py-4">
    @yield('content')
</div>

  <!-- ======= Footer ======= -->
  <!-- <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer>End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>