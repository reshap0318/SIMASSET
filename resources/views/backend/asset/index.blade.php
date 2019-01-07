@extends('layouts.frontend')
@section('title')
  List Asset {{$data_master->nama_asset}}
@stop

@section('content')
<div class="x_panel">
  <div class="x_title">
    <h2>Table Asset {{$data_master->nama_asset}}</h2>
    <ul class="nav navbar-right panel_toolbox">
      @if (Sentinel::getUser()->hasAccess(['aset.create']))
        <a href="{{route('aset.create',['data='.$data_master->nama_asset])}}" class="btn btn-success">New aset {{$data_master->nama_asset}}</a>
      @endif
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <table class="table table-bordered table-striped table-hover" id="tblaset">
      <thead>
        <tr class="headings">
          <th class="text-center">No</th>
          <th>No Registrasi Aset </th>
          <th>Merek</th>
          <th>Satker</th>
          <th class="no-link last"><span class="nobr">Action</span></th>
          <th class="bulk-actions" colspan="7">
            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
          </th>
        </tr>
      </thead>
        <?php $no=0;
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
        @foreach($data as $dat)
              <td class=" text-center">{{ ++$no }}</td>
              <td class=" ">{{kasihtitik($dat->no_registrasi_aset)}}</td>
              <td class=" ">{{$dat->merek}}</td>
              <td class=" ">{{$dat->satker->nama_satker}}</td>
              <td class=" last">
                @if (Sentinel::getUser()->hasAccess(['aset.show']))
                  <a href="{{route('aset.show', $dat->id)}}" class="btn btn-success btn-xs">View</a>
                @endif

                @if (Sentinel::getUser()->hasAccess(['aset.destroy']))
                  {!! Form::open(['method'=>'DELETE', 'route' => ['aset.destroy', $dat->id], 'style' => 'display:inline']) !!}
                  {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs','id'=>'delete-confirm']) !!}
                  {!! Form::close() !!}
                @endif
              </td>
              </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
