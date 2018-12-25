<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataMaster;
use App\Bangunan;


class BangunanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return view('view.backend.asset');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $noReg = DataMaster::pluck('no_registrasi_aset', 'no_registrasi_aset');
   
        return view('backend.asset.bangunan.create',compact('noReg'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bangunan = new Bangunan;
        $bangunan->no_registrasi_aset= $request->no_registrasi; 
        $bangunan->jumlah_lantai = $request->jumlah_lantai;  
        $bangunan->geom= "MULTIPOLYGON(".$request->geom.")";
          
        $bangunan->save();

        return view('backend.asset.index');
           

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
