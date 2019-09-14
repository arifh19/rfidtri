<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kehadiran;
use App\Kartu;
use Carbon\Carbon;

class KehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'rfid_uid' => 'required',
            'nama' => 'required',
        ], [
            'rfid_uid.required' => 'rfid Kosong',
            'nama.required' => 'nama kosong',
        ]);
        $kartu = Kartu::where('rfid_uid',$request->rfid_uid)->first();
        if($kartu==null){
            $kartu = new Kartu;
            $kartu->rfid_uid = $request->rfid_uid;
            $kartu->nama = $request->nama;
            if($request->nim!=null){
                $kartu->nim = $request->nim;
            }
            $kartu->save();
        }
        $kehadiran = Kehadiran::where('kartu_id',$kartu->id)->where('status',0)->first();
        if($kehadiran){
            $kehadiran->clock_out= Carbon::now()->toDateTimeString();
            $kehadiran->status=1;
        }
        else{
            $kehadiran = new Kehadiran;
            $kehadiran->kartu_id=$kartu->id;
            $kehadiran->status = 0;
            $kehadiran->clock_in= Carbon::now()->toDateTimeString();
        }
        $kehadiran->save();
        $message = [
            'rfid_uid' => $kartu->rfid_uid,
            'nama' => $kartu->nama
        ];
        return response()->json(['error' => false, 'message' => 'Terima kasih','data'=>$message]);


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
