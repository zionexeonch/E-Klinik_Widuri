<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Perjanjian;
use Illuminate\Http\Request;

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
}
