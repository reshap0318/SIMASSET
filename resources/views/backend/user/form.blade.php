
<div class="form-group">
  {!! Form::label('username', 'Username *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
  <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::text('username', null, ['class' => 'form-control','class'=>'form-control col-md-7 col-xs-12']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('first_name', 'Nama Awal *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
  <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::text('first_name', null, ['class' => 'form-control','class'=>'form-control col-md-7 col-xs-12']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('last_name', 'Nama Akhir *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
  <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::text('last_name', null, ['class' => 'form-control','class'=>'form-control col-md-7 col-xs-12']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('no_anggota', 'No Anggota', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
  <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::text('no_anggota', null, ['class' => 'form-control','class'=>'form-control col-md-7 col-xs-12']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('email', 'Email *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
  <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::email('email', null, ['class'=>'form-control col-md-7 col-xs-12']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('role', 'Jabatan *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
  <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::select('role', $role, null, ['class' => 'foselect2_single form-control']) !!}
  </div>
</div>
@if($action!='edit')
<div class="form-group">
  {!! Form::label('password', 'Password *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
  <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::password('password', ['class' => 'form-control col-md-7 col-xs-12']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('password_confirm', 'Password Confirm *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
  <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::password('password_confirm', ['class' => 'form-control col-md-7 col-xs-12']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('avatar', 'Avatar', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
  <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::file('avatar', null, ['class'=>'form-control']) !!}
  </div>
</div>
@endif
