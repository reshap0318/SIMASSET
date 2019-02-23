@extends('layouts.frontend')
@section('title')
    List Asset {{$data_master->nama_asset}}
@stop

@section('content')
    <div class="x_panel">
        <div class="x_title">
            <h2>Pilih Lokasi Asset {{$data_master->nama_asset}}</h2>
            <ul class="nav navbar-right panel_toolbox">

            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel tile fixed_height">
                <div class="x_title">

                    <h3>Kampus I - Padang</h3>
                    <ul class="nav navbar-right panel_toolbox">
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Total  : </strong> {{$total_padang[0]->total}}
                            <br>
                            <strong>Luas  : </strong> {{number_format($total_padang[0]->sum  ,0,",",".")}} m2
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('gedungBangunan.index',['data'=>$data_master, 'lok' => '1'])}}" class="btn btn-warning pull-right">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel tile fixed_height">
                <div class="x_title">
                    <a href=""><h3>Kampus II - Payakumbuh</h3></a>
                    <ul class="nav navbar-right panel_toolbox">

                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Total  : </strong> {{$total_payakumbuh[0]->total}}
                            <br>
                            <strong>Luas  : </strong> {{number_format($total_payakumbuh[0]->sum  ,0,",",".")}} m2
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('gedungBangunan.index',['data'=>$data_master, 'lok' => '2'])}}" class="btn btn-warning pull-right">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel tile fixed_height">
                <div class="x_title">
                    <a href=""><h3>Kampus III - Dhamasraya</h3></a>
                    <ul class="nav navbar-right panel_toolbox">

                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Total  : </strong> {{$total_damasraya[0]->total}}
                            <br>
                            <strong>Luas  : </strong>{{number_format($total_damasraya[0]->sum  ,0,",",".")}}  m2
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('gedungBangunan.index',['data'=>$data_master, 'lok' => '3'])}}" class="btn btn-warning pull-right">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel tile fixed_height">
                <div class="x_title">
                    <a href=""><h3>Daftar Tanah</h3></a>
                    <ul class="nav navbar-right panel_toolbox">

                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <table class="table table-bordered table-striped table-hover" id="tblaset">
                        <thead>
                        <tr class="headings">
                            <th class="text-center">No</th>
                            <th>Kode </th>
                            <th>Nama </th>
                            <th>Jumlah daerah I</th>
                            <th>Jumlah daerah II</th>
                            <th>Jumlah daerah III</th>
                            <th>Jumlah</th>

                            {{--<th class="no-link last"><span class="nobr">Action</span></th>--}}
                            {{--<th class="bulk-actions" colspan="7">--}}
                            {{--<a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>--}}
                            {{--</th>--}}
                        </tr>
                        </thead>
                        <?php $no=0; $t=0; $k=0; $m=0; $l=0;
                        function kasihtitik($id)
                        {
                            $coba = str_split($id);
                            $s = null;
                            for($i=0;$i<count($coba);$i++){
                                if($i%2!=0 || $i==count($coba)-1){
                                    $s = $s.$coba[$i];
                                }else{
                                    $s = $s.$coba[$i].'.';
                                }
                            }

                            return $s;
                        }?>
                        <tbody>
                        @foreach($datas as $dat)
                            <?php
                            $total_per_jenis = DB::select('Select count(kd_brg) as kd_brg from asset where kd_brg= ?',[$dat->kd_brg]);
                            $pdg = DB::select('Select count(kd_brg) as GroupKota from asset join gedung_bangunan on gedung_bangunan.id=asset.id where kd_brg= ? and (kd_kab = 855 or kd_kab= 800)',[$dat->kd_brg]);
                            $pyk = DB::select('Select count(kd_brg) as GroupKota from asset join gedung_bangunan on gedung_bangunan.id=asset.id where kd_brg= ? and (kd_kab = 856 or kd_kab= 803) ',[$dat->kd_brg]);
                            $dmr = DB::select('Select count(kd_brg) as GroupKota from asset join gedung_bangunan on gedung_bangunan.id=asset.id where kd_brg= ? and (kd_kab = 0) ',[$dat->kd_brg]);
//                                                      dd($dat->kd_brg);
                            ?>
                            @if($total_per_jenis[0]->kd_brg != 0)
                                <td class=" text-center">{{ ++$no }}</td>
                                <td class=" ">{{kasihtitik($dat->kd_brg)}}</td>
                                <td class=" ">{{$dat->ur_sskel}}</td>
                                <td>{{$pdg[0]->GroupKota}}</td>
                                <td>{{$pyk[0]->GroupKota}}</td>
                                <td>{{$dmr[0]->GroupKota}}</td>
                                <td class=" ">{{$total_per_jenis[0]->kd_brg}}</td>
                                {{--<td class=" last">--}}
                                {{--@if (Sentinel::getUser()->hasAccess(['aset.show']))--}}
                                {{--<center>--}}
                                {{--<a href="{{route('tanah.index', [$dat->kd_brg])}}" class="btn btn-primary">Lihat</a>--}}
                                {{--</center>--}}
                                {{--@endif--}}

                                {{--</td>--}}
                                </tr>
                                <!--                              --><?php
                                $t= $t + $total_per_jenis[0]->kd_brg;
                                $k = $k + $pdg[0]->GroupKota;
                                $l = $l + $pyk[0]->GroupKota;
                                $m = $m + $dmr[0]->GroupKota;
                                ?>
                            @endif
                        @endforeach
                        </tbody>
                        <tr>
                            <td colspan="3"><strong class="pull-right">TOTAL</strong></td>
                            <td><strong>{{$k}}</strong></td>
                            <td><strong>{{$l}}</strong></td>
                            <td><strong>{{$m}}</strong></td>
                            <td><strong>{{$t}}</strong></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

