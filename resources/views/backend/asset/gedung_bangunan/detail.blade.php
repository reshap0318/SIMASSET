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
						<li class="m-top-xs">
							<i class="fa fa-external-link user-profile-icon"></i>
							<a href="http://www.kimlabs.com/profile/" target="_blank" class="label label-warning">lihat peta</a>
						</li>
						<li>
							<i> <strong>Status :</strong></i>
							<br>{{$data->aset->status->ur_status}}
						</li>
						<li>
							<i> <strong>Pemilik :</strong></i>
							<br>{{$data->aset->unit_pmk}}
						</li>
						<li>
							<i> <strong>Alamat Pemilik :</strong></i>
							<br>{{$data->aset->alm_pmk}}
						</li>
						<li>
							<i> <strong>Tanggal Buku :</strong></i>
							<br>{{$data->aset->tgl_buku}}
						</li>
						<li>
							<i> <strong>Jenis Transaksi:</strong></i>
							<br>{{$data->aset->trn->ur_trn}}
						</li>
					</ul>
					{{--<a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>--}}
					<br>
					<div class="x_panel">
						<h4><strong>Kondisi Terkini</strong> : <label class="label label-primary"> Baik </label></h4>

					</div>

					<div class="x_panel tile fixed_height_100 overflow_hidden">
						<div class="x_title">
							<h2>Deskripsi</h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<table class="table table-responsive">
								<tr>
									<td>Luas</td>
									<td>{{$data->luas_bdg}} m2</td>
								</tr>
								<tr>
									<td>Jumlah Lantai</td>
									<td>{{$data->jumlah_lt}}</td>
								</tr>
								<tr>
									<td>Tipe</td>
									<td>{{$data->tipe}}</td>
								</tr>
								<tr>
									<td>Tahun Selesai</td>
									<td>{{$data->tahun_selesai}}</td>
								</tr>
								<tr>
									<td>Tahun Pakai</td>
									<td>{{$data->tahun_pakai}}</td>
								</tr>
							</table>
						</div>
					</div>




				</div>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<div class="row tile_count">
						<div class="col-md-4 col-sm-4 col-xs-4 tile_stats_count">
							<span class="count_top"><i class="fa fa-money"></i> Total Biaya Pemanfaatan</span>
							<div class="count" style="font-size: 26px">Rp {{number_format( $biaya_manfaat,0,",",".")}}</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-4 tile_stats_count">
							<span class="count_top"><i class="fa  fa-money"></i> Total Biaya Pemeliharaan</span>
							<div class="count green" style="font-size: 26px">Rp {{number_format( $biaya_pemeliharaan,0,",",".")}}</div>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-4 tile_stats_count">
							<span class="count_top"><i class="fa fa-money"></i> Nilai Rupiah Aset</span>
							<div class="count" style="font-size: 26px">Rp {{number_format($data->aset->rph_aset  ,0,",",".")}}</div>
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

