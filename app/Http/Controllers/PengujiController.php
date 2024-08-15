<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Penguji;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Geup;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PengujiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('penguji.index', [
            'users'     => User::with('penguji')
                ->where('role_id', 3)
                ->orderBy('id', 'DESC')
                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penguji.create', [
            'geups' => Geup::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'          => 'required',
            'dan'           => 'required',
            'geup_id'  => 'required',
            'no_peserta'    => 'required',
            'username'      => 'required',
            'password'      => 'required'
        ], [
            'nama.required'         => 'Form wajib diisi !',
            'dan.required'          => 'Form wajib diisi !',
            'geup_id.required' => 'Form wajib diisi !',
            'no_peserta.required'   => 'Form wajib diisi !',
            'username.required'     => 'Form wajib diisi !',
            'password.required'     => 'Form wajib diisi !',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'username'  => $request->username,
            'password'  => $request->password,
            'role_id'   => 3
        ]);

        Penguji::create([
            'user_id'       => $user->id,
            'nama'          => $request->nama,
            'dan'           => $request->dan,
            'geup_id'  => $request->geup_id,
            'no_peserta'    => $request->no_peserta,
        ]);

        return redirect('/penguji')->with('success', 'Data berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('penguji.show', [
            'user'   => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('penguji.edit', [
            'user'   => $user,
            'geups'  => Geup::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user       = User::find($id);
        $penguji    = $user->penguji;

        $validator = Validator::make($request->all(), [
            'nama'          => 'required',
            'dan'           => 'required',
            'geup_id'  => 'required',
            'no_peserta'    => 'required',
            'username'      => 'required',
            'password'      => 'nullable|min:4'
        ], [
            'nama.required'         => 'Form wajib diisi !',
            'dan.required'          => 'Form wajib diisi !',
            'geup_id.required' => 'Form wajib diisi !',
            'no_peserta.required'   => 'Form wajib diisi !',
            'username.required'     => 'Form wajib diisi !',
            'password.min'          => 'Password minimal 4 karakter !'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user->username = $request->username;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        $penguji->update([
            'user_id'       => $user->id,
            'nama'          => $request->nama,
            'dan'           => $request->dan,
            'geup_id'  => $request->geup_id,
            'no_peserta'    => $request->no_peserta,
        ]);

        return redirect('/penguji')->with('success', 'Data berhasil diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus !');
    }
}