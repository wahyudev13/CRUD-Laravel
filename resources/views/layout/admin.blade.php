<!DOCTYPE html>
<html lang="en">

<head>
    @include('partial.head')
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    @include('partial.navbar')
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    @include('partial.sidebar')
  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    @yield('body')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('partial.footer')
  
    <!-- ======= Back to TOP ======= -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  @include('partial.js')

</body>

</html>