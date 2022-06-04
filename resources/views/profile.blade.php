@extends('layout.admin')
    @section('title','Profile')
    @section('body')
    <div class="pagetitle">
          <h1>Profile</h1>
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
                
                    <table class="table table-bordered">
                        
                        <tbody>
                          <tr>
                            <td style="width: 20%;">NIM</td>
                            <td style="width: 2%;">:</td>
                            <td>{{ auth()->user()->nim }}</td>
                          </tr>
                          <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{ auth()->user()->nama }}</td>
                          </tr>
                         
                          <tr>
                            <td >Level</td>
                            <td>:</td>
                            <td>
                                @if (auth()->user()->level == 'bidor')
                                    Bidang Organisasi
                                @endif
                                @if (auth()->user()->level == 'admin')
                                    Administrator
                                @endif
                                @if (auth()->user()->level == 'sekret')
                                    Sekretaris
                                @endif
                            </td>
                          </tr>
                          
                        </tbody>
                      </table>
                      <!-- End Bordered Table -->
    
                </div>
              </div>
            </div>
          </div>
        </section>
    @endsection
