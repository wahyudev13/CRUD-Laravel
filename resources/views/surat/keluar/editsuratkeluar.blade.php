@extends('layout.admin')
    @section('title','Edit Surat Keluar')
    @section('body')
    <div class="pagetitle">
          <h1>Edit Surat Keluar</h1>
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
                <h5 class="card-title"><a href="/surat/keluar" class="btn btn-outline-primary">Kembali</a></h5>
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
                  <form class="row g-3" action="/surat/keluar/update" method="POST" enctype="multipart/form-data">
                  @csrf    
                  <input type="hidden" name="id" value="{{$suratkeluar->id_surat_keluar}}">
                  <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="no_surat" class="form-label">No Surat</label>
                            <input type="text" class="form-control" id="no_surat" name="no_surat" placeholder="No Surat"  value="{{$suratkeluar->no_surat}}" required>
                        </div>
                      </div>
                   
                      <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tgl_surat" class="form-label">Tanggal Surat</label>
                            <input type="date" class="form-control" id="tgl_surat"name="tgl_surat"  value="{{$suratkeluar->tgl_surat}}"  required>
                        </div>
                      </div>
                    <div class="row mb-3">
                      <div class="col-md-12">
                        <label for="perihal" class="form-label">Perihal</label>
                        <input type="text" class="form-control" id="perihal" name="perihal" placeholder="Perihal" value="{{$suratkeluar->perihal}}"  required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      
                      <div class="col-md-6">
                        <label for="lampiran" class="form-label">Jumlah Lampiran</label>
                        <input type="number" class="form-control" id="lampiran" name="lampiran" placeholder="Jumlah Lampiran" value="{{$suratkeluar->lampiran}}"required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-12">
                        <label for="tujuan" class="form-label">Tujuan Surat</label>
                        <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Tujuan Surat" value="{{$suratkeluar->tujuan}}" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-12">
                        <label for="file" class="form-label">File Surat</label>
                        <input type="file" class="form-control" id="file" name="file" placeholder="File Surat">
                      </div>
                    </div>
                    
                    
                    <div>
                      <button type="submit" class="btn btn-primary">Ganti</button>
                     
                    </div>
                  </form><!-- Vertical Form -->
    
                </div>
              </div>
            </div>
          </div>
        </section>
    @endsection
