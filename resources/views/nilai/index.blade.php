@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Nilai</h1>
            <div class="ml-auto">
                <a href="/input-nilai" class="btn btn-primary">Tambah Data</a>
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
                    Nilai Peserta Ujian Kenaikan Tingkat
                </div>
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="/nilai" method="GET">
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
                                <a href="{{ route('cetak-nilai', ['geup_id' => request('geup_id')]) }}"
                                    class="btn btn-danger mb-4 ml-2">Cetak Form</a>
                            </div>
                        </div>
                    </form>

                    <br>
                    <div class="table-responsive">
                        <table id="table_id" class="table table-bordered table-hover table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Sabuk/Geup</th>
                                    <th>Gerakan Dasar</th>
                                    <th>Poomsae</th>
                                    <th>Step</th>
                                    <th>Kyorugi</th>
                                    <th>Kyukra</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendaftarans as $pendaftaran)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pendaftaran->nm_lengkap }}</td>
                                        <td>{{ $pendaftaran->geup->geup }}</td>
                                        <td>{{ $pendaftaran->nilai->gerakan_dasar ?? '-' }}</td>
                                        <td>{{ $pendaftaran->nilai->poomsae ?? '-' }}</td>
                                        <td>{{ $pendaftaran->nilai->step ?? '-' }}</td>
                                        <td>{{ $pendaftaran->nilai->kyorugi ?? '-' }}</td>
                                        <td>{{ $pendaftaran->nilai->kyukra ?? '-' }}</td>
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
