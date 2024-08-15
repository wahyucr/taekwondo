<?php

namespace App\Http\Controllers;

use App\Models\Geup;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PesertaUktController extends Controller
{
    public function index($geupId)
    {
        $pendaftarans = Pendaftaran::where('geup_id', $geupId)->get();
        $geup = Geup::find($geupId);

        return view('peserta-ukt.index', compact('pendaftarans', 'geup'));
    }
}
