<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kehadiran;
use App\Peminjaman;
use App\Inventaris;

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
        $kehadiran = Kehadiran::all();
        $peminjaman = Peminjaman::all();
        $inventaris = Inventaris::all();
        $pinjam = Peminjaman::where('status',1)->get();
        $kembali = Peminjaman::where('status',0)->get();
        return view('home')->with(compact('kehadiran','peminjaman', 'pinjam','kembali','inventaris'));
    }
}
