<?php

namespace App\Http\Controllers;

use App\bid;
use App\data_master;
use App\gol;
use App\kel;
use App\skel;
use App\sskel;
use Illuminate\Http\Request;

class DataMasterController extends Controller
{

    public function index(Request $request)
    {
//      $request->session()->put('statis', $request->aset);
//      $aset = $request->aset;
//        /if($aset == "Lancar"){
//          $datamasters = data_master::where('keterangan','Lancar')->orderby('id','asc')->get();
//          return view('backend.datamaster.index',compact('datamasters','aset'));
//        }elseif($aset == "Tetap"){
//          $datamasters = data_master::where('keterangan','Tetap')->orderby('id','asc')->get();
          // dd($datamasters);
//          return view('backend.datamaster.index',compact('datamasters','aset'));
//        }else{
//          return view('frontend.404');
//        }

        $datamasters = data_master::all();

        return view('backend.datamaster.index',compact('datamasters'));
    }


    public function create(Request $request)
    {
      $aset = $request->session()->get('statis');
       $id = $request->id;
       if($id){

       }else{
         $id = null;
       }
       return view('backend.datamaster.create',compact('id','aset'));

    }

    public function store(Request $request)
    {
        $request->validate([
          'id'=> 'required',
          'nama_asset' => 'required',
          'keterangan' => 'required',
        ]);

        $ada = data_master::where('id',$request->id0.$request->id)->first();
        if($ada){
          return redirect()->back();
        }

        $datamaster = new data_master;
        $datamaster->id = $request->id0.$request->id;
        $datamaster->nama_asset = $request->nama_asset;
        $datamaster->keterangan = $request->keterangan;
        $datamaster->turunan_id = $request->id0;
        try {
          $datamaster->save();
          return  redirect()->route('datamaster.index',['aset='.$request->keterangan]);
        } catch (\Exception $e) {
          return redirect()->back();
        }
    }

    public function show($id)
    {
        $datas = bid::where('kd_gol', $id)->get();
        $gol = gol::where('kd_gol', $id)->first();
        $nama_gol = $gol->ur_gol;

//        $data = data_master::find($id)->id;
//        return redirect(action('assetController@index', ['data' => $data]));
        return view('backend.datamaster.subDataMaster',compact('datas','nama_gol'));
    }

    public  function showsub($idm, $id){
        $datas = kel::where('kd_bid', $id)->Where('kd_gol', $idm)->get();
        $bid = bid::where('kd_bid', $id)->Where('kd_gol', $idm)->first();
        $nama= $bid->ur_bid;
        return view('backend.datamaster.ssdm',compact('datas','nama'));
    }

    public  function showsubsub($idm, $id, $ids){
        $datas = skel::Where('kd_gol', $idm)->where('kd_bid', $id)->where('kd_kel', $ids)->get();
        $kel = kel::Where('kd_gol', $idm)->where('kd_bid', $id)->where('kd_kel', $ids)->first();
        $nama= $kel->ur_kel;

        return view('backend.datamaster.sssdm',compact('datas','nama'));
    }

    public  function showBarang($idm, $id, $ids, $idb){
        $datas = sskel::Where('kd_gol', $idm)->where('kd_bid', $id)->where('kd_kel', $ids)->where('kd_skel', $idb)->get();
        $skel = skel::Where('kd_gol', $idm)->where('kd_bid', $id)->where('kd_kel', $ids)->where('kd_skel', $idb)->first();
       
        $nama= $skel->ur_skel;
        return view('backend.datamaster.ssssdm_kdbrg',compact('datas','nama'));
    }

    public function edit($id)
    {
        return redirect()->back();
        $aset = $request->session()->get('statis');
        $datamaster = data_master::where('id',$id)->first();
        $id = $datamaster->turunan_id;

    }

    public function update($id)
    {
        $data = data_master::find($id);
        dd($data);
//        return view('backend.datamaster.index',compact('role','user','action'));
    }

    public function destroy($id)
    {
      try {
          $data = data_master::find($id);
          $data->delete();
          return redirect()->back();

      } catch (\Exception $e) {
          return redirect()->back();
      }

    }
}
