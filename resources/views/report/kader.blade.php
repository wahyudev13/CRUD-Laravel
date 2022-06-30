@extends('layout.admin')
@section('title','Report Kader')
@section('body')
<div class="pagetitle">
      <h1>Report Kader</h1>
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
                            <label for="yourPassword" class="form-label">Tgl Masuk IMM</label>
                            <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" required>
                        </div>
                        
                        <div class="col-md-3">
                            <label for="yourPassword" class="form-label">Tgl Masuk IMM</label>
                            <input type="date" class="form-control" id="tgl_akhir"name="tgl_akhir" required>
                        </div>
                        
                        <div class="col-md-3">
                            
                            <button style="margin-top: 28px;" type="submit" class="btn btn-success">Filter</button>
                        </div>
                    </div>


                  </form>


              </h5>
              
              <!-- Table with stripped rows -->
         
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Komisariat</th>
                    <th scope="col">Tahun Masuk</th>
                    <th scope="col">Foto</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($kader as $item)
                    <tr>
                      <td>{{++$i}}</td>
                      <td>{{$item->nama}}</td>
                      <td>{{$item->nama_komisariat}}</td>
                      <td>{{date("d M Y",strtotime($item->tahun))}}</td>
                      <td> <a href="/file/foto/{{$item->foto}}" target="_blank"><span class="badge bg-warning"><i class="bi bi-folder me-1"></i> File</span></a></td>
                      
                    </tr>
                  @endforeach
                  
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
          
              

            </div>
          </div>

        </div>
      </div>
    </section>
@endsection