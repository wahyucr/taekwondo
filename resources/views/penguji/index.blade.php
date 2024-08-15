@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Penguji</h1>
            <div class="ml-auto">
                <a href="/penguji/create" class="btn btn-primary"> Tambah
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
                    Data Penguji
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table_id" class="table table-bordered table-hover table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Dan</th>
                                    <th>Penguji Geup</th>
                                    <th>No Peserta</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->penguji->nama }}</td>
                                        <td>{{ $user->penguji->dan }}</td>
                                        <td>{{ $user->penguji->geup->geup }}</td>
                                        <td>{{ $user->penguji->no_peserta }}</td>
                                        <td>
                                            <a href="/penguji/{{ $user->id }}" class="btn btn-success"><i
                                                    class="fas fa-eye"></i></a>
                                            <a href="/penguji/{{ $user->id }}/edit" class="btn btn-warning"><i
                                                    class="fas fa-edit"></i></a>
                                            <form id="{{ $user->id }}" action="/penguji/{{ $user->id }}"
                                                method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <div class="btn btn-danger swal-confirm" data-form="{{ $user->id }}">
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
