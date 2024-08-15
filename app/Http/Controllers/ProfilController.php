<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $profil = null;

        if ($user->role->role == 'admin') {
            $profil = $user->admin;
        } elseif ($user->role->role == 'pelatih') {
            $profil = $user->pelatih;
        } elseif ($user->role->role == 'penguji') {
            $profil = $user->penguji;
        }

        return view('profil.index', [
            'profil' => $profil,
        ]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        // Validasi umum
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        if ($user->role->role == 'admin') {
            // Validasi khusus admin
            $validatedDataAdmin = $request->validate([
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $admin = $user->admin;
            $admin->nama = $validatedData['nama'];

            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $path = $file->store('public/foto');
                $admin->foto = $path;
            }

            $admin->save();
        } elseif ($user->role->role == 'pelatih') {
            // Validasi khusus pelatih
            $validatedDataPelatih = $request->validate([
                'da' => 'required|string|max:255',
                'alamat' => 'required|string',
                'tmpt_dojang' => 'required|string|max:255',
                'jmlh_muri' => 'required|integer',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $pelatih = $user->pelatih;
            $pelatih->nama = $validatedData['nama'];
            $pelatih->da = $validatedDataPelatih['da'];
            $pelatih->alamat = $validatedDataPelatih['alamat'];
            $pelatih->tmpt_dojang = $validatedDataPelatih['tmpt_dojang'];
            $pelatih->jmlh_muri = $validatedDataPelatih['jmlh_muri'];

            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $path = $file->store('public/foto');
                $pelatih->foto = $path;
            }

            $pelatih->save();
        } elseif ($user->role->role == 'penguji') {
            // Validasi khusus penguji
            $validatedDataPenguji = $request->validate([
                'dan' => 'required|string|max:255',
                'geup_id' => 'required|exists:geups,id',
                'no_peserta' => 'required|string|max:255',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $penguji = $user->penguji;
            $penguji->nama = $validatedData['nama'];
            $penguji->dan = $validatedDataPenguji['dan'];
            $penguji->geup_id = $validatedDataPenguji['geup_id'];
            $penguji->no_peserta = $validatedDataPenguji['no_peserta'];

            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $path = $file->store('public/foto');
                $penguji->foto = $path;
            }

            $penguji->save();
        }

        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }
}