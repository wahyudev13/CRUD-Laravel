@extends('layout.admin')
@section('title','Report Surat Masuk')
@section('body')
<div class="pagetitle">
      <h1>Report Surat Masuk</h1>
      <!-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav> -->
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">
                  <form action="" method="get">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="yourPassword" class="form-label">Tgl Diterima</label>
                            <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" required>
                        </div>
                        
                        <div class="col-md-3">
                            <label for="yourPassword" class="form-label">Tgl Diterima</label>
                            <input type="date" class="form-control" id="tgl_akhir"name="tgl_akhir" required>
                        </div>
                        
                        <div class="col-md-3">
                            <button style="margin-top: 28px;" type="submit" class="btn btn-success">Filter</button>
                        </div>
                    </div>


                  </form>


              </h5>
              
              <!-- Table with stripped rows -->
              <div class="table-responsive">
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">No Surat</th>
                    <th scope="col">Pengirim</th>
                    <th scope="col">Jenis Surat</th>
                    <th scope="col">Tanggal Diterima</th>
                    <th scope="col">File Surat</th>
                   
                  </tr>
                </thead>
                <tbody>
                  @foreach($suratmasuk as $masuk)
                    <tr>
                      <td>{{++$i}}</td>
                      <td>{{$masuk->no_surat}}</td>
                      <td>{{$masuk->pengirim}}</td>
                      <td>
                        @if($masuk->jenis == 'permohonan') Permohonan @endif
                        @if($masuk->jenis == 'undangan') Undangan @endif
                        @if($masuk->jenis == 'lain') Lain-lain @endif

                      </td>
                      <td>{{ date("d M Y",strtotime($masuk->tgl_diterima))}}</td>
                      <td> <a href="/file/suratmasuk/{{$masuk->file}}" target="_blank"><span class="badge bg-warning"><i class="bi bi-folder me-1"></i> File</span></a></td>
                      
                    </tr>
                  @endforeach
                  
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              </div>
              

            </div>
          </div>

        </div>
      </div>
    </section>
@endsection