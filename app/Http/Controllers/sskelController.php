<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sskel;
use App\skel;

class sskelController extends Controller
{
  public function index()
  {
      try {
        $sskels = sskel::all();
        return view('backend.sskel.index',compact('sskels'));
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }

  }

  public function create()
  {
      try {
        $skel = skel::pluck('ur_skel','kd_skel');
        return view('backend.sskel.create',compact('skel'));
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }
  }

  public function store(Request $request)
  {
    try {
      sskel::create([$request->all()]);
      return redirect()->route('sskel.index');
    } catch (\Exception $e) {
      toast()->error($e, 'Eror');
      toast()->error('Gagal Saat Menyimpan Data', 'Eror');
      return redirect()->back();
    }
  }

  public function show($id)
  {
      try {
        return redirect()->back();
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }
  }

  public function edit($id)
  {
      try {
        $skel = skel::pluck('ur_skel','kd_skel');
        $sskel = sskel::where('id_sskel',$id)->frist();
        return view('backend.sskel.edit',compact('sskel','skel'));
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }
  }

  public function update(Request $request, $id)
  {
      try {
        $sskel = sskel::where('id_sskel',$id)->frist();
        $sskel::update([$request->all()]);
        return redirect()->route('sskel.index');
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }
  }

  public function destroy($id)
  {
      try {
        $sskel = sskel::where('id_sskel',$id)->frist();
        $sskel->delete();
        return redirect()->route('sskel.index');
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }
  }
}
