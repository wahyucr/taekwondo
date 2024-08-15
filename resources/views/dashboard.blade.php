@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            <div class="row my-3">
                <div class="col">
                    <div class="alert alert-primary py-3">
                        Selamat Datang
                        @if (auth()->check())
                            @if (auth()->user()->admin)
                                {{ auth()->user()->admin->nama }}
                            @elseIf(auth()->user()->pelatih)
                                {{ auth()->user()->pelatih->nama }}
                            @elseIf(auth()->user()->penguji)
                                {{ auth()->user()->penguji->nama }}
                            @endif
                        @endif,

                        di Sistem Informasi Pengelolaan Data Peserta Taekwondo
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            Jumlah Anggota Atia
                        </div>
                        <div class="card-body">
                            {{ $anggotas }}
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-success">
                        <div class="card-header">
                            Jumlah Pelatih
                        </div>
                        <div class="card-body">
                            {{ $pelatihs }}
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-warning">
                        <div class="card-header">
                            Jumlah Penguji
                        </div>
                        <div class="card-body">
                            {{ $pengujis }}
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-danger">
                        <div class="card-header">
                            Total Peserta UKT
                        </div>
                        <div class="card-body">
                            {{ $pesertas }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
