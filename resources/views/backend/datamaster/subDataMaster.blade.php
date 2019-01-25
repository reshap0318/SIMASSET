@extends('layouts.frontend')
@section('title')
  Daftar Kode Barang
@stop

@section('content')
<div class="x_panel">
  <div class="x_title">
    <h2>Daftar Kode Barang Aset -- {{$nama_gol}} </h2>
    <ul class="nav navbar-right panel_toolbox">
      @if (Sentinel::getUser()->hasAccess(['datamaster.create']))
        <a href="{{route('datamaster.create')}}" class="btn btn-success">New Data Master</a>
      @endif
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <table class="table table-bordered table-striped table-hover" id="tblmaster">
      <thead>
        <tr class="headings">
          <th>Kode</th>
          <th>Nama Sub Asset</th>
          <th class="no-link last"><span class="nobr">Action</span></th>
          <th class="bulk-actions" colspan="7">
            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
          </th>
        </tr>
      </thead>
        <?php function kasihtitik($id)
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
        @foreach($datas as $data)
              <td class=" ">{{$data->kd_bid}}</td>
              <td class=" ">{{$data->ur_bid}}</td>
              <td class=" last">

                    <a href="{{url('dataMaster/'.$data->kd_gol.'/'.$data->kd_bid)}}" class="btn btn-success btn-xs">Lihat</a>
              </td>
              </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
      table = $('#tblmaster').DataTable({
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
@stop
