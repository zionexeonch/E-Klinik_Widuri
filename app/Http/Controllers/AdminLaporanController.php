<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Perjanjian;
use Illuminate\Http\Request;
use PDF;

class AdminLaporanController extends Controller
{
    public function index()
    {
        $pasien = Perjanjian::join('pasiens', 'pasiens.perjanjian_id', '=', 'perjanjians.id')
            ->where('pasiens.status', '=', 'selesai')
            ->get();
        $data = [
            'pasiens' => $pasien
        ];
        return view('admin.laporan.index', $data);
    }

    public function pdf()
    {
        $dataPasien = Perjanjian::join('pasiens', 'pasiens.perjanjian_id', '=', 'perjanjians.id')
            ->where('pasiens.status', '=', 'selesai')
            ->get();

        $pasiens = $dataPasien;
        view()->share('pasiens', $pasiens);
        $pdf = PDF::loadView('cetak-pasien', ['pasiens' => $pasiens]);
        return $pdf->download('laporan' . date('Y-m-d') . '.pdf');
    }
}
