@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pendaftaran UKT</h1>
            <div class="ml-auto">
                <a href="/pendaftaran" class="btn btn-secondary"> Kembali</a>
            </div>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    Tambah Data Pendaftaran
                </div>
                <div class="card-body">
                    <form action="/pendaftaran" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>NIK / No KK <span style="color: red">*</span></label>
                            <input type="number" class="form-control" name="nik" value="{{ old('nik') }}">
                            @error('nik')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="nm_lengkap" value="{{ old('nm_lengkap') }}">
                            @error('nm_lengkap')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Jenis Kelamin <span style="color: red">*</span></label>
                                    <select name="j_kelamin" class="form-control">
                                        <option value=""> -- Pilih Jenis Kelamin -- </option>
                                        <option value="laki-laki"> Laki - laki </option>
                                        <option value="perempuan"> Perempuan </option>
                                    </select>
                                    @error('j_kelamin')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tempat Lahir <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="tmpt_lahir"
                                        value="{{ old('tmpt_lahir') }}">
                                    @error('tmpt_lahir')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tanggal Lahir <span style="color: red">*</span></label>
                                    <input type="date" class="form-control" name="tgl_lahir"
                                        value="{{ old('tgl_lahir') }}">
                                    @error('tgl_lahir')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Usia <span style="color: red">*</span></label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="usia"
                                            value="{{ old('usia') }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">tahun</span>
                                        </div>
                                    </div>
                                    @error('usia')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Berat Badan <span style="color: red">*</span></label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="berat_badan"
                                            value="{{ old('berat_badan') }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">Kg</span>
                                        </div>
                                    </div>
                                    @error('berat_badan')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tinggi Badan <span style="color: red">*</span></label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="tinggi_badan"
                                            value="{{ old('tinggi_badan') }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">Cm</span>
                                        </div>
                                    </div>
                                    @error('tinggi_badan')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Golongan Darah <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="gol_darah"
                                        value="{{ old('gol_darah') }}">
                                    @error('gol_darah')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Agama <span style="color: red">*</span></label>
                                    <select name="agama" class="form-control">
                                        <option value=""> -- Pilih Agama -- </option>
                                        <option value="islam"> Islam </option>
                                        <option value="kristen"> Kristen </option>
                                        <option value="katolik"> Katolik </option>
                                        <option value="budha"> Budha </option>
                                        <option value="hindu"> Hindu </option>
                                        <option value="konghuchu"> Konghuchu </option>
                                    </select>
                                    @error('agama')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tempat Dojang<span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="tmpt_dojang"
                                value="{{ old('tmpt_dojang') }}">
                            @error('tmpt_dojang')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tujuan Kenaikan Geup / Sabuk <span style="color: red">*</span></label>
                            <select name="geup_id" class="form-control">
                                <option value=""> -- Pilih Geup -- </option>
                                @foreach ($geups as $geup)
                                    <option value="{{ $geup->id }}">{{ $geup->geup }}</option>
                                @endforeach
                            </select>
                            @error('agama')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
