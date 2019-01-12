<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaksi;

class transaksiController extends Controller
{
  public function index()
  {
      try {
        $transaksis = transaksi::all();
        return view('backend.transaksi.index',compact('transaksis'));
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }

  }

  public function create()
  {
      try {
        return view('backend.transaksi.create');
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }
  }

  public function store(Request $request)
  {
    try {
      transaksi::create([$request->all()]);
      return redirect()->route('transaksi.index');
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
        $transaksi = transaksi::where('kd_trn',$id)->frist();
        return view('backend.transaksi.edit',compact('transaksi'));
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }
  }

  public function update(Request $request, $id)
  {
      try {
        $transaksi = transaksi::where('kd_trn',$id)->frist();
        $transaksi::update([$request->all()]);
        return redirect()->route('transaksi.index');
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }
  }

  public function destroy($id)
  {
      try {
        $transaksi = transaksi::where('kd_trn',$id)->frist();
        $transaksi->delete();
        return redirect()->route('transaksi.index');
      } catch (\Exception $e) {
        toast()->error($e, 'Eror');
        toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        return redirect()->back();
      }
  }
}
