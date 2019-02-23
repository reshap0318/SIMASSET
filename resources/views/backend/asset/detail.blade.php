@extends('layouts.frontend')
@section('title')
	Detail ( {{$nama->ur_sskel}}---{{$aset->kd_brg}} )
@stop

@section('content')
<div class="x_panel">
  <div class="x_title">
    <h2>Detail ( {{$nama->ur_sskel}}-{{$aset->kd_brg}} )</h2>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
  		<div class="flex">
         <div class="col-md-5 text-center">
			@if(is_null($aset->foto)|$aset->foto=="")
				<img src="{{ asset('/img/lea.png') }}" alt="..." width="400px" height="320px">
			@else
				<img src="{{ url('avatar/aset-pict/'.$aset->foto) }}" alt="..."  width="100%" height="290px">
			@endif
{{--            {!! Form::label('inventaris_kode',$aset->barang->nama_barang.' '.$aset->satker->nama_satker) !!}--}}
         </div>
         <div class="col-md-7">
      			<div class="form-group row col-md-12">
      				<div class="col-md-4">
      					{!! Form::label('nama', 'Kode Barang') !!}
      				</div>
      				<div class="col-md-8">
      					{!! Form::label('nama', ' : ') !!} {{$aset->kd_brg}}
      				</div>
      			</div>

      			<div class="form-group row col-md-12">
      				<div class="col-md-4">
      					{!! Form::label('nama', 'Nama') !!}
      				</div>
      				<div class="col-md-8">
						{!! Form::label('nama', $nama->ur_sskel) !!}
      					{{--{!! Form::label('nama', ' : ') !!} {{$aset->barang->nama_barang}} ( {{$aset->kode_barang}} )--}}
      				</div>
      			</div>

      			{{--<div class="form-group row col-md-12">--}}
      				{{--<div class="col-md-4">--}}
      					{{--{!! Form::label('nama', 'Satuan Kerja(kode)') !!}--}}
      				{{--</div>--}}
      				{{--<div class="col-md-8">--}}
{{--      					{!! Form::label('nama', ' : ') !!} {{$aset->satker->nama_satker}} ( {{$aset->kode_satker}} )--}}
      				{{--</div>--}}
      			{{--</div>--}}

      			{{--<div class="form-group row col-md-12">--}}
      				{{--<div class="col-md-4">--}}
      					{{--{!! Form::label('nama', 'NUP - No KIB') !!}--}}
      				{{--</div>--}}
      				{{--<div class="col-md-8">--}}
      					{{--{!! Form::label('nama', ' : ') !!} {{$aset->nup}} - {{$aset->no_kib}}--}}
      				{{--</div>--}}
      			{{--</div>--}}

      			<div class="form-group row col-md-12">
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

      			{{--<div class="form-group row col-md-12">--}}
      				{{--<div class="col-md-4">--}}
      					{{--{!! Form::label('nama', 'Merek') !!}--}}
      				{{--</div>--}}
      				{{--<div class="col-md-8">--}}
      					{{--{!! Form::label('nama', ' : ') !!} {{$aset->merek}}--}}
      				{{--</div>--}}
      			{{--</div>--}}

      			{{--<div class="form-group row col-md-12">--}}
      				{{--<div class="col-md-4">--}}
      					{{--{!! Form::label('nama', 'Tercatat Dalam') !!}--}}
      				{{--</div>--}}
      				{{--<div class="col-md-8">--}}
      					{{--{!! Form::label('nama', ' : ') !!} {{$aset->tercatat_dalam}}--}}
      				{{--</div>--}}
      			{{--</div>--}}

      			{{--<div class="form-group row col-md-12">--}}
      				{{--<div class="col-md-4">--}}
      					{{--{!! Form::label('nama', 'Status Absns') !!}--}}
      				{{--</div>--}}
      				{{--<div class="col-md-8">--}}
      					{{--{!! Form::label('nama', ' : ') !!} {{$aset->status_absn}}--}}
      				{{--</div>--}}
      			{{--</div>--}}

      			{{--<div class="form-group row col-md-12">--}}
      				{{--<div class="col-md-4">--}}
      					{{--{!! Form::label('nama', 'Status Aset Idle') !!}--}}
      				{{--</div>--}}
      				{{--<div class="col-md-8">--}}
      					{{--{!! Form::label('nama', ' : ') !!} {{$aset->status_aset_idle}}--}}
      				{{--</div>--}}
      			{{--</div>--}}

			 <div class="form-group row col-md-12">
			 <div class="col-md-4">
			 {!! Form::label('nama', 'Kuantitas') !!}
			 </div>
			 <div class="col-md-8">
			 {!! Form::label('nama', ' : ') !!} {{$aset->kuantitas}}
			 </div>
			 </div>




			 <div class="form-group row col-md-12">
			 <div class="col-md-4">
			 {!! Form::label('nama', 'Status Absns') !!}
			 </div>
			 <div class="col-md-8">
			 {!! Form::label('nama', ' : ') !!} {{$aset->status_absn}}
			 </div>
			 </div>

			 <div class="form-group row col-md-12">
			 <div class="col-md-4">
			 {!! Form::label('nama', 'Status Aset Idle') !!}
			 </div>
			 <div class="col-md-8">
			 {!! Form::label('nama', ' : ') !!} {{$aset->status_aset_idle}}
			 </div>
			 </div>

         </div>
			<div class="row">
				<div class="col-4"></div>
				<div class="form-group row col-md-12">
					<div class="col-md-4">
						{!! Form::label('nama', 'luass') !!}
					</div>
					<div class="col-md-8">
						{!! Form::label('nama', ' : ') !!} {{$aset->luass}} m2
					</div>
				</div>
				<div class="form-group row col-md-12">
					<div class="col-md-4">
						{!! Form::label('nama', 'luasb') !!}
					</div>
					<div class="col-md-8">
						{!! Form::label('nama', ' : ') !!} {{$aset->luasb}} m2
					</div>
				</div>

				<div class="form-group row col-md-12">
					<div class="col-md-4">
						{!! Form::label('nama', 'luasl') !!}
					</div>
					<div class="col-md-8">
						{!! Form::label('nama', ' : ') !!} {{$aset->luasl}} m2
					</div>
				</div>

				<div class="form-group row col-md-12">
					<div class="col-md-4">
						{!! Form::label('nama', 'luask') !!}
					</div>
					<div class="col-md-8">
						{!! Form::label('nama', ' : ') !!} {{$aset->luask}} m2
					</div>
				</div>
			</div>
    </div>
  </div>

	<div class="col-md-4 col-sm-4 col-xs-12">
		<div class="x_panel tile fixed_height">
			<div class="x_title">
				<a href=""><h3>Kampus III - Dhamasraya</h3></a>
				<ul class="nav navbar-right panel_toolbox">

				</ul>
				<div class="clearfix"></div>
			</div>

			<div class="x_content">
				<div class="row">
					<div class="col-md-6">
						<strong>Total  : </strong>
						<br>
						<strong>Luas  : </strong>
					</div>
					<div class="col-md-6">
						{{--<a href="{{route('tanah.index',['data'=>$data_master, 'lok' => '3'])}}" class="btn btn-primary pull-right">Lihat</a>--}}
					</div>
				</div>
			</div>
		</div>

	</div>
</div>



{{--@if(strtolower($aset->master->kepala->kepala->kepala->kepala->nama_asset)==strtolower('tanah'))--}}
{{--	@include('backend.asset.tanah.detail')--}}
{{--@elseif(strtolower($aset->master->kepala->kepala->kepala->kepala->id)==strtolower('bangunan'))--}}
{{--  @include('backend.asset.bangunan.detail')--}}
{{--@endif--}}
<div class="text-center">
{{--  <a href="{!! route('aset.index',['data='.$aset->master->kepala->kepala->kepala->kepala->nama_asset]) !!}" class='btn btn-warning'>Kembali</a>--}}
</div>
@endsection
