<div class="sidebar-brand">
    <a href="/">
        <img src="/assets/img/auth-logo.jpeg" alt="Logo" style="max-height: 40px;">
        SI Taekwondo
    </a>
</div>
<div class="sidebar-brand sidebar-brand-sm">
    <a href="/"><img src="/assets/img/auth-logo.jpeg" alt="Logo" style="max-height: 40px;"></a>
</div>
<ul class="sidebar-menu">
    <li><a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i>
            <span>Dashboard</span></a>
    </li>

    @if (auth()->user()->role->role == 'admin')
        <li><a class="nav-link" href="/anggota"><i class="fas fa-users-viewfinder"></i>
                <span>Anggota Atia</span></a>
        </li>
        <li><a class="nav-link" href="/pelatih"><i class="fas fa-users"></i>
                <span>Pelatih</span></a>
        </li>
        <li><a class="nav-link" href="/pendaftaran"><i class="fas fa-address-card"></i>
                <span>Pendaftaran</span></a>
        </li>

        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                    class="fas fa-users-rectangle"></i>
                <span>Peserta UKT</span></a>
            <ul class="dropdown-menu">
                @foreach ($geups as $geup)
                    <li><a class="nav-link" href="/peserta-ukt/geup/{{ $geup->id }}">{{ $geup->geup }}</a></li>
                @endforeach
            </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-lines"></i>
                <span>Nilai Peserta</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="/nilai">Nilai</a></li>
                <li><a class="nav-link" href="/input-nilai">Input Nilai</a></li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-info"></i>
                <span>Informasi</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="/penguji">Penguji</a></li>
                <li><a class="nav-link" href="/kegiatan">Kegiatan</a></li>
            </ul>
        </li>
    @elseif (auth()->user()->role->role == 'pelatih')
        <li><a class="nav-link" href="/anggota"><i class="fas fa-users-viewfinder"></i>
                <span>Anggota Atia</span></a>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                    class="fas fa-users-rectangle"></i>
                <span>Peserta UKT</span></a>
            <ul class="dropdown-menu">
                @foreach ($geups as $geup)
                    <li><a class="nav-link" href="/peserta-ukt/geup/{{ $geup->id }}">{{ $geup->geup }}</a></li>
                @endforeach
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-lines"></i>
                <span>Nilai Peserta</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="/nilai">Nilai</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-info"></i>
                <span>Informasi</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="/kegiatan">Kegiatan</a></li>
            </ul>
        </li>
    @elseif (auth()->user()->role->role == 'penguji')
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-lines"></i>
                <span>Nilai Peserta</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="/nilai">Nilai</a></li>
                <li><a class="nav-link" href="/input-nilai">Input Nilai</a></li>
            </ul>
        </li>
    @endif
    <li><a class="nav-link" href="/profil"><i class="fas fa-user"></i>
            <span>Profil</span></a>
    </li>

</ul>
