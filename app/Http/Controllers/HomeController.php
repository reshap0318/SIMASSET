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
        $total_damasraya = DB::select('Select count(id) as total, sum(luass) as sum from tanah where kd_kab=0');
        $total_payakumbuh = DB::select('Select count(id) as total, sum(luass) as sum from tanah where kd_kab=856 or kd_kab=803');
        $total_padang = DB::select('Select count(id) as total,sum(luass) as sum from tanah where kd_kab=855 or kd_kab=800');

        $arus_uang = DB::select('Select sum(rph_aset) as angka, year(tgl_buku) as tahun from asset group by year(tgl_buku)');
        $label_harga_asset = [];
        $label_tahun_asset = [];
        $total = 0;
        foreach ($arus_uang as $arus) {
          $total += $arus->angka;
          array_push($label_harga_asset,$total);
          array_push($label_tahun_asset,$arus->tahun);
        }

        $total_asset = DB::select('select count(asset.id) as total, data_master.nama_asset as nama from data_master left join asset on data_master.id = asset.master_id group by data_master.nama_asset');
        // dd($total_asset);
        $asets_nama = [];
        $asets_total = [];
        foreach ($total_asset as $asset) {
          array_push($asets_nama, $asset->nama);
          array_push($asets_total, $asset->total);
        }

        $pemeliharaan_aset = DB::select("SELECT COUNT(pemeliharaan_aset.id) as banyak, SUM(pemeliharaan_aset.biaya) as total, pemeliharaan_aset.tanggal, data_master.nama_asset as nama FROM data_master LEFT JOIN asset on data_master.id = asset.master_id LEFT JOIN pemeliharaan_aset on asset.id = pemeliharaan_aset.aset_id GROUP by data_master.nama_asset, pemeliharaan_aset.tanggal");
        // dd($pemeliharaan_aset);
        $pemeliharaans= [];
        foreach ($pemeliharaan_aset as $pemeliharaan) {
            $pemeliharaans = array_merge($pemeliharaans, array($pemeliharaan->nama=>$pemeliharaan->nama));
          }
          foreach ($pemeliharaans as $pp) {
            if($pp==$pemeliharaan->nama){
              array_push($pemeliharaans,[$pp=>[1,2]]);
            }
          }

        $lchart = new Echarts;
        $lchart->labels(['Luas Tanah (M2)']);
        $lchart->dataset('Kampus I - Limau Manis', 'bar', [$total_padang[0]->sum]);
        $lchart->dataset('Kampus II - Payakumbuh', 'bar', [$total_payakumbuh[0]->sum]);
        $lchart->dataset('Kampus III - Damasraya', 'bar', [$total_damasraya[0]->sum]);
        $lchart->options([
            'yAxis' => [
                'show' => true, // or false, depending on what you want.
                'position' => 'right',
                'offset' => -12
            ]
        ]);

        $gchart = new Echarts;
        $gchart->labels($label_tahun_asset);
        $gchart->dataset('Total Harga', 'line', $label_harga_asset);
        $gchart->datasets[0]->options([
          'areaStyle' => []
        ]);
        // dd($gchart);

        $jchart = new Echarts;
        $jchart->labels(['Kampus I - Limau Manis', 'Kampus II - Payakumbuh', 'Kampus III - Damasraya']);
        $jchart->dataset('Jumlah Tanah Perdaerah', 'pie', [$total_padang[0]->total,$total_payakumbuh[0]->total,$total_damasraya[0]->total]);

        $jchart->options([
            'tooltip' => [
                'trigger' => 'item', // or false, depending on what you want.
                'formatter' => "{a} <br/>{b}: {c} ({d}%)"
            ],
            'legend' => [
                'orient' => 'horizontal',
                'x' => 'center',
            ],
            'yAxis' => [
                'show' => false, // or false, depending on what you want.
            ],
            'xAxis' => [
                'show' => false, // or false, depending on what you want.
            ]
        ]);
        $jchart->datasets[0]->options([
          'radius'=>['50%', '70%'],
          'avoidLabelOverlap' => false,
          'label' => [
            'normal' => [
              'show' => true,
            ],
            'emphasis' => [
                'show' => true,
                'textStyle' => [
                    'fontSize' => '30',
                    'fontWeight' => 'bold'
                ]
            ],
            'labelLine' => [
                'normal' => [
                    'show' => true
                ]
            ],
          ],
        ]);


        $mchart = new Echarts;
        $mchart->labels($asets_nama);
        $mchart->dataset('Total Asset PerUnit', 'pie', $asets_total);
        $mchart->options([
            'tooltip' => [
                'trigger' => 'item', // or false, depending on what you want.
                'formatter' => "{a} <br/>{b}: {c} ({d}%)"
            ],
            'legend' => [
                'orient' => 'vertical',
                'x' => 'left',
            ],
            'yAxis' => [
                'show' => false, // or false, depending on what you want.
            ],
            'xAxis' => [
                'show' => false, // or false, depending on what you want.
            ]
        ]);
        $mchart->datasets[0]->options([
          'radius'=>['50%', '70%'],
          'avoidLabelOverlap' => false,
          'label' => [
            'normal' => [
              'show' => false,
            ],
            'emphasis' => [
                'show' => true,
                'textStyle' => [
                    'fontSize' => '30',
                    'fontWeight' => 'bold'
                ]
            ],
            'labelLine' => [
                'normal' => [
                    'show' => false,
                ]
            ],
          ],
        ]);

        $pchart = new Echarts;
        $pchart->labels($label_tahun_asset);
        $pchart->dataset('Total Harga', 'line', $label_harga_asset);
        $pchart->datasets[0]->options([
          'areaStyle' => []
        ]);
        
        return view('dashboard',compact('jchart', 'lchart','gchart', 'mchart','pchart'));
    }

    public function menu(Request $request)
    {
      $menu = data_master::wherenull('turunan_id')->get();
      return $menu;
    }
}
