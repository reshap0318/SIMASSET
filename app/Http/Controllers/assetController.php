<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\asset;
use App\data_master;

class assetController extends Controller
{
    public function index(Request $request)
    {
        if($request->data){
          $data_master = data_master::find($request->data);
          $asets = asset::where('master_id',$request->data)->get();
          return view('backend.asset.index',compact('data_master','asets'));
        }else{
          return view('frontend.404');
        }
    }

    public function create(Request $request)
    {
        if($request->data){
          $data_master = data_master::find($request->data);
          // return view('backend.asset.create',compact('data_master'));
        }else{
          return view('frontend.404');
        }
    }
}
