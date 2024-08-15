@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Penguji</h1>
            <div class="ml-auto">
                <a href="/penguji" class="btn btn-secondary"> Kembali</a>
            </div>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    Edit Data Penguji
                </div>
                <div class="card-body">
                    <form action="/penguji/{{ $user->id }}" method="POST">
                        @method('put')
                        @csrf

                        <div class="form-group">
                            <label>Nama Penguji <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="nama"
                                value="{{ old('nama', $user->penguji->nama) }}">
                            @error('nama')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Dan <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="dan"
                                        value="{{ old('dan', $user->penguji->dan) }}">
                                    @error('dan')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Penguji Geup <span style="color: red">*</span></label>
                                    <select name="geup_id" class="form-control">
                                        <option value=""> -- Pilih Geup -- </option>
                                        @foreach ($geups as $geup)
                                            <option value="{{ $geup->id }}"
                                                {{ $geup->id == old('geup_id', $user->penguji->geup_id) ? 'selected' : '' }}>
                                                {{ $geup->geup }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('geup_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>No peserta <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="no_peserta"
                                value="{{ old('no_peserta', $user->penguji->no_peserta) }}">
                            @error('no_peserta')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Username <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="username"
                                value="{{ old('username', $user->username) }}">
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
