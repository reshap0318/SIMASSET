@extends('layouts.frontend')
@section('title')
	Detail ( {{$data->namaBarang->ur_sskel}}---{{$data->kd_brg}} )
@stop

@section('content')
	<div class="x_panel">
		<div class="x_title">
			<h2>Detail ( {{$data->namaBarang->ur_sskel}}-{{$data->kd_brg}} )</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<div class="flex">
				<div class="col-md-5 text-center">
					@if(is_null($data->foto)|$data->foto=="")
						<img src="{{ asset('/img/lea.png') }}" alt="..." width="400px" height="320px">
					@else
						<img src="{{ url('avatar/aset-pict/'.$data->foto) }}" alt="..."  width="100%" height="290px">
					@endif
					{{--            {!! Form::label('inventaris_kode',$aset->barang->nama_barang.' '.$aset->satker->nama_satker) !!}--}}
				</div>
				<div class="col-md-7">
					<div class="form-group row col-md-12">
						<div class="col-md-4">
							{!! Form::label('nama', 'Kode Barang') !!}
						</div>
						<div class="col-md-8">
							{!! Form::label('nama', ' : ') !!} {{$data->kd_brg}}
						</div>
					</div>
					<div class="form-group row col-md-12">
						<div class="col-md-4">
							{!! Form::label('nama', 'RPH Aset') !!}
						</div>
						<div class="col-md-8">
							Rp {!! Form::label('nama', ' : ') !!} {{number_format($data->rph_aset  ,0,",",".")}}
						</div>
					</div>

					<div class="form-group row col-md-12">
						<div class="col-md-4">
							{!! Form::label('nama', 'Nama') !!}
						</div>
						<div class="col-md-8">
							{!! Form::label('nama', $data->namaBarang->ur_sskel) !!}
							{{--{!! Form::label('nama', ' : ') !!} {{$aset->barang->nama_barang}} ( {{$aset->kode_barang}} )--}}
						</div>
					</div>

					<div class="form-group row col-md-12">
						<div class="col-md-4">
							{!! Form::label('nama', 'Kota/Kabupaten') !!}
						</div>
						<div class="col-md-8">
							<?php
							$kab=0;
							if($data->kab == 855){
							    $kab = 'Limau Manih';
							}elseif ($data->kab == 856){
							    $kab='Payakumbuh';
                            }else{
							    $kab ='Damasraya';
                            }?>
							{!! Form::label('nama', ' : ') !!} {{$kab}}
						</div>
					</div>
					<div class="form-group row col-md-12">
						<div class="col-md-4">
							{!! Form::label('nama', 'Kecematan') !!}
						</div>
						<div class="col-md-8">
							{!! Form::label('nama', ' : ') !!} {{$data->kb_kec}}
						</div>
					</div>
					<div class="form-group row col-md-12">
						<div class="col-md-4">
							{!! Form::label('nama', 'Kelurahan') !!}
						</div>
						<div class="col-md-8">
							{!! Form::label('nama', ' : ') !!} {{$data->kel}}
						</div>
					</div>
					<div class="form-group row col-md-12">
						<div class="col-md-4">
							{!! Form::label('nama', 'Kuantitas') !!}
						</div>
						<div class="col-md-8">
							{!! Form::label('nama', ' : ') !!} {{$data->kuantitas}}
						</div>
					</div>
					<div class="form-group row col-md-12">
						<div class="col-md-4">
							{!! Form::label('nama', 'trn') !!}
						</div>
						<div class="col-md-8">
							@if($data->kd_trn !=NULL)
							{!! Form::label('nama', ' : ') !!} {{$data->trn->ur_trn}}
								@endif
						</div>
					</div>
					<div class="form-group row col-md-12">
						<div class="col-md-4">
							{!! Form::label('nama', 'Kepemilikan') !!}
						</div>
						<div class="col-md-8">
							@if($data->id_status !=NULL)
								{!! Form::label('nama', ' : ') !!} {{$data->milik->ur_milik}}
							@endif
						</div>
					</div>

					<div class="form-group row col-md-12">
						<div class="col-md-4">
							{!! Form::label('nama', 'status') !!}
						</div>
						<div class="col-md-8">
							@if($data->id_status !=NULL)
								{!! Form::label('nama', ' : ') !!} {{$data->status->ur_status}}
							@endif
						</div>
					</div>
					<div class="form-group row col-md-12">
						<div class="col-md-4">
							{!! Form::label('nama', 'Sumber') !!}
						</div>
						<div class="col-md-8">
								{!! Form::label('nama', ' : ') !!} {{$data->sumber}}
						</div>
					</div>
					<div class="form-group row col-md-12">
						<div class="col-md-4">
							{!! Form::label('nama', 'Dari') !!}
						</div>
						<div class="col-md-8">
								{!! Form::label('nama', ' : ') !!} {{$data->dari}}
						</div>
					</div>
					<div class="form-group row col-md-12">
						<div class="col-md-4">
							{!! Form::label('nama', 'Unit PMK') !!}
						</div>
						<div class="col-md-8">
							{!! Form::label('nama', ' : ') !!} {{$data->unit_pmk}}
						</div>
					</div>
					<div class="form-group row col-md-12">
						<div class="col-md-4">
							{!! Form::label('nama', 'Catatan') !!}
						</div>
						<div class="col-md-8">
							{!! Form::label('nama', ' : ') !!} {{$data->catatan}}
						</div>
					</div>
					<div class="form-group row col-md-12">
						<div class="col-md-4">
							{!! Form::label('nama', 'Tanggal Buku') !!}
						</div>
						<div class="col-md-8">
							{!! Form::label('nama', ' : ') !!} {{$data->tgl_buku}}
						</div>
					</div>
					<div class="form-group row col-md-12">
						<div class="col-md-4">
							{!! Form::label('nama', 'Tanggal Prl') !!}
						</div>
						<div class="col-md-8">
							{!! Form::label('nama', ' : ') !!} {{$data->tgl_prl}}
						</div>
					</div>



			<div class="row">
					<div class="col-4"></div>

				</div>
			</div>
		</div>
	</div>



	<div class="col-md-4 col-sm-4 col-xs-12">
		<div class="x_panel tile fixed_height">
			<div class="x_title">
				<a href=""><h3>Luas</h3></a>
				<ul class="nav navbar-right panel_toolbox">

				</ul>
				<div class="clearfix"></div>
			</div>

			<div class="x_content">
				<div class="form-group row col-md-12">
					<div class="col-md-4">
						{!! Form::label('nama', 'luass') !!}
					</div>
					<div class="col-md-8">
						{!! Form::label('nama', ' : ') !!} {{$data->luass}} m2
					</div>
				</div>
				<div class="form-group row col-md-12">
					<div class="col-md-4">
						{!! Form::label('nama', 'luasb') !!}
					</div>
					<div class="col-md-8">
						{!! Form::label('nama', ' : ') !!} {{$data->luasb}} m2
					</div>
				</div>

				<div class="form-group row col-md-12">
					<div class="col-md-4">
						{!! Form::label('nama', 'luasl') !!}
					</div>
					<div class="col-md-8">
						{!! Form::label('nama', ' : ') !!} {{$data->luasl}} m2
					</div>
				</div>

				<div class="form-group row col-md-12">
					<div class="col-md-4">
						{!! Form::label('nama', 'luask') !!}
					</div>
					<div class="col-md-8">
						{!! Form::label('nama', ' : ') !!} {{$data->luask}} m2
					</div>
				</div>
			</div>
		</div>
	</div>

		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="x_panel tile fixed_height">
				<div class="x_title">
					<a href=""><h3>Batas</h3></a>
					<ul class="nav navbar-right panel_toolbox">

					</ul>
					<div class="clearfix"></div>
				</div>

				<div class="x_content">
					<div class="form-group row col-md-12">
						<div class="col-md-4">
							{!! Form::label('nama', 'Batas Utara') !!}
						</div>
						<div class="col-md-8">
							{!! Form::label('nama', ' : ') !!} {{$data->batas_u}}
						</div>
					</div>
					<div class="form-group row col-md-12">
						<div class="col-md-4">
							{!! Form::label('nama', 'Batas Seletan') !!}
						</div>
						<div class="col-md-8">
							{!! Form::label('nama', ' : ') !!} {{$data->batas_s}}
						</div>
					</div>

					<div class="form-group row col-md-12">
						<div class="col-md-4">
							{!! Form::label('nama', 'Batas Timur') !!}
						</div>
						<div class="col-md-8">
							{!! Form::label('nama', ' : ') !!} {{$data->batas_t}}
						</div>
					</div>

					<div class="form-group row col-md-12">
						<div class="col-md-4">
							{!! Form::label('nama', 'Batas Barat') !!}
						</div>
						<div class="col-md-8">
							{!! Form::label('nama', ' : ') !!} {{$data->batas_b}}
						</div>
					</div>
				</div>
			</div>
		</div>

	<div class="col-md-4 col-sm-4 col-xs-12">
		<div class="x_panel tile fixed_height">
			<div class="x_title">
				<a href=""><h3>Surat</h3></a>
				<ul class="nav navbar-right panel_toolbox">

				</ul>
				<div class="clearfix"></div>
			</div>

			<div class="x_content">
				<div class="form-group row col-md-12">
					<div class="col-md-4">
						{!! Form::label('nama', 'Surat 1') !!}
					</div>
					<div class="col-md-8">
						{!! Form::label('nama', ' : ') !!} {{$data->surat1}}
					</div>
				</div>
				<div class="form-group row col-md-12">
					<div class="col-md-4">
						{!! Form::label('nama', 'Surat2') !!}
					</div>
					<div class="col-md-8">
						{!! Form::label('nama', ' : ') !!} {{$data->surat2}}
					</div>
				</div>

				<div class="form-group row col-md-12">
					<div class="col-md-4">
						{!! Form::label('nama', 'Surat3') !!}
					</div>
					<div class="col-md-8">
						{!! Form::label('nama', ' : ') !!} {{$data->surat3}}
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
{{--	<a href="{{route('tanah.index',['data'=>$data_master, 'lok' => $lok])}}" class="btn btn-primary pull-right">Kembali</a>--}}

@endsection
