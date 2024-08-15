<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Pelatih;
use App\Models\Pendaftaran;
use App\Models\Penguji;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard', [
            'anggotas'  => Anggota::count(),
            'pelatihs'  => Pelatih::count(),
            'pengujis'  => Penguji::count(),
            'pesertas'  => Pendaftaran::count()
        ]);
    }
}