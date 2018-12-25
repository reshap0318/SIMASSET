@extends('layouts.frontend')
@section('title')
  List Data Master
@stop

@section('content')
<div class="x_panel">
  <div class="x_title">
    <h2>Table Data Master</h2>
    <ul class="nav navbar-right panel_toolbox">
      {{--@if (Sentinel::getUser()->hasAccess(['aset.create']))--}}
        <a href="{{route('datamaster.create')}}" class="btn btn-success">New Data Master</a>
      {{--@endif--}}
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <table class="table table-bordered table-striped table-hover" id="tblaset">
      <thead>
        <tr class="headings">
          <th class="text-center">No</th>
          <th>Nama</th>
          <th>keterangan</th>
          <th class="no-link last" colspan="2"><span class="nobr">Ubah / Hapus</span></th>
          <th class="bulk-actions" colspan="7">
            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
          </th>
        </tr>
      </thead>
        <?php $no=0?>
      <tbody>
      <tr>
        @foreach($dataMasters as $dataMaster)
              <td class=" text-center">{{ ++$no }}</td>
              <td class=" ">{{$dataMaster->nama_asset}}</td>
              <td class=" ">{{$dataMaster->keteragan}}</td>
              <td class=" last">
                  {!! Form::open(['route' => ['datamaster.destroy', $dataMaster->id], 'method' => 'delete']) !!}
                  <a href="{!! route('datamaster.show', [$dataMaster->id]) !!}" class='btn btn-warning'><i class="glyphicon glyphicon-eye-open"></i></a>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-{{$dataMaster->id}}">Edit</button>

                  {{--<a href="{{route('aset.edit', $dataMaster->id)}}" class="btn btn-success btn-xs">edit</a>--}}
                  {{--{!! Form::open(['method'=>'DELETE', 'route' => ['aset.destroy', $dataMaster->id], 'style' => 'display:inline']) !!}--}}
                  {{--{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs','id'=>'delete-confirm']) !!}--}}
                  {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                  {!! Form::close() !!}
              </td>
              @include('backend.datamaster.modal_edit')
         </tr>
        @endforeach
      </tbody>

    </table>
  </div>
  </div>
@endsection
