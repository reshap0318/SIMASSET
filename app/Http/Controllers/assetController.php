<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class assetController extends Controller
{
    public function Index()
    {
      return view('asset.index');
    }
}
