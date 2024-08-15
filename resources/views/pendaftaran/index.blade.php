@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pendaftaran UKT</h1>
            <div class="ml-auto">
                <a href="/pendaftaran/create" class="btn btn-primary"> Tambah
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
                    Data Pendaftar
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table_id" class="table table-bordered table-hover table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Geup/Sabuk</th>
                                    <th>Tempat Dojang</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendaftarans as $pendaftar)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pendaftar->nik }}</td>
                                        <td>{{ $pendaftar->nm_lengkap }}</td>
                                        <td>{{ $pendaftar->j_kelamin }}</td>
                                        <td>{{ $pendaftar->geup->geup }}</td>
                                        <td>{{ $pendaftar->tmpt_dojang }}</td>
                                        <td>
                                            <a href="/pendaftaran/{{ $pendaftar->id }}" class="btn btn-success"><i
                                                    class="fas fa-eye"></i></a>
                                            <a href="/pendaftaran/{{ $pendaftar->id }}/edit" class="btn btn-warning"><i
                                                    class="fas fa-edit"></i></a>
                                            <form id="{{ $pendaftar->id }}" action="/pendaftaran/{{ $pendaftar->id }}"
                                                method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <div class="btn btn-danger swal-confirm" data-form="{{ $pendaftar->id }}">
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
