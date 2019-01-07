<div class="form-group col-sm-6">
  {!! Form::label('master_id', 'Master *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
  <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::select('master_id', $noReg, null, ['class' => 'foselect2_single form-control','id'=>'master']) !!}
  </div>
</div>

<div class="form-group col-sm-6">
  {!! Form::label('no_registrasi_aset', 'Nomor Registrasi Aset *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
  <div class="col-md-6 col-md-7 col-xs-12">
    <div class="input-group">
      <span class="input-group-btn">
        <a class="btn btn-primary" id="kode_master">Go!</a>
      </span>
      {!! Form::text('no_registrasi_aset', null, ['class'=>'form-control col-md-7 col-xs-12', 'aria-label'=>'Text input with dropdown button']) !!}
    </div>
  </div>
</div>

<div class="form-group col-sm-6">
  {!! Form::label('kode_barang', 'Barang *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
  <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::select('kode_barang', $barang, null, ['class' => 'foselect2_single form-control']) !!}
  </div>
</div>

<div class="form-group col-sm-6">
  {!! Form::label('kode_satker', 'Satuan Kerja *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
  <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::select('kode_satker', $satker, null, ['class' => 'foselect2_single form-control']) !!}
  </div>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('nup', 'NUP *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
      {!! Form::text('nup', null, ['class'=>'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('no_kib', 'NO KIB *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
      {!! Form::text('no_kib', null, ['class'=>'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>
<div class="form-group col-sm-6">
  {!! Form::label('kondisi', 'Kondisi *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
  <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::select('kondisi', [1=>'Baik',2=>'Rusak',3=>'Rusak Berat'], null, ['class' => 'foselect2_single form-control']) !!}
  </div>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('merek', 'Merek *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
      {!! Form::text('merek', null, ['class'=>'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('tercatat_dalam', 'Tercatat Dalam *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
      {!! Form::text('tercatat_dalam', null, ['class'=>'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('status_absn', 'Status ABSN *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
      {!! Form::text('status_sbsn', null, ['class'=>'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('status_aset_idle', 'Status Aset IDLE *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
      {!! Form::text('status_aset_idle', null, ['class'=>'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>
