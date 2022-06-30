 
 
 <!-- Vendor JS Files -->
<script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
  {{-- <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script> --}}
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Data Tables -->
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
 <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
 <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
 

  <!-- <script src="asset(assets/select2/js/select2.full.min.js"></script> -->
  <script src="{{asset('assets/select2/js/select2.min.js')}}"></script>
  <!-- <script src="asset(assets/select2/jquery.select2.js"></script>
  <script src="asset(assets/select2/jquery.shim.js"></script> -->
  <!-- <script src="asset(assets/select2/js/select2.js"></script> -->
  
  
  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>
  <script src="{{asset('assets/vendor/highcharts/highcharts.js')}}"></script>
  {{-- <script src="https://code.highcharts.com/highcharts.js"></script> --}}
  
  @stack('after-script')