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
                
                  <!-- Vertical Form -->
                  <form class="row g-3 mt-5">
                  
                    <div class="row">

                        <div class="col-md-3">
                            <label for="logo" class="form-label">Logo Organisasi</label><br>
                            
                            <img class="logo-organ" style="width: 80%;" src="/file/setting/{{$getsetting->logo}}" alt="Logo">
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <label for="nama" class="form-label">Nama Organisasi</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{$getsetting->nama_organisasi}}" readonly>
                            </div>
                            <div class="row">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="{{$getsetting->alamat}}" readonly>
                            </div>
                            <div class="row">
                                <label for="telp" class="form-label">Telepon</label>
                                <input type="text" class="form-control" id="telp" name="telp" value="{{$getsetting->telp}}" readonly>
                            </div>
                           
                        </div>
                    </div>
                    
                    
                    <div>
                      <a href="/setting/edit/1" class="btn btn-primary">Edit</a>
                    </div>
                  </form><!-- Vertical Form -->
    
                </div>
              </div>
            </div>
          </div>
        </section>
    @endsection
