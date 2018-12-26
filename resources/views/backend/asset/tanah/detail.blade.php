<div class="x_panel">

  <div class="x_content">
  		<div class="flex">
         <div class="col-md-6 text-center">
			<div id="map" style="height:300px;width: 100%"></div>
         </div>
         <div class="col-md-6">
			<div class="form-group col-md-12">
				<div class="col-md-4">
					{!! Form::label('nama', 'Status Dokumen') !!}
				</div>
				<div class="col-md-8">
					{!! Form::label('nama', ' : ') !!} {{$tanah->status_dokument}}
				</div>
			</div>

			<div class="form-group col-md-12">
				<div class="col-md-4">
					{!! Form::label('nama', 'Jenis Dokumen') !!}
				</div>
				<div class="col-md-8">
					{!! Form::label('nama', ' : ') !!} {{$tanah->jenis_dokumen}}
				</div>
			</div>

			<div class="form-group col-md-12">
				<div class="col-md-4">
					{!! Form::label('nama', 'Jenis Sertifikat') !!}
				</div>
				<div class="col-md-8">
					{!! Form::label('nama', ' : ') !!} {{$tanah->jenis_sertifikat}}
				</div>
			</div>

			<div class="form-group col-md-12">
				<div class="col-md-4">
					{!! Form::label('nama', 'No Dokumen') !!}
				</div>
				<div class="col-md-8">
					{!! Form::label('nama', ' : ') !!} {{$tanah->no_dokument}}
				</div>
			</div>

			<div class="form-group col-md-12">
				<div class="col-md-4">
					{!! Form::label('nama', 'Tanggal Dokument') !!}
				</div>
				<div class="col-md-8">
					{!! Form::label('nama', ' : ') !!} {{$tanah->tanggal_dokumen}}
				</div>
			</div>

			<div class="form-group col-md-12">
				<div class="col-md-4">
					{!! Form::label('nama', 'Foto Dokumen') !!}
				</div>
				<div class="col-md-8">
					{!! Form::label('nama', ' : ') !!} {{$tanah->jenis_dokumen}}
				</div>
			</div>

			<div class="form-group col-md-12">
				<div class="col-md-4">
					{!! Form::label('nama', 'Luas') !!}
				</div>
				<div class="col-md-8">
					{!! Form::label('nama', ' : ') !!} {{$tanah->luas}}
				</div>
			</div>

			<div class="form-group col-md-12">
				<div class="col-md-4">
					{!! Form::label('nama', 'Luas Tanah Bangunan') !!}
				</div>
				<div class="col-md-8">
					{!! Form::label('nama', ' : ') !!} {{$tanah->luas_tanah_bangunan}}
				</div>
			</div>

         </div>
    </div>
  </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNnzxae2AewMUN0Tt_fC3gN38goeLVdVE"></script>
<script type="text/javascript">

var pos ='null';
var circles=[];
var info_windows = [];
var server = "http://localhost/tb_bdl/controller/aldocontroller/fung1controller.php?aksi=";
var markers = [];
var directionsDisplay;
var rute = [];  //NAVIGASI
var angkot = [];
var centerBaru;
var jalurAngkot=[];
var centerLokasi; //untuk fungsi CallRoute()


	window.onload = function() {
	  basemap();
	  tanah();
    satutanah();
	};

	function tanah() //tampil digitasi tanah
	{
	    tanah = new google.maps.Data();
	    tanah.loadGeoJson( "{{url('layertanah/'.$tanah->id)}}" );
	    tanah.setStyle(function(feature){

	    	color = '#ff3300'
	        return({
	            fillColor:color,
		        strokeWeight:2.0,
		        strokeColor:'black',
		        fillOpacity:0.3,
		        clickable: false
	        });
	    });
	    tanah.setMap(map);
	}

	function basemap(){
	    map = new google.maps.Map(document.getElementById('map'), {
	    zoom: 12,
	    center: new google.maps.LatLng(-0.939074, 100.368364),
	    mapTypeId: google.maps.MapTypeId.ROADMAP,
	  });
	}

  function hapusInfo() {
    for (var i = 0; i < info_windows.length; i++) {
      info_windows[i].setMap(null);
    }
  }

  function hapusmarker() {
    for (var i = 0; i < markers.length; i++) {
      markers[i].setMap(null);
    }
  }

  function tampilsemuatanah(rows, zoom){ //fungsi cari mesjid berdasarkan nama
    if(rows==null){
      alert('Data Tanah Kosong');
    }
    for (var i in rows)
    {
      var row = rows[i];
      var id = row.id;
      var no_registrasi_aset = row.no_registrasi_aset;
      var latitude = row.latitude ;
      var longitude = row.longitude ;
      centerBaru = new google.maps.LatLng(latitude, longitude);
      marker = new google.maps.Marker({
        position: centerBaru,
        icon:'http://localhost/tb_bdl/img/icon/placeholder.png',
        map: map,
        animation: google.maps.Animation.DROP,
      });
      // console.log(id);
      // console.log(latitude);
      // console.log(longitude);
      markers.push(marker);
      map.setCenter(centerBaru);
      detail_info(no_registrasi_aset, centerBaru);
      map.setZoom(zoom);
    }
  }

  function detail_info(no_registrasi_aset, center){  //menampilkan informasi masjid
    google.maps.event.addListener(marker, "click", function(){
      infowindow = new google.maps.InfoWindow({
        position: center,
        content: 'No Registrasi Asset : '+no_registrasi_aset,
        pixelOffset: new google.maps.Size(0, -33)
      });
      info_windows.push(infowindow);
      hapusInfo();
      infowindow.open(map);
    });
  }

  function satutanah() {
    $.ajax({ url: '{{url('tanah/'.$tanah->id)}}', data: "", dataType: 'json', success: function (rows){
      hapusInfo();
      hapusmarker();
      tampilsemuatanah(rows,14);
    }});
  }
</script>
