@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kegiatan</h1>
            <div class="ml-auto">
                <a href="/kegiatan/create" class="btn btn-primary"> Tambah
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
                    Data Kegiatan
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table_id" class="table table-bordered table-hover table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kegiatans as $kegiatan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kegiatan->kegiatan }}</td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($kegiatan->tgl_mulai)->translatedFormat('d F Y') }} -
                                            {{ \Carbon\Carbon::parse($kegiatan->tgl_selesai)->translatedFormat('d F Y') }}
                                        </td>
                                        <td>
                                            <a href="/kegiatan/{{ $kegiatan->id }}" class="btn btn-success"><i
                                                    class="fas fa-eye"></i></a>
                                            <a href="/kegiatan/{{ $kegiatan->id }}/edit" class="btn btn-warning"><i
                                                    class="fas fa-edit"></i></a>
                                            <form id="{{ $kegiatan->id }}" action="/kegiatan/{{ $kegiatan->id }}"
                                                method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <div class="btn btn-danger swal-confirm" data-form="{{ $kegiatan->id }}">
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
