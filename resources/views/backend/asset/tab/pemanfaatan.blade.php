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
        <th>Perihal</th>
        <th>Lama Sewa</th>
        <th>Biaya</th>
        <th>Bukti Dokumen</th>
    </tr>
    </thead>
    <tbody>
    <?php $n=0; ?>
    @foreach($manfaat as $m)
    <tr>
        <td>{{++$n}}</td>
        <td>{{$m->tanggal}}</td>
        <td>{{$m->penyewa}}</td>
        <td>{{$m->perihal}}</td>
        <td>{{$m->lama_sewa}}</td>
        <td>Rp {{number_format($m->biaya,0,",",".")}}</td>
        <td>
            @if($m->dokumen_path != null)
            <button class="btn btn-info"><i class="fa fa-download"></i> Unduh </button>
                @else
                <div class="center">
                    <button class="btn btn-danger"><i class="fa fa-upload"></i> Unggah </button>
                    <br><label style="font-size: smaller; font-style: italic; color: darkred">Dokumen belum ada</label>
                </div>
            @endif
        </td>
    </tr>
        @endforeach

    </tbody>
</table>