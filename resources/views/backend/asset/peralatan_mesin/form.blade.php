
<div class="form-group col-sm-6">
    {!! Form::label('status_dokumen', 'Status Dokumen *', ['class' => 'control-label col-md-3 col-sm-6 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('status_dokumen', null, ['class' => 'form-control','class'=>'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('jenis_dokumen', 'Jenis Dokumen *', ['class' => 'control-label col-md-3 col-sm-6 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('jenis_dokumen', null, ['class' => 'form-control','class'=>'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('no_dokumen', 'No Dokumen *', ['class' => 'control-label col-md-3 col-sm-6 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('no_dokumen', null, ['class' => 'form-control','class'=>'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('jenis_sertifikat', 'Jenis Sertifikat *', ['class' => 'control-label col-md-3 col-sm-6 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('jenis_sertifikat', null, ['class' => 'form-control','class'=>'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('tanggal_dokumen', 'Tanggal Dokumen *', ['class' => 'control-label col-md-3 col-sm-6 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::date('tanggal_dokumen', null, ['class' => 'form-control','class'=>'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>




<div class="form-group col-sm-6">
  {!! Form::label('foto', 'Foto', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
  <div class="col-md-6 col-sm-6 col-xs-12">
    {!! Form::file('foto', null, ['class'=>'form-control']) !!}
  </div>
</div>

<div class=" col-sm-12">
    <b><h4> style="margin-top: 20px;text-align: center;">Digitas Tanah</h4></b>
</div>

<!-- Geom Field -->
<div class="form-group text-center">
    <div id="map-content" style="width:100%;height:420px; z-index:50"></div>
    <br>
    <a class="btn btn-primary btn-sm" id="delete-button">Delete</a>
    <br> <br>
    <div class="col-sm-12">
        {!! Form::text('geom', null, ['class' => 'form-control','id'=>'geom']) !!}
    </div>
</div>


@section('scripts')

<script>
    $(document).on('change','#master',function(){
        var data=document.getElementById("master").options[document.getElementById("master").selectedIndex].value;
        $('#kode_master').html("");
        var coba = data.split('');
        var s = '';
        for(var i=0;i<coba.length;i++){
          if(i%2!=0 || i>6){
            s = s+coba[i];
          }else{
            s = s+coba[i]+'.';
          }
        }
        $('#kode_master').append(s);
    });
</script>

    <script>
        var drawingManager;
        var selectedShape;
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map-content'),{
                center: new google.maps.LatLng(-0.914518, 100.459526),
                zoom: 16,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                disableDefaultUI: true,
                zoomControl: true,
                mapTypeControl: true
            });
            var polyOptions = {
                fillColor: 'blue',
                strokeColor: 'blue',
                draggable: true
            };
            drawingManager = new google.maps.drawing.DrawingManager({
                drawingMode: google.maps.drawing.OverlayType.POLYGON,
                drawingControlOptions: {
                    position: google.maps.ControlPosition.TOP_LEFT,
                    drawingModes: [
                        google.maps.drawing.OverlayType.POLYGON
                    ]
                },
                polygonOptions: polyOptions,
                map: map
            });
            //event digitasi di google map
            google.maps.event.addListener(drawingManager, 'overlaycomplete', function(event){
                if (event.type == google.maps.drawing.OverlayType.POLYGON){
                    //console.log('polygon path array', event.overlay.getPath().getArray());
                    var str_input ='((';
                    var i=0;
                    var coor = [];
                    $.each(event.overlay.getPath().getArray(), function(key, latlng){
                        var lat = latlng.lat();
                        var lon = latlng.lng();
                        coor[i] = lon +' '+ lat;
                        str_input += lon +' '+ lat +',';
                        i++;
                    });
                    str_input = str_input+''+coor[0]+'))';
                    $("#geom").val(str_input);
                    drawingManager.setDrawingMode(null);
                    drawingManager.setOptions({
                        drawingControl: false
                    });
                    // Add an event listener that selects the newly-drawn shape when the user mouses down on it.
                    var newShape = event.overlay;
                    newShape.type = event.type;
                    setSelection(newShape);
                    google.maps.event.addListener(newShape, 'click', function(){
                        setSelection(newShape);
                    });
                }
                function getCoordinate(){
                    var polygonBounds = newShape.getPath();
                    str_input ='((';
                    for(var i = 0 ; i < polygonBounds.length ; i++){
                        coor[i] = polygonBounds.getAt(i).lng() +' '+ polygonBounds.getAt(i).lat();
                        str_input += polygonBounds.getAt(i).lng() +' '+ polygonBounds.getAt(i).lat() +',';
                    }
                    str_input = str_input+''+coor[0]+'))';
                    $("#geom").val(str_input);
                }
                google.maps.event.addListener(newShape.getPath(), 'set_at', getCoordinate);
                google.maps.event.addListener(newShape.getPath(), 'insert_at', getCoordinate);
                google.maps.event.addListener(newShape.getPath(), 'remove_at', getCoordinate);
            });
            google.maps.event.addListener(drawingManager, 'drawingmode_changed', clearSelection);
            google.maps.event.addListener(map, 'click', clearSelection);
            google.maps.event.addDomListener(document.getElementById('delete-button'), 'click', deleteSelectedShape);
            drawingManager.setMap(map);
        }
        function clearSelection() {
            if (selectedShape) {
                selectedShape.setEditable(false);
                selectedShape = null;
            }
        }
        function setSelection(shape) {
            clearSelection();
            selectedShape = shape;
            shape.setEditable(true);
        }
        function deleteSelectedShape() {
            if (selectedShape) {
                $("#geom").val('');
                selectedShape.setMap(null);
                drawingManager.setOptions({
                    drawingControl: true
                });
            }
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIhFclffR-6pgFqaUP_d7ZU8fEUhCflZ0&libraries=drawing&callback=initMap"></script>
@endsection
