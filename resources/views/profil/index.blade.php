@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profil</h1>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    Update Profil
                </div>
                <div class="card-body">
                    <form action="/profil" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        @if (session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        Photo
                                    </div>
                                    <div class="card-body">
                                        @if ($profil->foto)
                                            <img src="{{ asset('storage/foto/' . basename($profil->foto)) }}"
                                                alt="Foto Profil" id="preview" class="img-fluid rounded mb-5"
                                                width="100%" height="100%">
                                        @else
                                            <img src="/assets/img/profil.png" alt="Foto Profil" id="preview"
                                                class="img-fluid rounded mb-5" width="100%" height="100%">
                                            <p class="text-danger">Ini adalah foto Default, segera upload foto anda !</p>
                                        @endif

                                        <input type="file" class="form-control" name="foto" onchange="previewImage()">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                @if (auth()->user()->role->role == 'admin')
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" name="nama"
                                            value="{{ $profil->nama }}">
                                    </div>
                                @elseif (auth()->user()->role->role == 'pelatih')
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" name="nama"
                                            value="{{ $profil->nama }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="da">DA</label>
                                        <input type="text" class="form-control" name="da"
                                            value="{{ $profil->da }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" name="alamat">{{ $profil->alamat }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="tmpt_dojang">Tempat Dojang</label>
                                        <input type="text" class="form-control" name="tmpt_dojang"
                                            value="{{ $profil->tmpt_dojang }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="jmlh_muri">Jumlah Murid</label>
                                        <input type="number" class="form-control" name="jmlh_muri"
                                            value="{{ $profil->jmlh_muri }}">
                                    </div>
                                @elseif (auth()->user()->role->role == 'penguji')
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" name="nama"
                                            value="{{ $profil->nama }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="dan">Dan</label>
                                        <input type="text" class="form-control" name="dan"
                                            value="{{ $profil->dan }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="geup_id">Geup</label>
                                        <select name="geup_id" class="form-control">
                                            @foreach ($geups as $geup)
                                                <option value="{{ $geup->id }}"
                                                    {{ $profil->geup_id == $geup->id ? 'selected' : '' }}>
                                                    {{ $geup->geup }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_peserta">No Peserta</label>
                                        <input type="text" class="form-control" name="no_peserta"
                                            value="{{ $profil->no_peserta }}">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        function previewImage() {
            preview.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
