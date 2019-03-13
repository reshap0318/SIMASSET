<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{
    public function pengadaan()
    {
        return redirect()->route('pemeliharaan.index');
        return view('backend.asset.page.pengadaan');
    }

    public function pemeliharaan()
    {
        return view('backend.asset.page.pemeliharaan');
    }

    public function pemanfaatan()
    {
        return view('backend.asset.page.pemanfaatan');
    }

    public function pemindah_tanganan()
    {
        return view('backend.asset.page.pemindah_tanganan');
    }

    public function penghapusan()
    {
        return view('backend.asset.page.penghapusan');
    }

    public function pembiayaan()
    {
        return view('backend.asset.page.pembiayaan');
    }
}
