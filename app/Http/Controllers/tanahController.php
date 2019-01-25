<?php

namespace App\Http\Controllers;

use App\pemanfaatan;
use Illuminate\Http\Request;
use DB;
use App\tanah_old as tanah;
use App\asset;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use App\data_master;

class tanahController extends Controller
{

	public function index(Request $request){
	    $lok = $request->lok;
//	    if($request->lok==null){
//	        $tanah= \App\tanah::where('kd_brg', $request->kd_brg)->get();
//	        dd($tanah);
//	        $lokasi = $tanah->kd_kab;
//        }else{
            if($request->lok == 1){
                $tanah = \App\tanah::where('kd_kab', 855)->orWhere('kd_kab', 800)->get();
                $lokasi = 'Kampus I - Limau Manih';
            }elseif($request->lok==2){
                $tanah = \App\tanah::where('kd_kab', 856)->orWhere('kd_kab', 803)->get();
                $lokasi = 'Kampus II - Payakumbuh';
            }else{
                $tanah = \App\tanah::where('kd_kab', 0)->get();
                $lokasi = 'Kampus III Darmasraya';
            }
//        }


        return view('backend.asset.tanah.list_tanah_lokasi',compact('tanah', 'lokasi','lok'));
    }

    public function show($id){
	    $data = \App\tanah::where('id',$id)->first();
	    if(($data->kd_kab == 855)||($data->kd_kab == 800)){
	        $kab = 'Padang';
        } else if(($data->kd_kab == 856)||($data->kd_kab == 803)){
	        $kab = 'Payakumbuh';
        }else{
	        $kab = 'Darmasraya';
        }

        $total_biaya =0;
        $manfaat = pemanfaatan::where('aset_id', $id)->get();
	    foreach ($manfaat as $m){
	        $total_biaya = $total_biaya + $m->biaya;
        }
	    return view('backend.asset.tanah.detail',compact('data','kab','manfaat', 'total_biaya'));
    }
		




}
