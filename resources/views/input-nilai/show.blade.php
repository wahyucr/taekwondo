@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Input Nilai</h1>
            <div class="ml-auto">
                <a href="/input-nilai" class="btn btn-secondary">Kembali</a>
            </div>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    Input Nilai Peserta Ujian Kenaikan Tingkat (UKT)
                </div>
                <div class="card-body">
                    <form action="/input-nilai" method="POST">
                        @csrf

                        <div class="row">
                            <input type="hidden" value="{{ $pendaftaran->id }}" name="pendaftaran_id">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Peserta <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="nm_lengkap"
                                        value="{{ $pendaftaran->nm_lengkap }}" disabled>
                                    @error('nm_lengkap')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ujian Geup / Sabuk <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="geup"
                                        value="{{ old('geup', $pendaftaran->geup->geup) }}" disabled>
                                    @error('geup')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Gerakan Dasar<span style="color: red">*</span></label>
                                    <input type="number" class="form-control" name="gerakan_dasar"
                                        value="{{ old('gerakan_dasar') }}">
                                    @error('gerakan_dasar')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Poomsae<span style="color: red">*</span></label>
                                    <input type="number" class="form-control" name="poomsae" value="{{ old('poomsae') }}">
                                    @error('poomsae')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Step<span style="color: red">*</span></label>
                                    <input type="number" class="form-control" name="step" value="{{ old('step') }}">
                                    @error('step')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Kyorugi<span style="color: red">*</span></label>
                                    <input type="number" class="form-control" name="kyorugi" value="{{ old('kyorugi') }}">
                                    @error('kyorugi')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Kyukra<span style="color: red">*</span></label>
                                    <input type="number" class="form-control" name="kyukra" value="{{ old('kyukra') }}">
                                    @error('kyukra')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
