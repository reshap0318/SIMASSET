<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kepemilikan;

class kepemilikanController extends Controller
{
  public function index()
  {
      try {
        $kepemilikans = kepemilikan::all();
        return view('backend.kepemilikan.index',compact('kepemilikans'));
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }

  }

  public function create()
  {
      try {
        return view('backend.kepemilikan.create');
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }
  }

  public function store(Request $request)
  {
    try {
      kepemilikan::create([$request->all()]);
      return redirect()->route('kepemilikan.index');
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
        $kepemilikan = kepemilikan::where('id_kepemilikan',$id)->frist();
        return view('backend.kepemilikan.edit',compact('kepemilikan'));
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }
  }

  public function update(Request $request, $id)
  {
      try {
        $kepemilikan = kepemilikan::where('id_kepemilikan',$id)->frist();
        $kepemilikan::update([$request->all()]);
        return redirect()->route('kepemilikan.index');
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }
  }

  public function destroy($id)
  {
      try {
        $kepemilikan = kepemilikan::where('id_kepemilikan',$id)->frist();
        $kepemilikan->delete();
        return redirect()->route('kepemilikan.index');
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }
  }
}
