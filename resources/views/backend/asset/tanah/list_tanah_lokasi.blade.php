@extends('layouts.frontend')
@section('title')
  List Asset {{$lokasi}}
@stop

@section('content')
  <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel tile fixed_height">
              <div class="x_title">
                  <a href=""><h3>Daftar Tanah {{$lokasi}}</h3></a>
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
                          <th>Luas (m2)</th>
                          <th class="no-link last"><span class="nobr">Action</span></th>
                          <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                          </th>
                      </tr>
                      </thead>
                      <?php $no=0; $t=0;
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
                      @foreach($tanah as $dat)
                          <td class=" text-center">{{ ++$no }}</td>
                          <td>{{kasihtitik($dat->kd_brg)}}</td>
                          <td class=" ">{{$dat->namaBarang->ur_sskel}}</td>
                          <td class=" ">{{$dat->luass+$dat->luasb+$dat->luasl+$dat->luask}}</td>

                          {{--<td class=" ">{{$total_per_jenis[0]->kd_brg}}</td>--}}
{{--                          <td class=" ">{{$dat->satker->nama_satker}}</td>--}}
                          <td class=" last">
                              @if (Sentinel::getUser()->hasAccess(['aset.show']))
                                  <center>
                              <a href="{{route('tanah.show', [$dat->kd_brg])}}" class="btn btn-primary">Lihat</a>
                                  </center>
                              @endif

                          </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>

  </div>
@endsection
