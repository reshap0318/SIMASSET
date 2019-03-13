<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Sentinel;
use App\data_master;
use App\Charts\Fusioncharts;
use App\Charts\Echarts;

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

      //chart untuk keuangan asset keseluruhan untuk 10 terbesar
        $rph_asset = DB::SELECT('select sum(asset.rph_aset) as jumlah, sskel.ur_sskel from sskel JOIN asset on sskel.kd_brg = asset.kd_brg GROUP BY sskel.ur_sskel order by jumlah desc limit 10');
        $label_rph = [];
        $harga_rph = [];
        foreach ($rph_asset as $rph) {
            array_push($label_rph,$rph->ur_sskel);
            array_push($harga_rph,$rph->jumlah);
        }

        $chart_rph = new Echarts;
        $chart_rph->labels($label_rph);
        $chart_rph->dataset('Keuangan per Aset', 'bar', $harga_rph)->color('#1d6d24');
        $chart_rph->options([
            'tooltip'  => [
              'trigger' => 'axis',
              'axisPointer' => [
                'type' => 'cross',
                'label' => [
                    'backgroundColor' => '#6a7985'
                ]
              ],
            ],
            'toolbox' => [
              'show'=> true,
              'orient'=> 'vertical',
              'left'=> 'right',
              'top'=> 'center',
              'feature'=> [
                  'mark' => ['show' => true],
                  'dataView' => ['show'=> true, 'readOnly'=> false],
                  'magicType' => ['show'=> true, 'type'=> ['line', 'bar']],
                  'restore' => ['show'=> true],
                  'saveAsImage'=> ['show'=> true]
              ]
            ],
            'xAxis' => [
                'type' => 'category',
            ],
            'yAxis' => [
                'type' => 'value',
                'boundaryGap' => [0, '100%']
            ],
            "legend" => [
              "show" => false
            ]
        ]);
      //end chart untuk keuangan asset keseluruhan untuk 10 terbesar

      //start grafik keuangan Pertahun
        $arus_uang = DB::select('Select sum(rph_aset) as angka, year(tgl_buku) as tahun from asset group by year(tgl_buku)');
        $label_harga_asset = [];
        $label_tahun_asset = [];
        $total = 0;
        foreach ($arus_uang as $arus) {
          $total += $arus->angka;
          array_push($label_harga_asset,$total);
          array_push($label_tahun_asset,$arus->tahun);
        }

        $pchart = new Echarts;
        $pchart->labels($label_tahun_asset);
        $pchart->dataset('Total Harga', 'line', $label_harga_asset);
        $pchart->options([
          'tooltip'  => [
            'trigger' => 'axis',
            'axisPointer' => [
              'type' => 'cross',
              'label' => [
                  'backgroundColor' => '#6a7985'
              ]
            ],
          ],
          'toolbox' => [
              'feature' => [
                  'saveAsImage' => []
              ]
          ],
          'xAxis' => [
              'type' => 'category',
              'boundaryGap' => false
          ],
          'yAxis' => [
              'type' => 'value',
              'boundaryGap' => [0, '100%']
          ],
          'dataZoom' => [
            [
              'type' => 'inside',
              'start' => 0,
              'end' => 100
            ], [
                'start' => 0,
                'end' => 100,
                'handleIcon' => 'M10.7,11.9v-1.3H9.3v1.3c-4.9,0.3-8.8,4.4-8.8,9.4c0,5,3.9,9.1,8.8,9.4v1.3h1.3v-1.3c4.9-0.3,8.8-4.4,8.8-9.4C19.5,16.3,15.6,12.2,10.7,11.9z M13.3,24.4H6.7V23h6.6V24.4z M13.3,19.6H6.7v-1.4h6.6V19.6z',
                'handleSize' => '80%',
                'handleStyle' => [
                    'color' => '#fff',
                    'shadowBlur' => 3,
                    'shadowColor' => 'rgba(0, 0, 0, 0.6)',
                    'shadowOffsetX' => 2,
                    'shadowOffsetY' => 2
                ]
            ]
          ],
        ]);
        $pchart->datasets[0]->options([
          'areaStyle' => ['normal' => []],
          'label' => [
                'normal' => [
                    'position' => 'top'
                ],
            ],
            'smooth' => true,
            // 'symbol' => 'none',
            'sampling' => 'average',
        ]);
      //end grafik keuangan Pertahun



        return view('dashboard',compact('pchart','chart_rph'));
    }

    public function menu(Request $request)
    {
      $menu = data_master::wherenull('turunan_id')->get();
      return $menu;
    }
}
