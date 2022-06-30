@extends('layout.admin')
@section('title','Data Pengguna')
@section('body')
<div class="pagetitle">
      <h1>Data Pengguna</h1>
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
              <h5 class="card-title"><a href="/formpengguna" class="btn btn-outline-primary">Tambah Data</a></h5>
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
              <table class="table datatable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Level</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach( $tampilpengguna as $value)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$value->nim}}</td>
                        <td>{{$value->nama}}</td>
                        <td>{{$value->username}}</td>
                        <td>{{$value->level}}</td>
                        <td>
                            <a href="/pengguna/edit/{{$value->id_pengguna}}" class="btn btn-outline-success"><i class="bi bi-pencil-fill"></i></a>
                            @if ($value->level != 'admin')
                              <a href="/pengguna/hapus/{{$value->id_pengguna}}" class="btn btn-outline-danger" onclick="return confirm('Apa Anda Akan Menghapus Data?')"><i class="bi bi-trash"></i></a>
                            @endif
                           
                            

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
    </section>
@endsection