<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class AdminLaporanController extends Controller
{
    public function index()
    {
        $pasien = Pasien::with(['dokter'])->get();
        $data = [
            'pasiens' => $pasien
        ];
        return view('admin.laporan.index', $data);
    }
}
