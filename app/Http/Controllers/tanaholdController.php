<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\tanah_old as tanah;
use App\asset;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use App\data_master;

class tanaholdController extends Controller
{
  public function store(Request $request){
      $request->validate([
        'no_registrasi_aset' => 'required|unique:tanah',
        'kode_barang' => 'required',
        'kode_satker' => 'required',
        'nup' => 'required',
        'no_kib' => 'required',
        'kondisi' => 'required',
        'merek' => 'required',
        'tercatat_dalam' => 'required',
        'status_sbsn' => 'required',
        'status_aset_idle' => 'required',
        'status_dokumen' => 'required',
        'jenis_dokumen' => 'required',
        'jenis_sertifikat' => 'required',
        'no_dokumen' => 'required',
        'luas' => 'required',
        'luas_tanah_bangunan' => 'required',
        'geom' => 'required',
        'master_id' => 'required',
        'foto' => 'image|mimes:jpg,png,jpeg,gif',
      ]);

      // dd($request->all());
      $aset = new asset;
      $aset->no_registrasi_aset = $request->master_id.$request->no_registrasi_aset;
      $aset->kode_barang = $request->kode_barang;
      $aset->kode_satker = $request->kode_satker;
      $aset->nup = $request->nup;
      $aset->no_kib = $request->no_kib;
      $aset->kondisi = $request->kondisi;
      $aset->merek = $request->merek;
      $aset->tercatat_dalam = $request->tercatat_dalam;
      $aset->status_sbsn = $request->status_sbsn;
      $aset->status_aset_idle = $request->status_aset_idle;
      $aset->master_id = $request->master_id;

      if ($request->hasFile('foto') && $request->foto->isValid()) {
          $path = 'img/asets';
          $oldfile = $aset->foto;

          $fileext = $request->foto->extension();
          $filename = uniqid("asets-").'.'.$fileext;

          //Real File
          $filepath = $request->file('foto')->storeAs($path, $filename, 'local');
          //foto File
          $realpath = storage_path('app/'.$filepath);
          $aset->foto = $filename;
          //hapus foto lama
          File::delete(storage_path('app'.'/'. $path . '/' . $oldfile));
          File::delete(public_path($path . '/' . $oldfile));
      }
      try {
        if($aset->save()){

            $tanah = new tanah;
            $tanah->no_registrasi_aset = $aset->no_registrasi_aset;
            $tanah->status_dokumen = $request->status_dokumen;
            $tanah->no_dokumen = $request->no_dokumen;
            $tanah->jenis_dokumen = $request->jenis_dokumen;
            $tanah->jenis_sertifikat = $request->jenis_sertifikat;
            $tanah->tanggal_dokumen = $request->tanggal_dokumen;
            $tanah->luas = $request->luas;
            $tanah->luas_tanah_bangunan = $request->luas_tanah_bangunan;
            $tanah->geom = $request->geom;
            $tanah['geom'] = "MULTIPOLYGON(".$tanah['geom'].")";
            $tanah->save();
            return redirect()->route('aset.index',['data='.$aset->master->kepala->kepala->kepala->kepala->nama_asset]);
        }
      } catch (\Exception $e) {
          return redirect()->back();
      }
  }

  public function destroy($id)
  {
    $asset = asset::find($id);
    try {
        $asset->delete();
        return redirect()->route('aset.index',['data=Tanah']);
    } catch (\Exception $e) {
        return redirect()->back();
    }

  }

  public function layertanah($id){
      if ($id != 'all'){
          $store = tanah::where('id',$id)->get();
      }else{
          $store = tanah::all();
      }
      $ret = config('value.t1');
      $i = 0;
      foreach ($store as $l){
          $ret['features'][$i] = config('value.t2');
          $ret['features'][$i]['geometry'] = $l->geom;
          $i++;
      }
      return response()->json($ret);
  }

  public function tanah($id){
      $tanah = DB::SELECT(DB::RAW("select id, no_registrasi_aset, ST_asgeojson(geom) AS geometry, st_x(st_centroid(geom)) as lng, st_y(st_centroid(geom)) as lat from tanah where id=$id"));
      foreach ($tanah as $row) {
        $id=$row->id;
        $no_registrasi_aset=$row->no_registrasi_aset;
        $longitude=$row->lng;
        $latitude=$row->lat;
        $dataarray[]=array('id'=>$id,'no_registrasi_aset'=>$no_registrasi_aset,'longitude'=>$longitude,'latitude'=>$latitude);
      }
      return response()->json($dataarray);
  }

  public function index(Request $request){
       if($request->data){
          $data_master = data_master::where('nama_asset',$request->data)->orderby('id','asc')->first();


          // dd($data_master->rumpun->rumpun->rumpun->rumpun->nama_asset);
          /*
          list tanah didapatkan dari kode barang, atau dari menu aset, bagian yang diseleksi dan table databasenya data_master fungsinya disini
          untuk create, cuman disini dimasukan kedalam session agar bisa di pakai di create nantinya
          */
          $list =[];
          /*
            data merupakan array yang berisikan asset berdasarkan tanah table nya disini adalah table asset + tanah
          */
          $data = [];
          if($data_master->rumpun){
            foreach ($data_master->rumpun as $masters) {
              if($masters->rumpun){
                foreach ($masters->rumpun as $master) {
                  if($master->rumpun){
                    foreach ($master->rumpun as $mast) {
                      if($mast->rumpun){
                        foreach ($mast->rumpun as $mas) {
                          $list = $list+[$mas->id => $mas->nama_asset];
                          if($mas->aset){
                            foreach ($mas->aset as $aset) {

                              array_push($data,$aset);

                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }

          


          $request->session()->put('list', collect($list));
     

                $request->session()->put('list', collect($list));
          return view('backend.asset.index',compact('data','data_master'));
        }else{
          return view('frontend.404');
        }

  }
}
