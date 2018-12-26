@extends('layouts.frontend')
@section('title')
  List Satuan Kerja
@stop

@section('content')
<div class="x_panel">
  <div class="x_title">
    <h2>Table Satuan Kerja</h2>
    <ul class="nav navbar-right panel_toolbox">
      @if (Sentinel::getUser()->hasAccess(['satker.create']))
        <a href="{{route('satker.create')}}" class="btn btn-success">New Satuan Kerja</a>
      @endif
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <table class="table table-bordered table-striped table-hover" id="tblbrg">
      <thead>
        <tr class="headings">
          <th class="text-center">No</th>
          <th>Kode Satuan Kerja</th>
          <th>Nama Satuan Kerja</th>
          <th class="no-link last"><span class="nobr">Action</span></th>
          <th class="bulk-actions" colspan="7">
            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
          </th>
        </tr>
      </thead>
        <?php $no=0?>
      <tbody>
        @foreach($satkers as $satker)
              <td class=" text-center">{{ ++$no }}</td>
              <td class=" ">{{$satker->kode_satker}}</td>
              <td class=" ">{{$satker->nama_satker}}</td>
              <td class=" last">
                @if (Sentinel::getUser()->hasAccess(['satker.edit']))
                  <a href="{{route('satker.edit', $satker->id)}}" class="btn btn-success btn-xs">edit</a>
                @endif
                @if (Sentinel::getUser()->hasAccess(['satker.destroy']))
                  {!! Form::open(['method'=>'DELETE', 'route' => ['satker.destroy', $satker->id], 'style' => 'display:inline']) !!}
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


@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
      table = $('#tblbrg').DataTable({
          'columnDefs': [{
             'targets': 0,
             'searchable':false,
             'orderable':false,
            }],
        });
    });

  $("input#delete-confirm").on("click", function(){
      return confirm("Yakin Ingin Menghapus Satuan Kerja Ini?");
  });

</script>
@stop
