@extends('layout.admin')
@section('title','Edit Rapat')
@section('body')
<div class="pagetitle">
          <h1>Edit Rapat</h1>
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
                        <form action="/rapat/update" method="POST" class="row g-3">
                                @csrf
                                <input type="hidden" name="cid" value="{{$rapat->id_rapat}}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="nama" class="form-label">Nama Kegiatan</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Kegiatan" value="{{$rapat->nama_rapat}}" required>
                                        @error('nama')
                                            <small style="color:red">- {{ $message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="tgl" class="form-label">Tanggal Kegiatan</label>
                                        <input type="date" class="form-control" id="tgl" name="tgl" value="{{$rapat->tgl_rapat}}" required>
                                        @error('tgl')
                                            <small style="color:red">- {{ $message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="status" class="form-label">Status Kegiatan</label>
                                        <select id="status" class="form-select" name="status" >
                                            {{-- <option selected>Pilih Status...</option> --}}
                                            <option value="aktif" @if($rapat->status == 'aktif') selected @endif>Belum Terlaksana</option>
                                            <option value="tidak" @if($rapat->status == 'tidak') selected @endif>Sudah Terlaksana</option>
                                        </select>
                                        @error('status')
                                            <small style="color:red">- {{ $message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div>
                                    <button type="submit" class="btn btn-primary">Update</button>
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