@extends('layout.admin')
    @section('title','Edit Setting')
    @section('body')
    <div class="pagetitle">
          <h1>EditSetting Aplikasi</h1>
          <!-- <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">Forms</li>
              <li class="breadcrumb-item active">Layouts</li>
            </ol>
          </nav> -->
        </div><!-- End Page Title -->
        <section class="section">
          <div class="row">
    
            <div class="col-lg-12">
    
              <div class="card">
                <div class="card-body">
                <h5 class="card-title"><a href="/setting/1" class="btn btn-outline-primary">Kembali</a></h5>
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
                  <!-- Vertical Form -->
                  <form class="row g-3" action="/setting/update" method="POST" enctype="multipart/form-data">
                  @csrf    
                    <div class="row">

                        <div class="col-md-3">
                            <label for="logo" class="form-label">Logo Organisasi</label>
                            <input type="file" class="form-control mb-2" id="logo" name="logo">
                            <img class="logo-organ" style="width: 80%;"  src="/file/setting/{{$getsetting->logo}}" alt="Logo" required>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <label for="nama" class="form-label">Nama Organisasi</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{$getsetting->nama_organisasi}}" required>
                            </div>
                            <div class="row">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="{{$getsetting->alamat}}"required>
                            </div>
                            <div class="row">
                                <label for="telp" class="form-label">Telepon</label>
                                <input type="text" class="form-control" id="telp" name="telp" value="{{$getsetting->telp}}" required>
                            </div>
                           
                        </div>
                    </div>
                    
                    
                    <div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form><!-- Vertical Form -->
    
                </div>
              </div>
            </div>
          </div>
        </section>
    @endsection
