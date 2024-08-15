@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Anggota Atia</h1>
            <div class="ml-auto">
                <a href="/anggota" class="btn btn-secondary"> Kembali</a>
            </div>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    Tambah Anggota Atia
                </div>
                <div class="card-body">
                    <form action="/anggota" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Nama Anggota <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                            @error('nama')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Sabuk/Geup <span style="color: red">*</span></label>
                            <select name="geup_id" class="form-control">
                                <option value=""> -- Pilih Geup -- </option>
                                @foreach ($geups as $geup)
                                    <option value="{{ $geup->id }}">{{ $geup->geup }}</option>
                                @endforeach
                            </select>
                            @error('geup_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Alamat <span style="color: red">*</span></label>
                            <textarea class="form-control" name="alamat" cols="30" rows="10"></textarea>
                            @error('alamat')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
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
