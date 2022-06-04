@extends('layout.admin')
    @section('title','Setting')
    @section('body')
    <div class="pagetitle">
          <h1>Setting Aplikasi</h1>
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
                <h5 class="card-title"><a href="/surat" class="btn btn-outline-primary">Kembali</a></h5>
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
                  <form class="row g-3" action="/setting/store" method="POST" enctype="multipart/form-data">
                  @csrf    
                    <div class="row">

                        <div class="col-md-5">
                            <label for="logo" class="form-label">Logo Organisasi</label>
                            <input type="file" class="form-control" id="logo" name="logo">
                        </div>
                        <div class="col-md-7">
                            <div class="row">
                                <label for="nama" class="form-label">Nama Organisasi</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                            <div class="row">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat">
                            </div>
                            <div class="row">
                                <label for="telp" class="form-label">Telepon</label>
                                <input type="text" class="form-control" id="telp" name="telp">
                            </div>
                           
                        </div>
                    </div>
                    
                    
                    <div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                  </form><!-- Vertical Form -->
    
                </div>
              </div>
            </div>
          </div>
        </section>
    @endsection
