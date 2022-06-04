@extends('layout.admin')
@section('title','Form Input Pengguna')
@section('body')
<div class="pagetitle">
          <h1>Form Pengguna</h1>
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
                  <h5 class="card-title"><a href="/pengguna" class="btn btn-outline-primary">Kembali</a></h5>
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
                  <form action="/pengguna/store" method="POST" class="row g-3" >
                  @csrf
                        <div class="col-md-5">
                            <label for="nim" class="form-label">NIM / NBM</label>
                            <input type="number" class="form-control" id="nim" name="nim" placeholder="NIM / NBM" required>
                            
                            @error('nim')
                                <small style="color:red">- {{ $message}}</small>
                            @enderror
                            
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
                            @error('nama')
                                <small style="color:red">- {{ $message}}</small>
                            @enderror
                        </div>
                     
                   
                      <div class="row">
                        <div class="col-md-6">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                            @error('username')
                                <small style="color:red">- {{ $message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="psw" class="form-label">Password</label>
                            <input type="password" class="form-control" id="psw"name="psw" placeholder="Password" required>
                            <input type="checkbox" class="custom-control-input" id="customSwitch1" onclick="myFunction()" >
                            <label class="custom-control-label" for="customSwitch1">Show / Hide Password</label>
                            @error('psw')
                                <small style="color:red">- {{ $message}}</small>
                            @enderror
                        </div>
                      </div>
                      <div class="col-md-5">
                        <label for="level" class="form-label">Level</label>
                        <select id="level" class="form-select" name="level" required>
                            <option selected>Choose...</option>
                            <option value="sekret">Sekretaris</option>
                            <option value="bidor">Bidang Organisasi</option>
                            <option value="admin">Administrator</option>
                        </select>
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
@push('after-script')
<script>
  function myFunction() {
    var x = document.getElementById('psw');
    if (x.type === "password") {
        x.type = "text";
    }else{
      x.type = "password"
    }

  }
</script>
@endpush