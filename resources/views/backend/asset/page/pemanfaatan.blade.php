@extends('layouts.frontend')
@section('title')
  Pemanfaatan Asset
@stop

@section('content')
  <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel tile fixed_height">
              <div class="x_title">
                  <a href=""><h3>Pemanfaatan Tanah</h3></a>
                  <div class="clearfix"></div>
              </div>

              <div class="x_content">

                <div class="form-group col-sm-6">
                    {!! Form::label('penyewa', 'Penyewa *', ['class' => 'control-label col-md-3 col-sm-6 col-xs-12']) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('penyewa', null, ['class' => 'form-control','class'=>'form-control col-md-7 col-xs-12']) !!}
                    </div>
                </div>


                <div class="form-group col-sm-6">
                    {!! Form::label('biaya_sewa', 'Biaya Sewa *', ['class' => 'control-label col-md-3 col-sm-6 col-xs-12']) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('biaya_sewa', null, ['class' => 'form-control','class'=>'form-control col-md-7 col-xs-12']) !!}
                    </div>
                </div>

                <div class="form-group col-sm-6">
                    {!! Form::label('tanggal_dokumen', 'Tanggal Sewa*', ['class' => 'control-label col-md-3 col-sm-6 col-xs-12']) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::date('tanggal_dokumen', null, ['class' => 'form-control','class'=>'form-control col-md-7 col-xs-12']) !!}
                    </div>
                </div>

                <div class="form-group col-sm-6">
                    {!! Form::label('tanggal_dokumen', 'Samapai *', ['class' => 'control-label col-md-3 col-sm-6 col-xs-12']) !!}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::date('tanggal_dokumen', null, ['class' => 'form-control','class'=>'form-control col-md-7 col-xs-12']) !!}
                    </div>
                </div>

                <div class="form-group col-sm-6">
                  {!! Form::label('file', 'Dokumen', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::file('foto', null, ['class'=>'form-control']) !!}
                  </div>
                </div>

              </div>
          </div>
      </div>

  </div>
@endsection
