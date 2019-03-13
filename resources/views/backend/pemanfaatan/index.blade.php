@extends('layouts.frontend')
@section('title')
  List Pemanfaatan
@stop

@section('content')
<div class="x_panel">
  <div class="x_title">
    <h2>Table Pemanfaatan</h2>
    <ul class="nav navbar-right panel_toolbox">
      @if (Sentinel::getUser()->hasAccess(['pemanfaatan.create']))
        <a href="{{route('pemanfaatan.create')}}" class="btn btn-success">New Pemanfaatan</a>
      @endif
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <table class="table table-bordered table-striped table-hover" id="tblplihara">
      <thead>
        <tr class="headings">
          <th class="text-center">No</th>
          <th>Asset</th>
          <th>Perihal</th>
          <th>Tanggal</th>
          <th>Penyewa</th>
          <th class="no-link last"><span class="nobr">Action</span></th>
          <th class="bulk-actions" colspan="7">
            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
          </th>
        </tr>
      </thead>
        <?php $no=0?>
      <tbody>
        @foreach($pemanfaatans as $pemanfaatan)
              <td class=" text-center">{{ ++$no }}</td>
              <td class=" ">{{$pemanfaatan->asset->unit_pmk}}</td>
              <td class=" ">{{$pemanfaatan->perihal}}</td>
              <td class=" ">{{$pemanfaatan->tanggal}}</td>
              <td class=" ">{{$pemanfaatan->penyewa}}</td>
              <td class=" last">
                @if (Sentinel::getUser()->hasAccess(['pemanfaatan.edit']))
                  <a href="{{route('pemanfaatan.edit', $pemanfaatan->id)}}" class="btn btn-success btn-xs">edit</a>
                @endif
                @if (Sentinel::getUser()->hasAccess(['pemanfaatan.destroy']))
                  {!! Form::open(['method'=>'DELETE', 'route' => ['pemanfaatan.destroy', $pemanfaatan->id], 'style' => 'display:inline']) !!}
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
      table = $('#tblplihara').DataTable({
          'columnDefs': [{
             'targets': 0,
             'searchable':false,
             'orderable':false,
            }],
        });
    });

  $("input#delete-confirm").on("click", function(){
      return confirm("Yakin Ingin Menghapus Pemanfaatan Ini?");
  });

</script>
@stop
