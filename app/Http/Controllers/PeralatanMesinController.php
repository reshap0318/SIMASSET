<?php

namespace App\Http\Controllers;

use App\aset_pemeliharaan;
use App\aset_pemindahtangan;
use App\pemanfaatan;
use App\peralatan_mesin;
use Illuminate\Http\Request;

class PeralatanMesinController extends Controller
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
        $data = peralatan_mesin::where('id',$id)->first();


        $biaya_manfaat=0;
        $manfaat = pemanfaatan::where('aset_id', $id)->get();
        foreach ($manfaat as $m){
            $biaya_manfaat = $biaya_manfaat + $m->biaya;
        }

        $biaya_pemeliharaan=0;
        $pelihara = aset_pemeliharaan::where('aset_id', $id)->get();
        foreach ($pelihara as $p){
            $biaya_pemeliharaan =$biaya_pemeliharaan+$p->biaya;
        }

        $pindah = aset_pemindahtangan::where('aset_id',$id)->get();
        return view('backend.asset.peralatan_mesin.detail',compact('data','kab','manfaat', 'biaya_manfaat','biaya_pemeliharaan','pelihara','pindah'));

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
