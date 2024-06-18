@extends('layout.admin')
@section('title','Data Rapat')
@section('body')
<div class="pagetitle">
      <h1>Data Rapat</h1>
      <!-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav> -->
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><a href="/formrapat" class="btn btn-outline-primary">Tambah Data</a></h5>
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
        
              <table class="table datatable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Rapat</th>
                    <th scope="col">Tgl Rapat</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>   
                    @foreach ($rapat as $item)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$item->nama_rapat}}</td>
                            <td>{{$item->tgl_rapat}}</td>
                            <td>
                            @if ($item->status == 'aktif')
                                <span class="badge bg-success">Belum Terlaksana</span>
                            @else
                                <span class="badge bg-danger">Sudah Terlaksana</span>

                            @endif
                            
                            </td>
                            <td>
                              
                                {{-- <input  style="width: 50%;display: inline;"  data-id="{{$item->id_rapat}}" id="copytext-{{$item->id_rapat}}" type="text" class="form-control " value="{{ url('/')}}/rekap/rapat/{{$item->uuid}}"> --}}
                                {{-- <button data-id="{{$item->id_rapat}}" id="copybtn-{{$item->id_rapat}}" class="btn btn-outline-primary btn-copy" title="Copy Link"><i class="bi bi-link-45deg"></i></button> --}}
                               
                                <a href="/rekap/rapat/{{$item->uuid}}" target="_blank" class="btn btn-outline-primary" title="Copy Link"><i class="bi bi-link-45deg"></i></a>
                                <a href="/rapat/edit/{{$item->id_rapat}}" class="btn btn-outline-success" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                <a href="/rapat/hapus/{{$item->id_rapat}}" class="btn btn-outline-danger" onclick="return confirm('Apa Anda Akan Menghapus Data?')" title="Hapus"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr> 
                    @endforeach         
                    
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            
            </div>
          </div>

        </div>
      </div>
    </section>
@endsection

@push('after-script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
  $(document).ready(function () { 
    $('table').on('click','.btn-copy',function(){
      var getdata = $(this).attr('data-id');
     
      console.log(getdata);

    // const copyBtn = document.getElementById(`copybtn${getdata}`)
    // const copyText = document.getElementsByName('copybtn')
    document.getElementById(`copytext-${getdata}`).select();    
    document.execCommand('copy');  
      Swal.fire({         
        icon: 'success',
        title: `Text Berhasil di Copy`,
        showConfirmButton: false,
        timer: 1000
    });
    

    });
   });
    
</script>
@endpush