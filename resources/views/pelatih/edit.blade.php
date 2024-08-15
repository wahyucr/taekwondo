@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pelatih</h1>
            <div class="ml-auto">
                <a href="/pelatih" class="btn btn-secondary">Kembali</a>
            </div>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    Edit Data Pelatih
                </div>
                <div class="card-body">
                    <form action="/pelatih/{{ $user->id }}" method="POST">
                        @method('put')
                        @csrf

                        <div class="form-group">
                            <label>Nama Pelatih <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="nama"
                                value="{{ old('nama', $user->pelatih->nama) }}">
                            @error('nama')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Da <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="da"
                                        value="{{ old('da', $user->pelatih->da) }}">
                                    @error('da')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jumlah Muri <span style="color: red">*</span></label>
                                    <input type="number" class="form-control" name="jmlh_muri"
                                        value="{{ old('jmlh_muri', $user->pelatih->jmlh_muri) }}">
                                    @error('jmlh_muri')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Tempat Dojang <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="tmpt_dojang"
                                value="{{ old('tmpt_dojang', $user->pelatih->tmpt_dojang) }}">
                            @error('tmpt_dojang')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Alamat <span style="color: red">*</span></label>
                            <textarea class="form-control" name="alamat" cols="30" rows="10">{{ old('alamat', $user->pelatih->alamat) }}</textarea>
                            @error('alamat')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Username <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="username"
                                value="{{ old('username', $user->pelatih->user->username) }}">
                            @error('username')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password"
                                placeholder="Kosongkan jika tidak ingin mengubah password">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary float-right">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Datatables Jquery -->
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        })
    </script>
@endsection
