<?php

namespace App\Http\Controllers;

use index;
use Carbon\Carbon;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Konsultasi;
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
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dokters = Dokter::count();
        $pasiens = Pasien::count();
        $konsultasis = Konsultasi::count();

        // konsultasi hari ini
        $tanggalHariIni = Carbon::today();
        $konsultasitoday = Konsultasi::whereDate('created_at', $tanggalHariIni)->count();


        return view('home', compact('dokters', 'pasiens', 'konsultasis', 'konsultasitoday'));
    }
}