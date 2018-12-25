@extends('layouts.frontend')
@section('title')
  List Asset {{$data_master->nama_asset}}
@stop

@section('content')php
<div class="x_panel">
  <div class="x_title">
    <h2>Table Asset {{$data_master->nama_asset}}</h2>
    <ul class="nav navbar-right panel_toolbox">
      @if (Sentinel::getUser()->hasAccess(['aset.create']))
        <a href="{{route('aset.create',['data='.$data_master->id])}}" class="btn btn-success">New aset {{$data_master->nama_asset}}</a>
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
        <?php $no=0?>
      <tbody>
        @foreach($asets as $aset)
              <td class=" text-center">{{ ++$no }}</td>
              <td class=" ">{{$aset->no_registrasi_aset}}</td>
              <td class=" ">{{$aset->merek}}</td>
              <td class=" ">{{$aset->satker->nama_satker}}</td>
              <td class=" last">
                @if (Sentinel::getUser()->hasAccess(['aset.show']))
                  <a href="{{route('aset.show', $aset->id)}}" class="btn btn-success btn-xs">View</a>
                @endif
                @if (Sentinel::getUser()->hasAccess(['aset.edit']))
                  <a href="{{route('aset.edit', $aset->id)}}" class="btn btn-success btn-xs">edit</a>
                @endif
                @if (Sentinel::getUser()->hasAccess(['aset.destroy']))
                  {!! Form::open(['method'=>'DELETE', 'route' => ['aset.destroy', $aset->id], 'style' => 'display:inline']) !!}
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
