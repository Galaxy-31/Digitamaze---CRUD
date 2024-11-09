<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Models\Guru;
use App\Models\Data;
use App\Models\Siswa;
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
        $ruangans = Ruangan::select('kelas')
                ->distinct('kelas')
                ->count('kelas');
        $gurus = Guru::select('nama')
                ->distinct('nama')
                ->count('nama');
        $siswas = Siswa::select('murid')
                ->distinct('murid')
                ->count('murid');
        $datas = Data::select('nama')
                ->distinct('nama')
                ->count('nama');
        return view('home', compact('ruangans', 'gurus', 'siswas','datas'));
    }
}
