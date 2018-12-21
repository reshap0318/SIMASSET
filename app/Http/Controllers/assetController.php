<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class assetController extends Controller
{
    public function Index()
    {
      return view('backend.asset.index');
    }

    public function create()
    {
        return view('backend.asset.create');
    }

    public function show($id)
    {
        return view('backend.asset.show');
    }
}
