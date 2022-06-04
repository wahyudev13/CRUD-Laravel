@extends('layout.admin')
@section('title','Surat Keluar')
@section('body')
<div class="pagetitle">
      <h1>Data Surat Keluar</h1>
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
              <h5 class="card-title"><a href="/surat/keluar/create" class="btn btn-outline-primary">Tambah Data</a></h5>
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
              <!-- Table with stripped rows -->
              <div class="table-responsive">
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">No Surat</th>
                      <th scope="col">Tujuan</th>
                      <th scope="col">Tgl Surat</th>
                      <th scope="col">File Surat</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($suratkeluar as $item)
                      <tr>
                        <td>{{++$i}}</td>
                        <td>{{$item->no_surat}}</td>
                        <td>{{$item->tujuan}}</td>
                        <td>{{$item->tgl_surat}}</td>
                        <td> <a href="/file/suratkeluar/{{$item->file}}" target="_blank"><span class="badge bg-warning"><i class="bi bi-folder me-1"></i> File</span></a></td>
                        <td>
                              <a href="/surat/keluar/edit/{{$item->id_surat_keluar}}" class="btn btn-outline-success"><i class="bi bi-pencil-fill"></i></a>
                              <a href="/surat/keluar/hapus/{{$item->id_surat_keluar}}" class="btn btn-outline-danger" onclick="return confirm('Apa Anda Akan Menghapus Data?')"><i class="bi bi-trash"></i></a>
                        </td>
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