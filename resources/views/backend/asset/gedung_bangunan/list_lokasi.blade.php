@extends('layouts.frontend')
@section('title')
  List Asset {{$lokasi}}
@stop

@section('content')
  <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel tile fixed_height">
              <div class="x_title">
                  <a href="" class="col-sm-6"><h3>Daftar Tanah {{$lokasi}}</h3></a>
                    <li><a class="btn btn-success navbar-right" href="{{route('page.pengadaan')}}">Pengadaan</a></li>
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
                          <th style="width: 20%">Catatan</th>
                          <th>Action</th>
                          {{--<th class="no-link last"><span class="nobr">Action</span></th>--}}
                          {{--<th class="bulk-actions" colspan="7">--}}
                              {{--<a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>--}}
                          {{--</th>--}}
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
                      @foreach($gedung as $dat)
                          <td class=" text-center">{{ ++$no }}</td>
                          <td>{{kasihtitik($dat->aset->kd_brg)}}</td>
                          <td class=" ">{{$dat->aset->sskel->ur_sskel}}</td>
                          <td class=" ">{{$dat->luas_bdg}}</td>
                          <td class=" ">
                              @if($dat->aset->catatan != null)
                                  {{$dat->aset->catatan}}
                              @else
                                  <small style="color: red"> Catatan Belum ada </small>
                              @endif
                          </td>

                          <td class=" last">
                              @if (Sentinel::getUser()->hasAccess(['aset.show']))
                                  <center>
                              <div class="dropdown">
                                <a href="{{route('gedungBangunan.show', [$dat->id])}}" class="btn btn-primary">Lihat</a>
                                <a class="btn btn-warning" href="{{route('page.penghapusan')}}">Delete</a>
                                {{--<a href="javascript:;" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">--}}
                                {{--Kelola Aset <span class=" fa fa-angle-down"></span>--}}

                                {{--</a>--}}

                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                  <li><a class="btn dropdown-item" href="{{route('page.pemeliharaan')}}">Pemeliharaan</a></li>
                                  <li><a class="btn dropdown-item" href="{{route('page.pemanfaatan')}}">Pemanfaatan</a></li>
                                  <li><a class="btn dropdown-item" href="{{route('page.pemindah_tanganan')}}">Pemindah-tanganan</a></li>
                                  <li><a class="btn dropdown-item" href="{{route('page.pembiayaan')}}">Pembiayaan</a></li>
                                </ul>
                              </div>
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