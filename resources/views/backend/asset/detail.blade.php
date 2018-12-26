@extends('layouts.frontend')
@section('title')
  Detail {{$aset->no_registrasi_aset}} ({{$aset->barang->nama_barang}}-{{$aset->satker->nama_satker}})
@stop

@section('content')
<div class="x_panel">
  <div class="x_title">
    <h2>Detail ( {{$aset->barang->nama_barang}}-{{$aset->satker->nama_satker}} ) - {{$aset->no_registrasi_aset}} </h2>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
  		<div class="flex">
         <div class="col-md-4 text-center">
			@if(is_null(Sentinel::getUser()->avatar)||Sentinel::getUser()->avatar=="")
				<img src="{{ asset('/img/lea.png') }}" alt="..." width="100%" height="100%">
			@else
				<img src="{{ url('avatar/profile-pict/'.Sentinel::getUser()->avatar) }}" alt="..." >
			@endif
            {!! Form::label('inventaris_kode',$aset->barang->nama_barang.' '.$aset->satker->nama_satker) !!}
         </div>
         <div class="col-md-8">
			<br><br><br><br><br><br>
			<div class="form-group col-md-12">
				<div class="col-md-4">
					{!! Form::label('nama', 'Nomor Registrasi Aset') !!}
				</div>
				<div class="col-md-8">
					{!! Form::label('nama', ' : ') !!} {{$aset->no_registrasi_aset}}
				</div>
			</div>

			<div class="form-group col-md-12">
				<div class="col-md-4">
					{!! Form::label('nama', 'Barang(kode)') !!}
				</div>
				<div class="col-md-8">
					{!! Form::label('nama', ' : ') !!} {{$aset->barang->nama_barang}} ( {{$aset->kode_barang}} )
				</div>
			</div>

			<div class="form-group col-md-12">
				<div class="col-md-4">
					{!! Form::label('nama', 'Satuan Kerja(kode)') !!}
				</div>
				<div class="col-md-8">
					{!! Form::label('nama', ' : ') !!} {{$aset->satker->nama_satker}} ( {{$aset->kode_satker}} )
				</div>
			</div>

			<div class="form-group col-md-12">
				<div class="col-md-4">
					{!! Form::label('nama', 'NUP - No KIB') !!}
				</div>
				<div class="col-md-8">
					{!! Form::label('nama', ' : ') !!} {{$aset->nup}} - {{$aset->no_kib}}
				</div>
			</div>

			<div class="form-group col-md-12">
				<div class="col-md-4">
					{!! Form::label('nama', 'Kondisi') !!}
				</div>
				<div class="col-md-8">
					{!! Form::label('nama', ' : ') !!} @if($aset->kondisi==1)
					Baik
					@elseif($aset->kondisi==2)
					Kurang Baik
					@elseif($aset->kondisi==3)
					Rusak
					@endif
				</div>
			</div>

			<div class="form-group col-md-12">
				<div class="col-md-4">
					{!! Form::label('nama', 'Merek') !!}
				</div>
				<div class="col-md-8">
					{!! Form::label('nama', ' : ') !!} {{$aset->merek}}
				</div>
			</div>

			<div class="form-group col-md-12">
				<div class="col-md-4">
					{!! Form::label('nama', 'Tercatat Dalam') !!}
				</div>
				<div class="col-md-8">
					{!! Form::label('nama', ' : ') !!} {{$aset->tercatat_dalam}}
				</div>
			</div>

			<div class="form-group col-md-12">
				<div class="col-md-4">
					{!! Form::label('nama', 'Status Absns') !!}
				</div>
				<div class="col-md-8">
					{!! Form::label('nama', ' : ') !!} {{$aset->status_absn}}
				</div>
			</div>

			<div class="form-group col-md-12">
				<div class="col-md-4">
					{!! Form::label('nama', 'Status Aset Idle') !!}
				</div>
				<div class="col-md-8">
					{!! Form::label('nama', ' : ') !!} {{$aset->status_aset_idle}}
				</div>
			</div>

         </div>
    </div>
  </div>
</div>

@if($aset->master_id==1)
	@include('backend.asset.tanah')
@elseif($aset->master_id==2)
  @include('backend.asset.bangunan')
@endif

@endsection
