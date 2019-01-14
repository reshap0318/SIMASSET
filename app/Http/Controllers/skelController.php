<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\skel;
use App\kel;

class skelController extends Controller
{
  public function index()
  {
      try {
        $skels = skel::all();
        return view('backend.skel.index',compact('skels'));
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }

  }

  public function create()
  {
      try {
        $kel = kel::pluck('ur_kel','id_kel');
        return view('backend.skel.create',compact('kel'));
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }
  }

  public function store(Request $request)
  {
    try {
      skel::create([$request->all()]);
      return redirect()->route('skel.index');
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
        $kel = kel::pluck('ur_kel','id_kel');
        $skel = skel::where('id_skel',$id)->frist();
        return view('backend.skel.edit',compact('skel','kel'));
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }
  }

  public function update(Request $request, $id)
  {
      try {
        $skel = skel::where('id_skel',$id)->frist();
        $skel::update([$request->all()]);
        return redirect()->route('skel.index');
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }
  }

  public function destroy($id)
  {
      try {
        $skel = skel::where('id_skel',$id)->frist();
        $skel->delete();
        return redirect()->route('skel.index');
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }
  }
}
