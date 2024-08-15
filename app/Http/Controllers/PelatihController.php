<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelatih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PelatihController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pelatih.index', [
            'users'  => User::with('pelatih')
                ->where('role_id', 2)
                ->orderBy('id', 'DESC')
                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelatih.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'          => 'required',
            'da'            => 'required',
            'alamat'        => 'required',
            'tmpt_dojang'   => 'required',
            'jmlh_muri'     => 'required',
            'username'      => 'required',
            'password'      => 'required'
        ], [
            'nama.required'         => 'Form wajib diisi !',
            'da.required'           => 'Form wajib diisi !',
            'alamat.required'       => 'Form wajib diisi !',
            'tmpt_dojang.required'  => 'Form wajib diisi !',
            'jmlh_muri.required'    => 'Form wajib diisi !',
            'username.required'     => 'Form wajib diisi !',
            'password.required'     => 'Form wajib diisi !',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'username'  => $request->username,
            'password'  => $request->password,
            'role_id'   => 2
        ]);

        Pelatih::create([
            'user_id'       => $user->id,
            'nama'          => $request->nama,
            'da'            => $request->da,
            'alamat'        => $request->alamat,
            'tmpt_dojang'   => $request->tmpt_dojang,
            'jmlh_muri'     => $request->jmlh_muri,
            'username'      => $request->username,
            'password'      => Hash::make($request->password)
        ]);

        return redirect('/pelatih')->with('success', 'Data berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('pelatih.show', [
            'user'   => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('pelatih.edit', [
            'user'   => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user       = User::find($id);
        $pelatih    = $user->pelatih;

        $validator = Validator::make($request->all(), [
            'nama'          => 'required',
            'da'            => 'required',
            'alamat'        => 'required',
            'tmpt_dojang'   => 'required',
            'jmlh_muri'     => 'required',
            'username'      => 'required',
            'password'      => 'nullable|min:4'
        ], [
            'nama.required'         => 'Form wajib diisi !',
            'da.required'           => 'Form wajib diisi !',
            'alamat.required'       => 'Form wajib diisi !',
            'tmpt_dojang.required'  => 'Form wajib diisi !',
            'jmlh_muri.required'    => 'Form wajib diisi !',
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
        $pelatih->update([
            'nama'          => $request->nama,
            'da'            => $request->da,
            'alamat'        => $request->alamat,
            'tmpt_dojang'   => $request->tmpt_dojang,
            'jmlh_muri'     => $request->jmlh_muri,
            'username'      => $request->username,
        ]);

        return redirect('/pelatih')->with('success', 'Data berhasil diupdate !');
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