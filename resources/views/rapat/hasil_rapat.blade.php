@extends('layout.admin')
@section('title','Data Rekap Rapat')
@section('body')
<div class="pagetitle">
      <h1>Data Rekap Rapat</h1>
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
                <h5 class="card-title"></h5>
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
        
              <table class="table datatable2" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Rapat</th>
                    <th scope="col">Catatan</th>
                    <th scope="col">Bukti Foto</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>   
                    @foreach ($hasil as $item)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$item->nama_kader}}</td>
                            <td>{{$item->jabatan}}</td>
                            <td>{{$item->nama_rapat}}</td>
                            <td>{{$item->catatan}}</td>
                            <td><img src="/file/bukti_rapat/{{$item->bukti_foto}}" width="50px" height="auto" alt="bukti_rapat"></td>
                            
                            <td>
                                <a href="/rapat/rekap/hapus/{{$item->id_rekap}}" class="btn btn-outline-danger" onclick="return confirm('Apa Anda Akan Menghapus Data?')"><i class="bi bi-trash"></i></a>
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
<script>
  $(".datatable2").DataTable({
    dom: 'Bfrtip',
    buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
  });
</script>
@endpush