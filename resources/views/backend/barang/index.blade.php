@extends('layouts.frontend')
@section('title')
  List Barang
@stop

@section('content')
<div class="x_panel">
  <div class="x_title">
    <h2>Table Barang</h2>
    <ul class="nav navbar-right panel_toolbox">
      @if (Sentinel::getUser()->hasAccess(['barang.create']))
        <a href="{{route('barang.create')}}" class="btn btn-success">New Barang</a>
      @endif
    </ul>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
    <table class="table table-bordered table-striped table-hover" id="tblbrg">
      <thead>
        <tr class="headings">
          <th class="text-center">No</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th class="no-link last"><span class="nobr">Action</span></th>
          <th class="bulk-actions" colspan="7">
            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
          </th>
        </tr>
      </thead>
        <?php $no=0?>
      <tbody>
        @foreach($barangs as $barang)
              <td class=" text-center">{{ ++$no }}</td>
              <td class=" ">{{$barang->kode_barang}}</td>
              <td class=" ">{{$barang->nama_barang}}</td>
              <td class=" last">
                @if (Sentinel::getUser()->hasAccess(['barang.edit']))
                  <a href="{{route('barang.edit', $barang->id)}}" class="btn btn-success btn-xs">edit</a>
                @endif
                @if (Sentinel::getUser()->hasAccess(['barang.destroy']))
                  {!! Form::open(['method'=>'DELETE', 'route' => ['barang.destroy', $barang->id], 'style' => 'display:inline']) !!}
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
      return confirm("Yakin Ingin Menghapus Barang Ini?");
  });

</script>
@stop
