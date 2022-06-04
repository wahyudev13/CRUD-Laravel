@extends('layout.admin')
@section('title','Edit Kader')
@section('body')
<div class="pagetitle">
          <h1>Edit Kader</h1>
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
                  <h5 class="card-title"><a href="/kader" class="btn btn-outline-primary">Kembali</a></h5>
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
                  <form action="/kader/update" method="POST" class="row g-3" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" class="form-control" id="id_kader" name="id_kader" value="{{$getder->id_kader}}" required>
                        <div class="row mb-2">
                            <div class="col-md-5 ">
                                <label for="nim" class="form-label">NIM / NBM</label>
                                <input type="number" class="form-control" id="nim" name="nim" placeholder="NIM / NBM"  value="{{$getder->nim}}" required>
                                
                                @error('nim')
                                    <small style="color:red">- {{ $message}}</small>
                                @enderror
                                
                            </div>
                            <div class="col-md-7">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="{{$getder->nama}}" required>
                                
                                @error('nama')
                                    <small style="color:red">- {{ $message}}</small>
                                @enderror
                                
                            </div>
                        </div>
                        <div class="row mb-3"">
                            <div class="col-md-3">
                                <label for="notelp" class="form-label">Nomor Whatsapp</label>
                                <input type="number" class="form-control" id="notelp" name="notelp" placeholder="Nomor Whatsapp" value="{{$getder->nomor}}" required>
                                @error('notelp')
                                    <small style="color:red">- {{ $message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-9">
                                <label for="alamat" class="form-label">Alamat Tinggal Sekarang</label>
                                <input type="text" class="form-control" id="alamat"name="alamat" placeholder="Alamat Tinggal Sekarang" value="{{$getder->alamat}}" required>
                               
                                @error('alamat')
                                    <small style="color:red">- {{ $message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3"">
                            <div class="col-md-4">
                                <label for="tempat" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Tempat Lahir" value="{{$getder->tempat}}" required>
                                @error('tempat')
                                    <small style="color:red">- {{ $message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-8">
                                <label for="tgllahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgllahir"name="tgllahir" value="{{$getder->tanggal}}"required>
                               
                                @error('tgllahir')
                                    <small style="color:red">- {{ $message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3"">
                            <div class="col-md-4">
                                <label for="kom" class="form-label">Asal Komisariat</label>
                                <select id="kom" class="form-select" name="kom" required>
                                    <option selected>Pilih Komisariat...</option>
                                    @foreach($getkom as $value)
                                        <option value="{{$value->id_komisariat}}" @if($getder->id_komisariat == $value->id_komisariat) selected @endif>{{$value->nama_komisariat}}</option>
                                   @endforeach
                                </select>
                                @error('kom')
                                    <small style="color:red">- {{ $message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-8">
                                <label for="masuk" class="form-label">Tahun Masuk IMM</label>
                                <input type="date" class="form-control" id="masuk"name="masuk" value="{{$getder->tahun}}"required>
                               
                                @error('masuk')
                                    <small style="color:red">- {{ $message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3"">
                            <div class="col-md-8">
                                <label for="jabatan" class="form-label">Jabatan di IMM</label>
                                <select id="jabatan" class="form-select" name="jabatan" required>
                                    <option selected>Pilih Jabatan...</option>
                                    <option value="ketum" @if($getder->jabatan == 'ketum') selected @endif>Ketua Umum</option>
                                    <option value="kabidor" @if($getder->jabatan == 'kabidor') selected @endif>Ketua Bidang Organisasi</option>
                                    <option value="kabider" @if($getder->jabatan == 'kabider') selected @endif>Ketua Bidang Kader</option>
                                    <option value="karpk" @if($getder->jabatan == 'karpk') selected @endif>Ketua Bidang Riset dan Pengembangan Keilmuan</option>
                                    <option value="kati" @if($getder->jabatan == 'kati') selected @endif>Ketua Bidang Immawati</option>
                                    <option value="kawu" @if($getder->jabatan == 'kawu') selected @endif>Ketua Bidang Ekonomi dan Kewirausahaan</option>
                                    <option value="kahim" @if($getder->jabatan == 'kahim') selected @endif>Ketua Bidang Hikmah, Politik dan Kebijakan Publik</option>
                                    <option value="kasos" @if($getder->jabatan == 'kasos') selected @endif>Ketua Bidang Sosial dan Pemberdayaan Masyarakat</option>
                                    <option value="kais" @if($getder->jabatan == 'kais') selected @endif>Ketua Bidang Tabligh dan Kajian Keislaman</option>
                                    <option value="kabo" @if($getder->jabatan == 'kabo') selected @endif>Ketua Bidang Seni, Budaya dan Olahraga</option>
                                    <option value="kamed" @if($getder->jabatan == 'kamed') selected @endif>Ketua Bidang Media dan Komunikasi</option>
                                    <option value="sekret" @if($getder->jabatan == 'sekret') selected @endif>Sekretaris Umum</option>
                                    <option value="sekbidor" @if($getder->jabatan == 'sekbidor') selected @endif>Sekretaris Bidang Organisasi</option>
                                    <option value="sekbider" @if($getder->jabatan == 'sekbider') selected @endif>Sekretaris Bidang Kader</option>
                                    <option value="sekrpk" @if($getder->jabatan == 'sekrpk') selected @endif>Sekretaris Bidang Riset dan Pengembangan Keilmuan</option>
                                    <option value="sekti" @if($getder->jabatan == 'sekti') selected @endif>Sekretaris Bidang Immawati</option>
                                    <option value="sekwu" @if($getder->jabatan == 'sekwu') selected @endif>Sekretaris Bidang Ekonomi dan Kewirausahaan</option>
                                    <option value="sekhim" @if($getder->jabatan == 'sekhim') selected @endif>Sekretaris Bidang Hikmah, Politik dan Kebijakan Publik</option>
                                    <option value="seksos" @if($getder->jabatan == 'seksos') selected @endif>Sekretaris Bidang Sosial dan Pemberdayaan Masyarakat</option>
                                    <option value="sekis" @if($getder->jabatan == 'sekis') selected @endif>Sekretaris Bidang Tabligh dan Kajian Keislaman</option>
                                    <option value="sekbo" @if($getder->jabatan == 'sekbo') selected @endif>Sekretaris Bidang Seni, Budaya dan Olahraga</option>
                                    <option value="sekmed" @if($getder->jabatan == 'sekmed') selected @endif>Sekretaris Bidang Media dan Komunikasi</option>
                                    <option value="bendum" @if($getder->jabatan == 'bendum') selected @endif>Bendahara Umum</option>
                                </select>
                                @error('jabatan')
                                    <small style="color:red">- {{ $message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="posisi" class="form-label">Posisi Jabatan</label>
                                <select id="posisi" class="form-select" name="posisi" required>
                                    <option selected>Pilih Komisariat...</option>
                                    @foreach($getkom as $value)
                                        <option value="{{$value->id_komisariat}}" @if($getder->id_komisariat == $value->id_komisariat) selected @endif>{{$value->nama_komisariat}}</option>
                                    @endforeach
                                </select>
                                @error('posisi')
                                    <small style="color:red">- {{ $message}}</small>
                                @enderror
                            </div>
                            
                        </div>
                        <div class="row mb-3"">
                            <div class="col-md-6">
                                <label for="utama" class="form-label">Perkaderan Utama</label>
                                <select class="form-select js-example-basic-multiple utama" name="utama[]" multiple="multiple" required>
                                    @foreach($getUtama as $utama)
                                        <option value="{{$utama->id_per}}" {{in_array($utama->id_per,$getperutama) ? 'selected' : ''}}>{{$utama->nama_perka}}</option>
                                    @endforeach
                                
                                </select>
                                @error('utama')
                                    <small style="color:red">- {{ $message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="khusus" class="form-label">Perkaderan Khusus</label>
                                <select class="form-select js-example-basic-multiple khusus" name="khusus[]" multiple="multiple">
                                    @foreach($getKhusus as $khusus)
                                        <option value="{{$khusus->id_per}}" {{in_array($khusus->id_per,$getperkhusus) ? 'selected' : ''}}>{{$khusus->nama_perka}}</option>
                                    @endforeach
                                </select>
                                @error('khusus')
                                    <small style="color:red">- {{ $message}}</small>
                                @enderror
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="foto" class="form-label">Upload Foto Formal</label>
                                <input type="file" class="form-control" id="foto" name="foto">
                                <img class="fotokader" style="width: 50%;margin-top:10px" src="{{asset('file/foto').'/'.$getder->foto}}" alt="" srcset="">
                                @error('foto')
                                    <small style="color:red">- {{ $message}}</small>
                                @enderror
                            </div>
                        </div>
                    <div>
                      <button type="submit" class="btn btn-primary">Ubah</button>
                      {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
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
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();

    $(".utama").select2({
        placeholder: "Perkaderan Utama"
        });
    $(".khusus").select2({
       placeholder: "Perkaderan Khusus"
    });
});
</script>

@endpush