<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Pelatih;
use App\Models\Penguji;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('index', [
            'anggotas'  => Anggota::count(),
            'pelatihs'  => Pelatih::count(),
            'pengujis'  => Penguji::count(),
        ]);
    }
}