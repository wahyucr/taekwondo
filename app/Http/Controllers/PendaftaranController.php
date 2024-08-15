<?php

namespace App\Http\Controllers;

use App\Models\Geup;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pendaftaran.index', [
            'pendaftarans'  => Pendaftaran::orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pendaftaran.create', [
            'geups'     => Geup::orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik'           => 'required',
            'nm_lengkap'    => 'required',
            'j_kelamin'     => 'required',
            'tmpt_lahir'    => 'required',
            'tgl_lahir'     => 'required|date',
            'usia'          => 'required|numeric',
            'berat_badan'   => 'required|numeric',
            'tinggi_badan'  => 'required|numeric',
            'gol_darah'     => 'required',
            'agama'         => 'required',
            'tmpt_dojang'   => 'required',
            'geup_id'       => 'required'
        ], [
            'required'      => 'Form wajib diisi!',
            'date'          => 'Tanggal tidak valid!',
            'numeric'       => 'Harus berupa angka!'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Pendaftaran::create([
            'nik'           => $request->nik,
            'nm_lengkap'    => $request->nm_lengkap,
            'j_kelamin'     => $request->j_kelamin,
            'tmpt_lahir'    => $request->tmpt_lahir,
            'tgl_lahir'     => $request->tgl_lahir,
            'usia'          => $request->usia,
            'berat_badan'   => $request->berat_badan,
            'tinggi_badan'  => $request->tinggi_badan,
            'gol_darah'     => $request->gol_darah,
            'agama'         => $request->agama,
            'tmpt_dojang'   => $request->tmpt_dojang,
            'geup_id'       => $request->geup_id
        ]);

        return redirect('/pendaftaran')->with('success', 'Data berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pendaftaran = Pendaftaran::find($id);
        return view('pendaftaran.show', [
            'pendaftaran' => $pendaftaran,
            'geups'       => Geup::orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pendaftaran = Pendaftaran::find($id);
        return view('pendaftaran.edit', [
            'pendaftaran' => $pendaftaran,
            'geups'       => Geup::orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pendaftaran = Pendaftaran::find($id);
        $validator = Validator::make($request->all(), [
            'nik'           => 'required',
            'nm_lengkap'    => 'required',
            'j_kelamin'     => 'required',
            'tmpt_lahir'    => 'required',
            'tgl_lahir'     => 'required|date',
            'usia'          => 'required|numeric',
            'berat_badan'   => 'required|numeric',
            'tinggi_badan'  => 'required|numeric',
            'gol_darah'     => 'required',
            'agama'         => 'required',
            'tmpt_dojang'   => 'required',
            'geup_id'       => 'required'
        ], [
            'required'      => 'Form wajib diisi!',
            'date'          => 'Tanggal tidak valid!',
            'numeric'       => 'Harus berupa angka!'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $pendaftaran->update([
            'nik'           => $request->nik,
            'nm_lengkap'    => $request->nm_lengkap,
            'j_kelamin'     => $request->j_kelamin,
            'tmpt_lahir'    => $request->tmpt_lahir,
            'tgl_lahir'     => $request->tgl_lahir,
            'usia'          => $request->usia,
            'berat_badan'   => $request->berat_badan,
            'tinggi_badan'  => $request->tinggi_badan,
            'gol_darah'     => $request->gol_darah,
            'agama'         => $request->agama,
            'tmpt_dojang'   => $request->tmpt_dojang,
            'geup_id'       => $request->geup_id
        ]);

        return redirect('/pendaftaran')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pendaftaran = Pendaftaran::find($id);
        $pendaftaran->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus !');
    }
}
