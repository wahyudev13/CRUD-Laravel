<ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-heading">Menu</li>
      @if (auth()->user()->level == 'sekret'|| auth()->user()->level == 'admin')
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#surat" data-bs-toggle="collapse" href="#">
          <i class="bi bi-envelope"></i><span>Surat</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="surat" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="/surat">
                <i class="bi bi-circle"></i><span>Surat Masuk</span>
              </a>
            </li>
            <li>
              <a href="/surat/keluar">
                <i class="bi bi-circle"></i><span>Surat Keluar</span>
              </a>
            </li>
          
          </ul>
        </li><!-- End Forms Nav -->
      @endif
      @if (auth()->user()->level == 'admin'|| auth()->user()->level == 'bidor')
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Master</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="/komisariat">
                <i class="bi bi-circle"></i><span>Data Komisariat</span>
              </a>
            </li>
            <li>
              <a href="/kader">
                <i class="bi bi-circle"></i><span>Data Kader</span>
              </a>
            </li>
            
          </ul>
        </li><!-- End Forms Nav -->
      @endif

     
    
      <li class="nav-heading">Pages</li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#report" data-bs-toggle="collapse" href="#">
          <i class="bi bi-file-earmark-bar-graph"></i><span>Report</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="report" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          @if (auth()->user()->level == 'admin'|| auth()->user()->level == 'sekret')
          <li>
            <a href="/report/surat/masuk">
              <i class="bi bi-circle"></i><span>Surat Masuk</span>
            </a>
          </li>
          <li>
            <a href="/report/surat/keluar">
              <i class="bi bi-circle"></i><span>Surat Keluar</span>
            </a>
          </li>
          @endif
          @if (auth()->user()->level == 'admin'|| auth()->user()->level == 'bidor')
          <li>
            <a href="/report/kader">
              <i class="bi bi-circle"></i><span>Data Kader</span>
            </a>
          </li>
          @endif
        </ul>
      </li><!-- End Forms Nav -->
      @if (auth()->user()->level == 'admin')
      <li class="nav-item">
        <a class="nav-link collapsed" href="/pengguna">
        <i class="bi bi-person-check"></i>
          <span>Data Pengguna</span>
        </a>
      </li><!-- End Profile Page Nav -->
      @endif
      @if (auth()->user()->level == 'admin')
        <li class="nav-item">
            <a class="nav-link collapsed" href="/setting/1">
            <i class="bi bi-gear"></i>
              <span>Setting</span>
            </a>
        </li><!-- End Profile Page Nav -->
      @endif
    </ul>
    @push('after-script')
    
    @endpush
