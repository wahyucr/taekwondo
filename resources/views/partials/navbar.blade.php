<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                {{-- <img alt="image" src="/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1"> --}}
                <div class="d-sm-none d-lg-inline-block">
                    @if (auth()->check())
                        @if (auth()->user()->admin)
                            {{ auth()->user()->admin->nama }} - {{ auth()->user()->role->role }}
                        @elseIf(auth()->user()->pelatih)
                            {{ auth()->user()->pelatih->nama }} - {{ auth()->user()->role->role }}
                        @elseIf(auth()->user()->penguji)
                            {{ auth()->user()->penguji->nama }} - {{ auth()->user()->role->role }}
                        @endif
                    @endif
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                Swal.fire({
                                    title: 'Konfirmasi Keluar',
                                    text: 'Apakah Anda yakin ingin keluar?',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Ya, Keluar!'
                                  }).then((result) => {
                                    if (result.isConfirmed) {
                                      document.getElementById('logout-form').submit();
                                    }
                                  });">
                    <i class="fas fa-sign-out-alt"></i> {{ __('Keluar') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </a>
            </div>
        </li>
    </ul>
</nav>
