<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kel;
use App\bid;

class kelController extends Controller
{

  public function index()
  {
      try {
        $kels = kel::all();
        return view('backend.kel.index',compact('kels'));
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }

  }

  public function create()
  {
      try {
        $bid = bid::pluck('ur_bid','kd_bid');
        return view('backend.kel.create',compact('bid'));
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }
  }

  public function store(Request $request)
  {
    try {
      kel::create([$request->all()]);
      return redirect()->route('kel.index');
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
        $bid = bid::pluck('ur_bid','kd_bid');
        $kel = kel::where('id_kel',$id)->frist();
        return view('backend.kel.edit',compact('kel','bid'));
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }
  }

  public function update(Request $request, $id)
  {
      try {
        $kel = kel::where('id_kel',$id)->frist();
        $kel::update([$request->all()]);
        return redirect()->route('kel.index');
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }
  }

  public function destroy($id)
  {
      try {
        $kel = kel::where('id_kel',$id)->frist();
        $kel->delete();
        return redirect()->route('kel.index');
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }
  }
}
