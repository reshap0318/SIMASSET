<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\gol;

class golController extends Controller
{
  public function index()
  {
      try {
        $gols = gol::all();
        return view('backend.gol.index',compact('gols'));
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }

  }

  public function create()
  {
      try {
        return view('backend.gol.create');
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }
  }

  public function store(Request $request)
  {
    try {
      gol::create([$request->all()]);
      return redirect()->route('gol.index');
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
        $gol = gol::where('kd_gol',$id)->frist();
        return view('backend.gol.edit',compact('gol'));
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }
  }

  public function update(Request $request, $id)
  {
      try {
        $gol = gol::where('kd_gol',$id)->frist();
        $gol::update([$request->all()]);
        return redirect()->route('gol.index');
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
      }
  }

  public function destroy($id)
  {
      try {
        $gol = gol::where('kd_gol',$id)->frist();
        $gol->delete();
        return redirect()->route('gol.index');
        return redirect()->route('gol.index');
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
      }
  }
}
