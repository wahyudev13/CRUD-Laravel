@extends('layout.admin')
@section('title', 'Dashboard')
@section('body')
<div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            @if (auth()->user()->level == 'admin'|| auth()->user()->level == 'sekret')
            <!-- Surat masuk -->
            <div class="col-xxl-3 col-md-3">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Surat Masuk</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-envelope-open"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$smasuk}}</h6>
                      <span class="text-success small pt-1 fw-bold">Surat</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Surat Masuk -->
            <!-- Surat Keluar -->
            <div class="col-xxl-3 col-md-3">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Surat Keluar</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-envelope"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$skeluar}}</h6>
                      <span class="text-success small pt-1 fw-bold">Surat</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Surat Keluar -->
            @endif
            @if (auth()->user()->level == 'admin'|| auth()->user()->level == 'bidor')
            <!-- KOmisariat -->
            <div class="col-xxl-3 col-md-3">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Data Komisariat</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-pie-chart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$kom}}</h6>
                      <span class="text-success small pt-1 fw-bold">Komisariat</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Komisariat Card -->
            <!-- KOmisariat -->
            <div class="col-xxl-3 col-md-3">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Data Kader</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$kader}}</h6>
                      <span class="text-success small pt-1 fw-bold">Kader</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Komisariat Card -->
            @endif
          </div>
        </div><!-- End Left side columns -->

        @if (auth()->user()->level == 'admin'|| auth()->user()->level == 'sekret')
          <div class="row">
            <div class="col-lg-6">
              <!-- Website Traffic -->
              <div class="card">
                <div class="card-body pb-0">
                  <h5 class="card-title">Surat Masuk Traffic <span>| Bulan</span></h5>
                  <div id="chartmasuk"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <!-- Website Traffic -->
              <div class="card">
                <div class="card-body pb-0">
                  <h5 class="card-title">Surat Keluar Traffic <span>| Bulan</span></h5>
                  <div id="chartkeluar"></div>
                </div>
              </div>
            </div>
          </div>
       @endif


      </div>
    </section>
@endsection
@push('after-script')
<script>

  var jumlah = <?php echo json_encode($jumlah_surat) ?>;
  var bulan = <?php echo json_encode($bulan) ?>;
  var jmlkeluar = <?php echo json_encode($jml_keluar) ?>;
  var bulankeluar = <?php echo json_encode($bulan_keluar) ?>;

  Highcharts.chart('chartmasuk', {
  title: {
      text: 'Surat Masuk / Bulan'
  },
  yAxis: {
      title: {
          text: 'Jumlah Surat'
      }
  },
  xAxis: {
    //categories : ['January','February','March','April','May','June','July','August','Sepyember','October','November','December']
     categories : bulan
  },
  legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle'
  },
  // plotOptions: {
  //     series: {
  //         label: {
  //             connectorAllowed: false
  //         },
  //         // pointStart: 1
  //     }
  // },
  series: [{
      name: 'Surat Masuk',
      data : jumlah
      //data: [10,1,20,5,3,1,2,5,3,10,18,7]
  },
  // {
  //   name: 'Surat Keluar',
  //   data : jmlkeluar
  // }
  ],
  responsive: {
      rules: [{
          condition: {
              maxWidth: 500
          },
          chartOptions: {
              legend: {
                  layout: 'horizontal',
                  align: 'center',
                  verticalAlign: 'bottom'
              }
          }
      }]
  }
  });

  Highcharts.chart('chartkeluar', {
  title: {
      text: 'Surat Keluar / Bulan'
  },
  yAxis: {
      title: {
          text: 'Jumlah Surat'
      }
  },
  xAxis: {
      categories : bulankeluar
  },
  legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle'
  },
  // plotOptions: {
  //     series: {
  //         label: {
  //             connectorAllowed: false
  //         },
  //         // pointStart: 1
  //     }
  // },
  series: [{
      name: 'Surat Keluar',
      data: jmlkeluar
  }
  ],
  responsive: {
      rules: [{
          condition: {
              maxWidth: 500
          },
          chartOptions: {
              legend: {
                  layout: 'horizontal',
                  align: 'center',
                  verticalAlign: 'bottom'
              }
          }
      }]
  }
  });
</script>
@endpush