@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kegiatan</h1>
            <div class="ml-auto">
                <a href="/kegiatan" class="btn btn-secondary"> Kembali</a>
            </div>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    Detail Data kegiatan
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Kegiatan <span style="color: red">*</span></label>
                        <input type="text" class="form-control" name="kegiatan"
                            value="{{ old('kegiatan', $kegiatan->kegiatan) }}" disabled>
                        @error('kegiatan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Mulai <span style="color: red">*</span></label>
                                <input type="date" class="form-control" name="tgl_mulai"
                                    value="{{ old('tgl_mulai', $kegiatan->tgl_mulai) }}" disabled>
                                @error('tgl_mulai')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Selesai <span style="color: red">*</span></label>
                                <input type="date" class="form-control" name="tgl_selesai"
                                    value="{{ old('tgl_selesai', $kegiatan->tgl_selesai) }}" disabled>
                                @error('tgl_selesai')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
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
