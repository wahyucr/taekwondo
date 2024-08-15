<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Geup;
use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $geupId = $request->input('geup_id');
        $geups = Geup::all();

        if ($geupId) {
            $anggotas = Anggota::with('geup')
                ->where('geup_id', $geupId)
                ->orderBy('id', 'DESC')
                ->get();
        } else {
            $anggotas = Anggota::with('geup')->orderBy('id', 'DESC')->get();
        }

        return view('anggota.index', compact('anggotas', 'geups'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'      => 'required',
            'geup_id'     => 'required',
            'alamat'    => 'required'
        ], [
            'nama.required'     => 'Form wajib diisi !',
            'geup_id.required'    => 'Form wajib diisi !',
            'alamat.required'   => 'Form wajib diisi !',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Anggota::create([
            'nama'      => $request->nama,
            'geup_id'     => $request->geup_id,
            'alamat'    => $request->alamat,
        ]);

        return redirect('/anggota')->with('success', 'Data berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $anggota = Anggota::find($id);
        return view('anggota.show', [
            'anggota'   => $anggota
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $anggota = Anggota::find($id);
        return view('anggota.edit', [
            'anggota'   => $anggota
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $anggota = Anggota::find($id);
        $validator = Validator::make($request->all(), [
            'nama'      => 'required',
            'geup_id'     => 'required',
            'alamat'    => 'required'
        ], [
            'nama.required'     => 'Form wajib diisi !',
            'geup_id.required'    => 'Form wajib diisi !',
            'alamat.required'   => 'Form wajib diisi !',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $anggota->update([
            'nama'      => $request->nama,
            'geup_id'     => $request->geup_id,
            'alamat'    => $request->alamat,
        ]);

        return redirect('/anggota')->with('success', 'Data berhasil diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $anggota = Anggota::find($id);
        $anggota->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus !');
    }

    public function cetak(Request $request)
    {
        $geupId = $request->input('geup_id');

        if (empty($geupId)) {
            return redirect()->back()->with('error', 'Harap pilih Geup terlebih dahulu sebelum mencetak.');
        }

        $anggotas = Anggota::with('geup')
            ->where('geup_id', $geupId)
            ->orderBy('id', 'DESC')
            ->get();

        $pdf = new Dompdf();
        $pdf->loadHtml(view('anggota.cetak', compact('anggotas'))->render());
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        return $pdf->stream('data_anggota.pdf');
    }
}
