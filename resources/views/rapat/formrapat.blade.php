@extends('layout.admin')
@section('title','Form Rapat')
@section('body')
<div class="pagetitle">
          <h1>Form Rapat</h1>
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
                        <h5 class="card-title"><a href="/rapat" class="btn btn-outline-primary">Kembali</a></h5>
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
                        <form action="/rapat/store" method="POST" class="row g-3" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="nama" class="form-label">Nama Kegiatan</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Kegiatan" required>
                                        @error('nama')
                                            <small style="color:red">- {{ $message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tgl" class="form-label">Tanggal Kegiatan</label>
                                        <input type="date" class="form-control" id="tgl" name="tgl" placeholder="Nama Kegiatan" required>
                                        @error('tgl')
                                            <small style="color:red">- {{ $message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                        </form><!-- Vertical Form -->
        
                    </div><!--End Card Body-->
                </div><!--End Card-->
            </div>
          </div>
        </section>
@endsection
@push('after-script')

@endpush