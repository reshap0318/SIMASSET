@extends('layouts.frontend')

@section('title')
  Asset
@stop

@section('content')
<div class="x_panel">
  <div class="x_title">
    <h2>Asset Unand <small>List</small></h2>
    <ul class="nav navbar-right panel_toolbox">
      @if (Sentinel::getUser()->hasAccess(['role.create']))
        <a href="{{route('asset.create')}}" class="btn btn-success">New Asset</a>
      @endif
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
<table class="table table-bordered table-striped table-hover" id="tblRole">
  <thead>
    <tr class="headings">
      <th class="text-center"> No </th>
      <th>Asset</th>
      <th>Value</th>
      <th class="no-link last"><span class="nobr">Action</span>
      </th>
      <th class="bulk-actions" colspan="7">
        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
      </th>
    </tr>
  </thead>
  <?php $no=0?>
  <tbody>
    <tr>
      <td class=" text-center">1</td>
      <td class=" ">Tanah</td>
      <td class=" ">200 Hektar</td>
      <td class=" last">
        @if (Sentinel::getUser()->hasAccess(['role.show']))
          <a href="#" class="btn btn-success btn-xs">View</a>
        @endif
        @if (Sentinel::getUser()->hasAccess(['role.edit']))
          <a href="#" class="btn btn-success btn-xs">edit</a>
        @endif
        @if (Sentinel::getUser()->hasAccess(['role.destroy']))
          {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs','id'=>'delete-confirm']) !!}
        @endif
      </td>
    </tr>
    <tr>
      <td class=" text-center">2</td>
      <td class=" ">Gedung</td>
      <td class=" ">159 Buah</td>
      <td class=" last">
        @if (Sentinel::getUser()->hasAccess(['role.show']))
          <a href="#" class="btn btn-success btn-xs">View</a>
        @endif
        @if (Sentinel::getUser()->hasAccess(['role.edit']))
          <a href="#" class="btn btn-success btn-xs">edit</a>
        @endif
        @if (Sentinel::getUser()->hasAccess(['role.destroy']))
          {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs','id'=>'delete-confirm']) !!}
        @endif
      </td>
    </tr>
  </tbody>
</table>
</div>
</div>
@endsection
