@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Anggota Atia</h1>
            <div class="ml-auto">
                <a href="/anggota/create" class="btn btn-primary"> Tambah
                    Data</a>
            </div>
        </div>

        <div class="section-body">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card card-primary">
                <div class="card-header">
                    Data Anggota Atia
                </div>
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="/anggota" method="GET">
                        <div class="form-row align-items-end">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="geup">Filter Berdasarkan Geup:</label>
                                    <select name="geup_id" id="geup" class="form-control">
                                        <option value="">Semua Geup</option>
                                        @foreach ($geups as $geup)
                                            <option value="{{ $geup->id }}"
                                                {{ request('geup_id') == $geup->id ? 'selected' : '' }}>
                                                {{ $geup->geup }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary mb-4">Filter</button>
                                <a href="{{ route('anggota.cetak', ['geup_id' => request('geup_id')]) }}"
                                    class="btn btn-danger mb-4 ml-2">Cetak Form</a>

                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table id="table_id" class="table table-bordered table-hover table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Sabuk/Geup</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anggotas as $anggota)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $anggota->nama }}</td>
                                        <td>{{ $anggota->geup->geup }}</td>
                                        <td>{{ $anggota->alamat }}</td>
                                        <td>
                                            <a href="/anggota/{{ $anggota->id }}" class="btn btn-success"><i
                                                    class="fas fa-eye"></i></a>
                                            <a href="/anggota/{{ $anggota->id }}/edit" class="btn btn-warning"><i
                                                    class="fas fa-edit"></i></a>
                                            <form id="{{ $anggota->id }}" action="/anggota/{{ $anggota->id }}"
                                                method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <div class="btn btn-danger swal-confirm" data-form="{{ $anggota->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
