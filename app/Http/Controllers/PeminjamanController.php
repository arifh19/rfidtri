<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjaman;
use App\Kehadiran;
use App\Inventaris;
use Carbon\Carbon;
use Session;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $i=1;
        $peminjamans = Peminjaman::all()->sortByDesc('created_at');
        return view('peminjaman.index')->with(compact('peminjamans','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kehadirans = Kehadiran::where('status',0)->get();
        $barangs = Inventaris::where('jumlah','!=',0)->get();
        return view('peminjaman.create')->with(compact('kehadirans','barangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang = Inventaris::findOrFail($request->inventaris_id);
        if($barang->jumlah==null){
            Session::flash("flash_notification", [
                "level" => "success",
                "icon" => "fa fa-check",
                "message" => "Barang sedang ada yang meminjam"
            ]);
            return redirect('/peminjaman');
        }
        $barang->jumlah = ($barang->jumlah) - ($request->jumlah);
        $pinjam = new Peminjaman;
        $pinjam->kartu_id = $request->kartu_id;
        $pinjam->inventaris_id = $request->inventaris_id;
        $pinjam->jumlah = $request->jumlah;
        $pinjam->status = 1; //status dipinjam , jika 0 status dikembalikan
        $pinjam->tanggal_peminjaman = Carbon::now()->toDateTimeString();
        $pinjam->save();
        $barang->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "icon" => "fa fa-check",
            "message" => "Peminjaman berhasil"
        ]);
        return redirect('/peminjaman');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    //kembali
    public function kembali($id,$barang_id)
    {
        $barang = Inventaris::findOrFail($barang_id);
        if($barang->count()==null){
            Session::flash("flash_notification", [
                "level" => "success",
                "icon" => "fa fa-check",
                "message" => "Barang tidak ditemukan"
            ]);
            return redirect('/peminjaman');
        }
        $pinjam = Peminjaman::findOrFail($id);
        $pinjam->status = 0; //status pengembalian
        $pinjam->tanggal_pengembalian = Carbon::now()->toDateTimeString();
        $barang->jumlah = ($barang->jumlah) + ($pinjam->jumlah); //mengembalikan jumlah barang
        $barang->save();
        $pinjam->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "icon" => "fa fa-check",
            "message" => "Pengembalian berhasil"
        ]);
        return redirect('/peminjaman');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
