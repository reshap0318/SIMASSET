@extends('layouts.frontend')

@section('title')
	New Aset {{$data_master->nama_asset}}
@stop


@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form Create {{$data_master->nama_asset}}<small>isi data * dengan benar</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
@if(strtolower($data_master->nama_asset)==strtolower('tanah'))
{{ Form::open(array('url' => route('tanah.store'), 'class' => 'form-horizontal','files' => true,'class'=>'form-horizontal form-label-left','data-parsley-validate','id'=>'demo-form2')) }}

                    @include('backend.asset._form')
                    @include('backend.asset.tanah.form')


@endif
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 text-center">
                            <a href="{!! route('aset.index', ['data='.$data_master->nama_asset]) !!}" class='btn btn-warning'>Kembali</a>
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
