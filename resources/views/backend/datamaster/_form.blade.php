<?php
  function kasihtitik($id)
  {
    if($id!=null){
      $coba = str_split($id);
      $s = null;
      for($i=0;$i<count($coba);$i++){
        if($i%2!=0 || $i==count($coba)){
          $s = $s.$coba[$i];
        }else{
          $s = $s.$coba[$i].'.';
        }
      }
      return $s;
    }
  }
?>

<div class="form-group">
  {!! Form::label('id', 'Kode *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
    {!! Form::text('id', null, ['class'=>'form-control has-feedback-left']) !!}
    <span class="form-control-feedback left" aria-hidden="true">{{kasihtitik($id)}}</span>
    <input type="hidden" name="id0" value="{{$id}}">
  </div>
</div>

<div class="form-group">
  {!! Form::label('nama_asset', 'Uruaian *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
  <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::text('nama_asset', null, ['class'=>'form-control col-md-7 col-xs-12']) !!}
  </div>
</div>

<input type="hidden" name="keterangan" value="{{$aset}}">
<div class="form-group">
  {!! Form::label('keterangan', 'Status *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
  <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::text('nama_asset', $aset, ['class'=>'form-control col-md-7 col-xs-12','disabled'=>'disabled']) !!}
  </div>
</div>
