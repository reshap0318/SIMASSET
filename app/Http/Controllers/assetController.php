<?php

namespace App\Http\Controllers;

use App\sskel;
use Illuminate\Http\Request;
use App\asset;
use App\data_master;
use App\tanah_old as tanah;
use App\bangunan_gedung;
use DB;
use App\barang;
use App\satker;

class assetController extends Controller
{




    public function index(Request $request)
    {
        $data_master = data_master::where('id',$request->data)->orderby('id','asc')->first();
        $aset = asset::where('master_id',$request->data)->get();
        $datas = sskel::where('kd_gol',$request->data)->get();

        if($request->data=='2'){

            $total_damasraya = DB::select('Select count(id) as total, sum(luass) as sum from tanah where kd_kab=0');
              $total_payakumbuh = DB::select('Select count(id) as total, sum(luass) as sum from tanah where kd_kab=856 or kd_kab=803');
              $total_padang = DB::select('Select count(id) as total,sum(luass) as sum from tanah where kd_kab=855 or kd_kab=800');
           return view('backend.asset.tanah.index',compact('aset','datas','data_master','total_payakumbuh','total_damasraya','total_padang'));
        }elseif($request->data=='3') {

            return view('backend.asset.peralatan_mesin.index',compact('aset','datas','data_master'));
        }elseif($request->data=='4') {
            $total_damasraya = DB::select('Select count(id) as total, sum(luas_bdg) as sum from gedung_bangunan where kd_kab=0');
            $total_payakumbuh = DB::select('Select count(id) as total, sum(luas_bdg) as sum from gedung_bangunan where kd_kab=856 or kd_kab=803');
            $total_padang = DB::select('Select count(id) as total,sum(luas_bdg) as sum from gedung_bangunan where kd_kab=855 or kd_kab=800');

            return view('backend.asset.gedung_bangunan.index',compact('aset','datas','data_master','total_padang','total_damasraya', 'total_payakumbuh'));

        }
        else{
            return view('frontend.404');
        }



    }

    public function create(Request $request)
    {
        $barang = barang::pluck('nama_barang','kode_barang');
        $satker = satker::pluck('nama_satker','kode_satker');
        if($request->data){
          $data_master = data_master::where('nama_asset',$request->data)->first();
            $noReg = $request->session()->get('list');
         
            return view('backend.asset.create',compact('data_master','noReg','barang','satker'));
        }else{
          return view('frontend.404');
        }
    }

    public function store(Request $req){
     
    }

    public function show($id)
    {
      $aset = asset::find($id);
      if($aset->master->kepala->kepala->kepala->kepala){
        //1 tanah

        if($aset->master->kepala->kepala->kepala->kepala->nama_asset == 'Tanah'){
           
          $tanah = tanah::where('no_registrasi_aset',$aset->no_registrasi_aset)->first();
        
          return view('backend.asset.detail',compact('aset','tanah'));
        }
        //2 bangunan_gedung
        else if(strtolower($aset->master->kepala->kepala->kepala->kepala->nama_asset) == strtolower('bangunan')){
          // dd($aset->no_registrasi_aset);
          $bangunan = bangunan_gedung::where('no_registrasi_aset',$aset->no_registrasi_aset)->first();
          return view('backend.asset.detail',compact('aset','bangunan'));
        }
        //3 belum tau
        else if(strtolower($aset->master->kepala->kepala->kepala->kepala->nama_asset) == strtolower('dll')){

        }
      }
      else{
        return view('frontend.404');
      }
    }

    public function destroy($id)
    {
      $asset = asset::find($id);
      try {
          $asset->delete();
          return redirect()->route('aset.index',['data='.$asset->nama_asset]);
      } catch (\Exception $e) {
          return redirect()->back();
      }

    }



}
