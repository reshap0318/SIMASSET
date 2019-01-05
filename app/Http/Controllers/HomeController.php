<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Sentinel;
use App\data_master;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function home($value='')
    {
        return view('welcome');
    }
    public function YourhomePage($value='')
    {
        return view('home');
    }
    public function dashboard($value='')
    {
        return view('dashboard');
    }

    public function menu(Request $request)
    {
      $menu = data_master::wherenull('turunan_id')->get();
      return $menu;
    }
}
