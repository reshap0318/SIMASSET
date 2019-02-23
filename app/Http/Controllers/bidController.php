<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bid;
use App\gol;

class bidController extends Controller
{

    public function index()
    {
        try {
          $bids = bid::all();
          return view('backend.bid.index',compact('bids'));
        } catch (\Exception $e) {
          toast()->error($e, 'Eror');
          toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
          return redirect()->back();
        }

    }

    public function create()
    {
        try {
          $gol = gol::pluck('ur_gol','kd_gol');
          return view('backend.bid.create',compact('gol'));
        } catch (\Exception $e) {
          toast()->error($e, 'Eror');
          toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
          return redirect()->back();
        }
    }

    public function store(Request $request)
    {
      try {
        bid::create([$request->all()]);
        return redirect()->route('bid.index');
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
          $gol = gol::pluck('ur_gol','kd_gol');
          $bid = bid::where('id_bid',$id)->frist();
          return view('backend.bid.edit',compact('gol','bid'));
        } catch (\Exception $e) {
          toast()->error($e, 'Eror');
          toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
          return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
          $bid = bid::where('id_bid',$id)->frist();
          $bid::update([$request->all()]);
          return redirect()->route('bid.index');
        } catch (\Exception $e) {
          toast()->error($e, 'Eror');
          toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
          return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
          $bid = bid::where('id_bid',$id)->frist();
          $bid->delete();
          return redirect()->route('bid.index');
        } catch (\Exception $e) {
          return redirect()->back();
          toast()->error($e, 'Eror');
          toast()->error('Eror Saat Meload Data, Reload Again', 'Eror');
        }
    }
}
