<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Geup;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index(Request $request)
    {
        $geup_id = $request->input('geup_id');

        $pendaftarans = Pendaftaran::with(['nilai', 'geup'])
            ->when($geup_id, function ($query, $geup_id) {
                return $query->where('geup_id', $geup_id);
            })
            ->orderBy('id', 'DESC')
            ->get();

        $geups = Geup::all();

        return view('nilai.index', compact('pendaftarans', 'geups'));
    }

    public function cetak(Request $request)
    {
        $geupId = $request->input('geup_id');
        if (empty($geupId)) {
            return redirect()->back()->with('error', 'Harap pilih Geup terlebih dahulu sebelum mencetak.');
        }

        $pendaftarans = Pendaftaran::with('geup', 'nilai')
            ->where('geup_id', $geupId)
            ->get();

        $pdf = new Dompdf();
        $pdf->loadHtml(view('nilai.form-penilaian', compact('pendaftarans'))->render());
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();

        return $pdf->stream('formulir_penilaian.pdf');
    }
}
