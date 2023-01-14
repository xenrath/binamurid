<nav class="navbar navbar-card navbar-vertical navbar-expand-xl navbar-card">
  <div class="d-flex align-items-center">
    <div class="toggle-icon-wrapper">
      <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip"
        data-bs-placement="left" title="Toggle Navigation">
        <span class="navbar-toggle-icon">
          <span class="toggle-line"></span>
        </span>
      </button>
    </div>
    <a class="navbar-brand" href="{{ url('/') }}">
      <div class="d-flex align-items-center py-3">
        <span class="font-sans-serif">Bina Murid</span>
      </div>
    </a>
  </div>
  <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
    <div class="navbar-vertical-content scrollbar">
      <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}" role="button"
            aria-expanded="false">
            <div class="d-flex align-items-center">
              <span class="nav-link-icon">
                <span class="fas fa-chart-pie"></span>
              </span>
              <span class="nav-link-text ps-1">Dashboard</span>
            </div>
          </a>
        </li>
        <li class="nav-item">
          <!-- label-->
          <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
            <div class="col-auto navbar-vertical-label">Menu User
            </div>
            <div class="col ps-0">
              <hr class="mb-0 navbar-vertical-divider" />
            </div>
          </div>
          <!-- parent pages-->
          <a class="nav-link {{ request()->is('pendidik*') ? 'active' : '' }}" href="{{ url('pendidik') }}"
            role="button" aria-expanded="false">
            <div class="d-flex align-items-center">
              <span class="nav-link-icon">
                <span class="fas fa-user"></span>
              </span>
              <span class="nav-link-text ps-1">Data Pendidik</span>
            </div>
          </a>
          <!-- parent pages-->
          <a class="nav-link {{ request()->is('orangtua*') ? 'active' : '' }}" href="{{ url('orangtua') }}"
            role="button" aria-expanded="false">
            <div class="d-flex align-items-center">
              <span class="nav-link-icon">
                <span class="fas fa-user"></span>
              </span>
              <span class="nav-link-text ps-1">Data Orang Tua</span>
            </div>
          </a>
          <!-- parent pages-->
          <a class="nav-link {{ request()->is('anak*') ? 'active' : '' }}" href="{{ url('anak') }}" role="button"
            aria-expanded="false">
            <div class="d-flex align-items-center">
              <span class="nav-link-icon">
                <span class="fas fa-user"></span>
              </span>
              <span class="nav-link-text ps-1">Data Anak</span>
            </div>
          </a>
          <!-- label-->
          <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
            <div class="col-auto navbar-vertical-label">Menu User
            </div>
            <div class="col ps-0">
              <hr class="mb-0 navbar-vertical-divider" />
            </div>
          </div>
          <!-- parent pages-->
          <a class="nav-link {{ request()->is('mapel*') ? 'active' : '' }}" href="{{ url('mapel') }}"
            role="button" aria-expanded="false">
            <div class="d-flex align-items-center">
              <span class="nav-link-icon">
                <span class="fas fa-user"></span>
              </span>
              <span class="nav-link-text ps-1">Data Mapel</span>
            </div>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>