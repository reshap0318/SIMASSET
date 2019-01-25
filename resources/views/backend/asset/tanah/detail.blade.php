@extends('layouts.frontend')
@section('title')
	Detail ( {{$data->aset->sskel->ur_sskel}}---{{$data->aset->kd_brg}} )
@stop

@section('content')
	<div class="x_panel">
		<div class="x_title">
		<h2>Detail ( {{$data->aset->sskel->ur_sskel}}---{{$data->aset->kd_brg}} )</h2>
		<div class="clearfix"></div>
		</div>

		<div class="x_panel">

			<div class="x_content">
				<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
					<div class="profile_img">
						<div id="crop-avatar">
							@if(is_null($data->foto)|$data->foto=="")
							<img src="{{ asset('/img/lea.png') }}" alt="Avatar"  class="img-responsive avatar-view">
							@else
							<img src="{{ url('avatar/aset-pict/'.$data->foto) }}" alt="Avatar"  class="img-responsive avatar-view">
							@endif
						</div>
					</div>
					<h4 class="center">{{$data->aset->sskel->ur_sskel}}</h4>
					<label class="label label-primary">{{$data->aset->catatan}} </label><br><br/>
					<ul class="list-unstyled user_data">
						<li><i class="fa fa-map-marker user-profile-icon"></i> {{$kab}}
						</li>
						<li>
							<i class="fa fa-briefcase user-profile-icon"></i> Rp {{number_format($data->aset->rph_aset  ,0,",",".")}}
						</li>
						<li class="m-top-xs">
							<i class="fa fa-external-link user-profile-icon"></i>
							<a href="http://www.kimlabs.com/profile/" target="_blank" class="label label-warning">lihat peta</a>
						</li>
					</ul>
					{{--<a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>--}}
					<br>
					<div class="x_panel">
						<h4><strong>Kondisi Terkini</strong> : Baik</h4>
						<a class="btn btn-primary btn-xs">Lihat riwayat kondisi</a>
					</div>
					<div class="x_panel">
						<label><strong>Sertifikat</strong></label>
						@if($data->surat1 != null)
							<a href="#" class="label label-info pull-right">Unduh</a>
							@else
							<a href="#" class="label label-danger pull-right">Unggah</a>
						@endif

							<table class="table table-responsive">
								<tr>
									<td>Sertifikat</td>
									<td>{{$data->surat1}}</td>
								</tr>
								<tr>
									<td>Tanggal Sertifikat</td>
									<td>{{$data->surat2}}</td>
								</tr>
								<tr>
									<td>Dikeluarkan</td>
									<td>{{$data->surat3}}</td>
								</tr>
							</table>
					</div>

					<div class="x_panel">
							<h4><strong>Luas</strong></h4>

							<table class="table table-responsive">
								<tr>
									<td>Total Luas</td>
									<td>{{$data->luass}} m2</td>
								</tr>
								<tr>
									<td>Luas Bangunan</td>
									<td>{{$data->luasb}} m2</td>
								</tr>
								<tr>
									<td>Luas Lantai</td>
									<td>{{$data->luasl}} m2</td>
								</tr>
							</table>
						</div>


					<div class="x_panel">
							<h4><strong>Batas</strong></h4>

							<table class="table table-responsive">
								<tr>
									<td>Barat</td>
									<td>{{$data->batas_b}} </td>
								</tr>
								<tr>
									<td>Timur</td>
									<td>{{$data->batas_t}}</td>
								</tr>
								<tr>
									<td>Utara</td>
									<td>{{$data->batas_u}}</td>
								</tr>
								<tr>
									<td>Selatan</td>
									<td>{{$data->batas_s}}</td>
								</tr>
							</table>
						</div>


				</div>
				<div class="col-md-9 col-sm-9 col-xs-12">
				<div class="row tile_count">
					<div class="col-md-6 col-sm-6 col-xs-6 tile_stats_count">
						<span class="count_top"><i class="fa fa-money"></i> Total Biaya Pemanfaatan</span>
						<div class="count">Rp {{number_format( $biaya_manfaat,0,",",".")}}</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6 tile_stats_count">
						<span class="count_top"><i class="fa  fa-money"></i> Total Biaya Pemeliharaan</span>
						<div class="count green">Rp {{number_format( $biaya_pemeliharaan,0,",",".")}}</div>
					</div>
				</div>
				</div>

				<div class="col-md-9 col-sm-9 col-xs-12">

					<div class="" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
							<li role="presentation" class="active"><a href="#pemeliharaan" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Pemeliharaan</a>
							</li>
							<li role="presentation" class=""><a href="#pemanfaatan" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Pemanfaatan</a>
							</li>
							<li role="presentation" class=""><a href="#pemindahtanganan" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Pemindahtanganan</a>
							</li>
							{{--<li role="presentation" class=""><a href="#pembayaran" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Pembayaran</a>--}}
							{{--</li>--}}
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade active in" id="pemeliharaan" aria-labelledby="home-tab">

								@include ('backend.asset.tab.pemeliharaan')
							</div>
							<div role="tabpanel" class="tab-pane fade" id="pemanfaatan" aria-labelledby="profile-tab">

								@include ('backend.asset.tab.pemanfaatan')

							</div>
							<div role="tabpanel" class="tab-pane fade" id="pemindahtanganan" aria-labelledby="profile-tab">
								@include ('backend.asset.tab.pemindahtanganan')
							</div>
							{{--<div role="tabpanel" class="tab-pane fade" id="pembayaran" aria-labelledby="profile-tab">--}}
								{{--@include ('backend.asset.tab.pembayaran')--}}
							{{--</div>--}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
