<div class="x_panel">

  <div class="x_content">
  		<div class="flex">
         <div class="col-md-6 text-center">
			        <div id="map" style="height:300px;background: black;width: 100%"></div>
         </div>
         <div class="col-md-6">
           <br><br><br>
        		<div class="form-group col-md-12">
        			<div class="col-md-4">
        				{!! Form::label('nama', 'Jumlah Lantai') !!}
        			</div>
        			<div class="col-md-8">
        				{!! Form::label('nama', ' : ') !!} {{$bangunan->jumlah_lantai}} 
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
	};

	function bangunan() //tampil digitasi abk
	{
	    bangunan = new google.maps.Data();
	    bangunan.loadGeoJson( "{{url('layerbangunan/'.$bangunan->id)}}" );
	    bangunan.setStyle(function(feature){

	    	color = '#ff3300'
	        return({
	            fillColor:color,
		        strokeWeight:2.0,
		        strokeColor:'black',
		        fillOpacity:0.3,
		        clickable: false
	        });
	    });
	    bangunan.setMap(map);
	}
	function basemap(){
	    map = new google.maps.Map(document.getElementById('map'), {
	    zoom: 12,
	    center: new google.maps.LatLng(-0.913328, 100.460848),
	    mapTypeId: google.maps.MapTypeId.ROADMAP,
	  });
	}
</script>
