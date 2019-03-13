<div class="form-group">
  {!! Form::label('aset_id', 'Nama Aset *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
  <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::select('aset_id', $asset, null, ['class' => 'form-control','class'=>'form-control col-md-7 col-xs-12']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('tanggal', 'Tanggal *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
  <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::date('tanggal', null, ['class' => 'form-control','class'=>'form-control col-md-7 col-xs-12']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('penyewa', 'Penyewa *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
  <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::text('penyewa', null, ['class' => 'form-control','class'=>'form-control col-md-7 col-xs-12']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('lama_sewa', 'Lama Sewa *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
  <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::number('lama_sewa', null, ['class' => 'form-control','class'=>'form-control col-md-7 col-xs-12']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('perihal', 'Perihal *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
  <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::text('perihal', null, ['class' => 'form-control','class'=>'form-control col-md-7 col-xs-12']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('biaya', 'Biaya *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
  <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::number('biaya', null, ['class' => 'form-control','class'=>'form-control col-md-7 col-xs-12']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('keterangan', 'Keterangan *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
  <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::textarea('keterangan', null, ['class' => 'form-control','class'=>'form-control col-md-7 col-xs-12']) !!}
  </div>
</div>
