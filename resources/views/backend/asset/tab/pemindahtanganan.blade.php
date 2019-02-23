<table class="data table table-striped no-margin">
    <thead>
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Kepada</th>
        <th>Perihal</th>
        <th>Dokumen</th>
        {{--<th>Contribution</th>--}}
    </tr>
    </thead>
    <tbody>
        <?php $n=0; ?>
        @foreach($pindah as $p)
     <tr>
        <td>{{++$n}}</td>
        <td>{{$p->tanggal}}</td>
        <td>{{$p->kepada}}</td>
        <td>{{$p->keterangan}}</td>
        <td>
            @if($p->dokumen_path != null)
                <a href="#" class="btn btn-info"><i class="fa fa-paperclip"></i> Unduh Dokumen Pendukung </a>
                @else
                <a href="#" class="btn btn-danger"><i class="fa fa-paperclip"></i> Unggah Dokumen</a>
                <span><small style="color: red">Dokumen belum ada</small></span>
            @endif
        </td>
    </tr>

    @endforeach
    </tbody>
</table>