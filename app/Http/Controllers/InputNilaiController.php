<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Nilai;
use Illuminate\Support\Facades\Validator;

class InputNilaiController extends Controller
{
    public function index()
    {
        return view('input-nilai.index', [
            'pendaftarans'  => Pendaftaran::orderBy('id', 'DESC')->get()
        ]);
    }

    public function show($id)
    {
        $pendaftaran = Pendaftaran::with('geup')->find($id);

        return view('input-nilai.show', [
            'pendaftaran' => $pendaftaran
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gerakan_dasar'     => 'required',
            'poomsae'           => 'required',
            'step'              => 'required',
            'kyorugi'           => 'required',
            'kyukra'            => 'required',
        ], [
            'gerakan_dasar.required'    => 'Masukan Nilai !',
            'poomsae.required'          => 'Masukan Nilai !',
            'step.required'             => 'Masukan Nilai !',
            'kyorugi.required'          => 'Masukan Nilai !',
            'kyukra.required'           => 'Masukan Nilai !',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Nilai::create([
            'pendaftaran_id'    => $request->pendaftaran_id,
            'gerakan_dasar'     => $request->gerakan_dasar,
            'poomsae'           => $request->poomsae,
            'step'              => $request->step,
            'kyorugi'           => $request->kyorugi,
            'kyukra'            => $request->kyukra,
        ]);

        return redirect('/input-nilai')->with('success', 'Berhasil menambahkan nilai peserta !');
    }
}