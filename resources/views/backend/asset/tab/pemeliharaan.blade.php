
<div class="x_panel">
    <div class="x_title pull-right">
    <h3>Total Biaya : Rp {{number_format( $biaya_pemeliharaan,0,",",".")}}</h3>
    </div>
</div>

<ul class="messages">
    @foreach($pelihara as $p)
    <li>
        <div class="row">
            <div class="col-md-1">
                <div class="message_date">
                    <?php $tgl = strtotime($p->tanggal)?>

                    <h3 class="date text-info">{{date('d', $tgl)}}</h3>
                    <p class="month">{{date('M', $tgl)}}</p>
                    <h4 class="date text-info">{{date('Y', $tgl)}}</h4>
                </div>
            </div>
            <div class="col-md-11">
                <div class="message_wrapper">
                    <h4 class="heading">{{$p->perihal}}</h4>
                    <blockquote class="message">{{$p->keterangan}}</blockquote>
                    <br>
                    <medium>biaya : Rp {{number_format( $p->biaya,0,",",".")}}</medium><br>
                    <br>
                    <p class="url">
                        @if($p->dokumen_path != null)
                        <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                        <a href="#" class="btn btn-info"><i class="fa fa-paperclip"></i> Unduh Dokumen Pendukung </a>
                            @else
                             <a href="#" class="btn btn-danger"><i class="fa fa-paperclip"></i> Unggah Dokumen</a>
                            <span><small style="color: red">Dokumen belum ada</small></span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </li>
    @endforeach
</ul>