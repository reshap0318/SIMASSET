<div class="x_panel">
    <div class="x_title pull-right">
        <h3>Total Biaya :  Rp {{number_format( $biaya_manfaat,0,",",".")}}</h3>
    </div>
</div>

<table class="data table table-striped no-margin">
    <thead>
    <tr>
        <th>no</th>
        <th>Tanggal</th>
        <th>Penyewa</th>
        <th>Status</th>
        <th>Perihal</th>
        <th>Lama Sewa</th>
        <th>Biaya</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php $n=0; ?>
    @foreach($manfaat as $m)
    <tr>
        <td>{{++$n}}</td>
        <td>{{$m->tanggal}}</td>
        <td>{{$m->penyewa}}</td>
        <td>{{$m->status}}</td>
        <td>{{$m->perihal}}</td>
        <td>{{$m->lama_sewa}}</td>
        <td>Rp {{number_format($m->biaya,0,",",".")}}</td>
        <td>
            @if (Sentinel::getUser()->hasAccess(['pemeliharaan.destroy']))
              <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
              <a onclick="hapus({{$m->id}})" href="javascript:void(0);" class="btn btn-danger"> <i class="fa fa-trash"></i> Delete</a>
            @endif
            @if (Sentinel::getUser()->hasAccess(['pemeliharaan.edit']))
              <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
              <a href="{{route('pemeliharaan.edit', $m->id)}}" class="btn btn-success"> <i class="fa fa-pencil"></i> Edit</a>
            @endif
            @if($m->dokumen_path != null)
              <button class="btn btn-info"><i class="fa fa-download"></i> Unduh </button>
            @else
              <button class="btn btn-danger"><i class="fa fa-upload"></i> Unggah </button>
              <br><label style="font-size: smaller; font-style: italic; color: darkred">Dokumen belum ada</label>
            @endif
        </td>
    </tr>
        @endforeach

    </tbody>
</table>

{!! Form::open(['method'=>'DELETE', 'url' => '#', 'style' => 'display:none','id'=>'fhapus']) !!}
{!! Form::submit('Delete', ['class' => 'btn btn-danger','id'=>'delete-confirm']) !!}
{!! Form::close() !!}

<script type="text/javascript">
  function hapus(id) {
    var link = "<?php echo Request::root(); ?>";
    document.getElementById('fhapus').action = link+'/pemanfaatan/'+id;
    if(confirm("Yakin Ingin Menghapus Pemanfaatan Ini?")==true){
      document.getElementById('fhapus').submit();
    }
  }
</script>
