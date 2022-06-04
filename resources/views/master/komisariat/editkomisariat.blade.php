@extends('layout.admin')
@section('title','Edit Data Komisariat')
@section('body')
<div class="pagetitle">
          <h1>Edit Data Komisariat</h1>
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
                  <h5 class="card-title"><a href="/komisariat" class="btn btn-outline-primary">Kembali</a></h5>
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
                  <form action="/komisariat/update" method="POST" class="row g-3" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" class="form-control" id="cid" name="cid" value="{{$getdata->id_komisariat}}" required>
                        <div class="col-8 mb-3">
                            <label for="komisariat" class="form-label">Nama Komisariat</label>
                            <input type="text" class="form-control" id="komisariat" name="komisariat" placeholder="Nama Komisariat" value="{{$getdata->nama_komisariat}}" required>
                            
                            @error('komisariat')
                                <small style="color:red">- {{ $message}}</small>
                            @enderror
                            
                        </div>
    
                   
                        <div class="row mb-3"">
                            <div class="col-6">
                                <label for="fakultas" class="form-label">Fakultas</label>
                                <input type="text" class="form-control" id="fakultas" name="fakultas" placeholder="Fakultas" value="{{$getdata->fakultas}}"required>
                                @error('fakultas')
                                    <small style="color:red">- {{ $message}}</small>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="univ" class="form-label">Universitas</label>
                                <input type="text" class="form-control" id="univ"name="univ" placeholder="Universitas" value="{{$getdata->univ}}"required>
                               
                                @error('univ')
                                    <small style="color:red">- {{ $message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="fakultas" class="form-label">Logo Komisariat</label>
                                <input type="file" class="form-control" id="logo" name="logo" value="{{$getdata->logo}}">
                                <img style="width: 40%; margin-top:9px" calass="logo-kom" src="/file/logo/{{$getdata->logo}}" alt="Logo {{$getdata->nama}}">
                                @error('logo')
                                    <small style="color:red">- {{ $message}}</small>
                                @enderror
                            </div>
                        </div>
                    <div>
                      <button type="submit" class="btn btn-primary">Ubah</button>

                    </div>
                  </form><!-- Vertical Form -->
    
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection
@push('after-script')
@endpush