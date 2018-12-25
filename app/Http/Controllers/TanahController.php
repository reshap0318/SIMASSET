<?php

namespace App\Http\Controllers;
use App\DataMaster;
use App\Tanah;


use Illuminate\Http\Request;

class TanahController extends Controller
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
   
        return view('backend.asset.tanah.create',compact('noReg'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tanah = new Tanah;
        $tanah->no_registrasi_aset= $request->no_registrasi;
        $tanah->status_dokumen = $request->status_dokumen;
        $tanah->jenis_dokumen = $request->jenis_dokumen;
        $tanah->jenis_sertifikat = $request->jenis_sertifikat;
        $tanah->no_dokumen = $request->no_dokumen;
        $tanah->tanggal_dokumen = $request->tanggal_dokumen;
        $tanah->luas = $request->luas;
        $tanah->luas_tanah_bangunan = $request->luas_tanah_bangunan;


        $tanah->geom= "MULTIPOLYGON(".$request->geom.")";
          
        $tanah->save();
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
