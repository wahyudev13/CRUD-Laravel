@extends('layout.admin')
    @section('title','Ubah Password')
    @section('body')
    <div class="pagetitle">
          <h1>Ubah Password</h1>
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
                <div class="card-body" style="padding: 20px 20px 20px 20px;">
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
                    <form action="/account/password/ubah" method="post">
                        @csrf
                        <input type="hidden" name="cid" value="{{auth()->user()->id_pengguna}}">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="pass1" class="form-label">Password Baru</label>
                                <input type="text" class="form-control" id="pass1" name="pass1" required>
                            </div>
                            
                            <div class="col-md-3">
                                <label for="pass2" class="form-label">Ketik Ulang Password</label>
                                <input type="text" class="form-control" id="pass2" name="pass2" required>
                            </div>
                            
                            <div class="col-md-3">
                                <button  style="margin-top: 30px;" type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
    
    
                      </form>
                    
    
                </div>
              </div>
            </div>
          </div>
        </section>
    @endsection
