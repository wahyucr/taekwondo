<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kegiatan.index', [
            'kegiatans'  => Kegiatan::orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kegiatan'      => 'required',
            'tgl_mulai'     => 'required',
            'tgl_selesai'   => 'required'
        ], [
            'kegiatan.required'     => 'Form wajib diisi !',
            'tgl_mulai.required'    => 'Form wajib diisi !',
            'tgl_selesai.required'  => 'Form wajib diisi !'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Kegiatan::create([
            'kegiatan'      => $request->kegiatan,
            'tgl_mulai'     => $request->tgl_mulai,
            'tgl_selesai'   => $request->tgl_selesai,
        ]);

        return redirect('/kegiatan')->with('success', 'Data berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kegiatan = Kegiatan::find($id);
        return view('kegiatan.show', [
            'kegiatan'  => $kegiatan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kegiatan = Kegiatan::find($id);
        return view('kegiatan.edit', [
            'kegiatan'  => $kegiatan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kegiatan = Kegiatan::find($id);
        $validator = Validator::make($request->all(), [
            'kegiatan'      => 'required',
            'tgl_mulai'     => 'required',
            'tgl_selesai'   => 'required'
        ], [
            'kegiatan.required'     => 'Form wajib diisi !',
            'tgl_mulai.required'    => 'Form wajib diisi !',
            'tgl_selesai.required'  => 'Form wajib diisi !'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $kegiatan->update([
            'kegiatan'      => $request->kegiatan,
            'tgl_mulai'     => $request->tgl_mulai,
            'tgl_selesai'   => $request->tgl_selesai,
        ]);

        return redirect('/kegiatan')->with('success', 'Data berhasil diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kegiatan = Kegiatan::find($id);
        $kegiatan->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus !');
    }
}
