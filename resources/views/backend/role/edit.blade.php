@extends('layouts.frontend')

@section('style')
	
@stop


@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Edit Role {{$role->name}}<small>isi data * dengan benar</small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
{{ Form::model($role, array('method' => 'PATCH', 'url' => route('role.update', $role->id), 'class' => 'form-horizontal form-label-left', 'files' => true,'data-parsley-validate','id'=>'demo-form2')) }}
          
          @include('backend.role.form')

          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 text-center">
              <button class="btn btn-primary" type="button">Cancel</button>
			  <button class="btn btn-primary" type="reset">Reset</button>
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
{{ Form::close() }}
      </div>
    </div>
  </div>
</div>
@stop
