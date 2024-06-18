<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Form Kehadiran Rapat {{$namarapat}}</title>
  <meta content="Silahkan Isi Kehadiran dengan Benar" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.ico')}}" rel="icon">
  <link href="{{asset('assets/img/favicon.ico')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- assets/vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- select2-->
  <link href="{{asset('assets/select2/css/select2.min.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/select2/css/select2.css')}}" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="#" class="logo align-items-center w-auto">
                  <span class="d-none d-lg-block">Absensi Kehadiran Rapat</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">
               
                  <div class="pt-4 pb-2">
                    @if ($status == 'tidak')
                  <div class="alert alert-danger  text-center" role="alert">
                      <strong>Rapat Sudah Berakhir</strong>
                  </div>
                  @else
                    <h5 class="card-title text-center pb-0 fs-4"></h5>
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-1"></i>
                        {{Session::get('success')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if(Session::has('fail'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-1"></i>
                        {{Session::get('fail')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <p class="text-center small">Mohon mengisi kehadiran dengan jujur</p>
                  </div>
                  
                  <form class="row g-3 needs-validation" action="/rekap/rapat/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="col-12">
                      <label for="nama" class="form-label">Nama Lengkap</label>
                      <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" required>
                     
                    </div>
                    <div class="col-12">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <select id="jabatan" class="form-select" name="jabatan" required>
                            <option selected>Pilih Jabatan...</option>
                            <option value="ketum">Ketua Umum</option>
                            <option value="kabidor">Ketua Bidang Organisasi</option>
                            <option value="kabider">Ketua Bidang Kader</option>
                            <option value="karpk">Ketua Bidang Riset dan Pengembangan Keilmuan</option>
                            <option value="kati">Ketua Bidang Immawati</option>
                            <option value="kawu">Ketua Bidang Ekonomi dan Kewirausahaan</option>
                            <option value="kahim">Ketua Bidang Hikmah, Politik dan Kebijakan Publik</option>
                            <option value="kasos">Ketua Bidang Sosial dan Pemberdayaan Masyarakat</option>
                            <option value="kais">Ketua Bidang Tabligh dan Kajian Keislaman</option>
                            <option value="kabo">Ketua Bidang Seni, Budaya dan Olahraga</option>
                            <option value="kamed">Ketua Bidang Media dan Komunikasi</option>
                            <option value="sekret">Sekretaris Umum</option>
                            <option value="sekbidor">Sekretaris Bidang Organisasi</option>
                            <option value="sekbider">Sekretaris Bidang Kader</option>
                            <option value="sekrpk">Sekretaris Bidang Riset dan Pengembangan Keilmuan</option>
                            <option value="sekti">Sekretaris Bidang Immawati</option>
                            <option value="sekwu">Sekretaris Bidang Ekonomi dan Kewirausahaan</option>
                            <option value="sekhim">Sekretaris Bidang Hikmah, Politik dan Kebijakan Publik</option>
                            <option value="seksos">Sekretaris Bidang Sosial dan Pemberdayaan Masyarakat</option>
                            <option value="sekis">Sekretaris Bidang Tabligh dan Kajian Keislaman</option>
                            <option value="sekbo">Sekretaris Bidang Seni, Budaya dan Olahraga</option>
                            <option value="sekmed">Sekretaris Bidang Media dan Komunikasi</option>
                            <option value="bendum">Bendahara Umum</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="kegiatan" class="form-label">Nama Kegiatan</label>
                        @foreach ($datarapat as $item)
                            <input type="hidden" name="idrapat" value="{{$item->id_rapat}}">
                            <input type="text" id="kegiatan" class="form-control" name="kegiatan" value="{{$item->nama_rapat}}" readonly>
                        @endforeach
                        
                    </div>
                    <div class="col-12">
                        <label for="catatan" class="form-label">Catatan</label>
                        <textarea type="text" name="catatan" class="form-control" id="catatan" placeholder="Catatan" required></textarea>
                       
                      </div>
                    <div class="col-12">
                      <label for="foto" class="form-label">Upload Foto Bukti Kehadiran</label>
                      <input type="file" name="foto" class="form-control" id="foto" required>
                     
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Submit</button>
                    </div>
                    {{-- <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="pages-login.html">Log in</a></p>
                    </div> --}}
                  </form>
                  @endif
                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
                {{-- Develop By MEDKOM IMM GRESIK --}}
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

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

    <!-- <script src="asset(assets/select2/js/select2.full.min.js"></script> -->
    <script src="{{asset('assets/select2/js/select2.min.js')}}"></script>
    <!-- <script src="asset(assets/select2/jquery.select2.js"></script>
    <script src="asset(assets/select2/jquery.shim.js"></script> -->
    <!-- <script src="asset(assets/select2/js/select2.js"></script> -->
    
    
    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>

    <script>
      $(document).ready(function() {
          $('.js-example-basic-multiple').select2();
      
          $(".utama").select2({
              placeholder: "Perkaderan Utama"
              });
          $(".khusus").select2({
             placeholder: "Perkaderan Khusus"
          });
      });
      </script>

</body>

</html>