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
  {{--<div class="row">--}}
    {{--<div class="col-md-4 col-sm-4 col-xs-12">--}}
    {{--<div class="x_panel tile fixed_height">--}}
                {{--<div class="x_title">--}}

                    {{--<h3>Kampus I - Limau Manis</h3>--}}
                  {{--<ul class="nav navbar-right panel_toolbox">--}}
                  {{--</ul>--}}
                  {{--<div class="clearfix"></div>--}}
                {{--</div>--}}
                {{--<div class="x_content">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-6">--}}
                            {{--<strong>Total  : </strong> {{$total_padang[0]->total}}--}}
                            {{--<br>--}}
                            {{--<strong>Luas  : </strong> {{number_format($total_padang[0]->sum  ,0,",",".")}} m2--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6">--}}
                            {{--<a href="{{route('tanah.index',['data'=>$data_master, 'lok' => '1'])}}" class="btn btn-primary pull-right">Lihat</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}

         {{--<div class="col-md-4 col-sm-4 col-xs-12">--}}
             {{--<div class="x_panel tile fixed_height">--}}
                {{--<div class="x_title">--}}
                  {{--<a href=""><h3>Kampus II - Payakumbuh</h3></a>--}}
                  {{--<ul class="nav navbar-right panel_toolbox">--}}
                  {{----}}
                  {{--</ul>--}}
                  {{--<div class="clearfix"></div>--}}
                {{--</div>--}}

            {{--<div class="x_content">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-6">--}}
                        {{--<strong>Total  : </strong> {{$total_payakumbuh[0]->total}}--}}
                        {{--<br>--}}
                        {{--<strong>Luas  : </strong> {{number_format($total_payakumbuh[0]->sum  ,0,",",".")}} m2--}}
                    {{--</div>--}}
                    {{--<div class="col-md-6">--}}
                        {{--<a href="{{route('tanah.index',['data'=>$data_master, 'lok' => '2'])}}" class="btn btn-primary pull-right">Lihat</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}

             {{--<div class="col-md-4 col-sm-4 col-xs-12">--}}
    {{--<div class="x_panel tile fixed_height">--}}
                {{--<div class="x_title">--}}
                  {{--<a href=""><h3>Kampus III - Dhamasraya</h3></a>--}}
                  {{--<ul class="nav navbar-right panel_toolbox">--}}
                  {{----}}
                  {{--</ul>--}}
                  {{--<div class="clearfix"></div>--}}
                {{--</div>--}}

        {{--<div class="x_content">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-6">--}}
                    {{--<strong>Total  : </strong> {{$total_damasraya[0]->total}}--}}
                    {{--<br>--}}
                    {{--<strong>Luas  : </strong>{{number_format($total_damasraya[0]->sum  ,0,",",".")}}  m2--}}
                {{--</div>--}}
                {{--<div class="col-md-6">--}}
                    {{--<a href="{{route('tanah.index',['data'=>$data_master, 'lok' => '3'])}}" class="btn btn-primary pull-right">Lihat</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
   {{----}}
{{--</div>--}}

      <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel tile fixed_height">
              <div class="x_title">
                  <a href=""><h3>Daftar Peralatan & Mesin</h3></a>
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

                          <th>Alamat</th>
                          <th>Harga </th>
                          <th>Action</th>

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
                      @foreach($aset as $dat)
                              <tr>
                                  <td class=" text-center">{{ ++$no }}</td>
                                  <td class=" ">{{$dat->kd_brg}}</td>
                                  <td class=" ">{{$dat->sskel->ur_sskel}}</td>

                                  <td class=" ">{{$dat->peralatan_mesin->merek}}</td>
                                  <td class=" ">
                                      @if($dat->catatan != null)
                                          {{$dat->catatan}}
                                          @else
                                          <small style="color: red"> Catatan Belum ada </small>
                                      @endif
                                  </td>
                                  <td class=" ">{{$dat->peralatan_mesin->tahun}}</td>
                                  <td> <a href="{{route('peralatan_mesin.show', [$dat->id])}}" class="btn btn-primary">Lihat</a></td>
                             </tr>
                      @endforeach
                      </tbody>
                      <tr>
                          <td colspan="5"><strong class="pull-right">TOTAL</strong></td>
                          <td><strong>{{count($aset)}}</strong></td>
                      </tr>
                  </table>
              </div>
          </div>
      </div>

  </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            table = $('#tblaset').DataTable({
                "order": [],
                'columnDefs': [{
                    'targets': 0,
                    'orderable':false,
                }],
            });
        });

        $("input#delete-confirm").on("click", function(){
            return confirm("Yakin Ingin Menghapus Barang Ini?");
        });

    </script>
@endsection
