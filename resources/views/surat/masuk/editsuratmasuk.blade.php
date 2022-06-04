@extends('layout.admin')
    @section('title','Edit Surat Masuk')
    @section('body')
    <div class="pagetitle">
          <h1>Edit Surat Masuk</h1>
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
                  <form class="row g-3" action="/surat/masuk/update" method="POST" enctype="multipart/form-data">
                  @csrf    
                  <input type="hidden" name="cid" value="{{$masukid->id_surat_masuk}}">
                  <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="no_surat" class="form-label">No Surat</label>
                            <input type="text" class="form-control" id="no_surat" name="no_surat" placeholder="No Surat" value="{{$masukid->no_surat}}" required>
                        </div>
                      </div>
                   
                      <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tgl_diterima" class="form-label">Tanggal Diterima</label>
                            <input type="date" class="form-control" id="tgl_diterima" value="{{$masukid->tgl_diterima}}"name="tgl_diterima">
                        </div>
                        <div class="col-md-6">
                            <label for="tgl_surat" class="form-label">Tanggal Surat</label>
                            <input type="date" class="form-control" id="tgl_surat" value="{{$masukid->tgl_surat}}" name="tgl_surat">
                        </div>
                      </div>
                    <div class="row mb-3">
                      <div class="col-md-12">
                        <label for="perihal" class="form-label">Perihal</label>
                        <input type="text" class="form-control" id="perihal" name="perihal"value="{{$masukid->perihal}}" placeholder="Perihal">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-6">
                        <label for="jenis" class="form-label">Jenis Surat</label>
                        <select id="jenis" class="form-select" name="jenis" required>
                            <option>Pilih Jenis Surat...</option>
                            <option value="undangan" @if($masukid->jenis == "undangan") selected @endif>Undangan</option>
                            <option value="permohonan"  @if($masukid->jenis == "permohonan") selected  @endif>Permohonan Dana</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label for="lampiran" class="form-label">Jumlah Lampiran</label>
                        <input type="number" class="form-control" id="lampiran" name="lampiran" value="{{$masukid->jml_lampiran}}" placeholder="Jumlah Lampiran">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-12">
                        <label for="pengirim" class="form-label">Pengirim Surat</label>
                        <input type="text" class="form-control" id="pengirim" name="pengirim" value="{{$masukid->pengirim}}" placeholder="Pengirim Surat">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-12">
                        <label for="file" class="form-label">File Surat</label>
                        <input type="file" class="form-control" id="file" name="file" value="{{$masukid->file}}">
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
