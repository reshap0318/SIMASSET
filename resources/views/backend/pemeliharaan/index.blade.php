@extends('layouts.frontend')
@section('title')
  List Pemeliharaan
@stop

@section('content')
<div class="x_panel">
  <div class="x_title">
    <h2>Table Pemeliharaan</h2>
    <ul class="nav navbar-right panel_toolbox">
      @if (Sentinel::getUser()->hasAccess(['pemeliharaan.create']))
        <a href="{{route('pemeliharaan.create')}}" class="btn btn-success">New Pemeliharaan</a>
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
          <th class="no-link last"><span class="nobr">Action</span></th>
          <th class="bulk-actions" colspan="7">
            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
          </th>
        </tr>
      </thead>
        <?php $no=0?>
      <tbody>
        @foreach($pemeliharaans as $pemeliharaan)
              <td class=" text-center">{{ ++$no }}</td>
              <td class=" ">{{$pemeliharaan->asset->unit_pmk}}</td>
              <td class=" ">{{$pemeliharaan->perihal}}</td>
              <td class=" ">{{$pemeliharaan->tanggal}}</td>
              <td class=" last">
                @if (Sentinel::getUser()->hasAccess(['pemeliharaan.edit']))
                  <a href="{{route('pemeliharaan.edit', $pemeliharaan->id)}}" class="btn btn-success btn-xs">edit</a>
                @endif
                @if (Sentinel::getUser()->hasAccess(['pemeliharaan.destroy']))
                  {!! Form::open(['method'=>'DELETE', 'route' => ['pemeliharaan.destroy', $pemeliharaan->id], 'style' => 'display:inline']) !!}
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
      return confirm("Yakin Ingin Menghapus Pemeliharaan Ini?");
  });

</script>
@stop
