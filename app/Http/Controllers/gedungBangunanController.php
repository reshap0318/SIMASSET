<?php

namespace App\Http\Controllers;

use App\aset_pemeliharaan;
use App\aset_pemindahtangan;
use App\bangunan_gedung;
use App\gedung_bangunan;
use App\pemanfaatan;
use Illuminate\Http\Request;

class gedungBangunanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lok = $request->lok;

        if($request->lok == 1){
            $gedung = gedung_bangunan::where('kd_kab', 855)->orWhere('kd_kab', 800)->get();
            $lokasi = 'Kampus I - Limau Manih';
        }elseif($request->lok==2){
            $gedung = gedung_bangunan::where('kd_kab', 856)->orWhere('kd_kab', 803)->get();
            $lokasi = 'Kampus II - Payakumbuh';
        }else{
            $gedung = gedung_bangunan::where('kd_kab', 0)->get();
            $lokasi = 'Kampus III Darmasraya';
        }
//        }


        return view('backend.asset.gedung_bangunan.list_lokasi',compact('gedung', 'lokasi','lok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = gedung_bangunan::where('id',$id)->first();
        if(($data->kd_kab == 855)||($data->kd_kab == 800)){
            $kab = 'Padang';
        } else if(($data->kd_kab == 856)||($data->kd_kab == 803)){
            $kab = 'Payakumbuh';
        }else{
            $kab = 'Darmasraya';
        }

        $biaya_manfaat=0;
        $manfaat = pemanfaatan::where('id', $id)->get();
        foreach ($manfaat as $m){
            $biaya_manfaat = $biaya_manfaat + $m->biaya;
        }

        $biaya_pemeliharaan=0;
        $pelihara = aset_pemeliharaan::where('id', $id)->get();
        foreach ($pelihara as $p){
            $biaya_pemeliharaan =$biaya_pemeliharaan+$p->biaya;
        }

        $pindah = aset_pemindahtangan::where('id',$id)->get();

        return view('backend.asset.gedung_bangunan.detail',compact('data','kab','manfaat', 'biaya_manfaat','biaya_pemeliharaan','pelihara','pindah'));
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
