@extends('layouts.frontend')
@section('title')
  List Asset {{$data_master->nama_asset}}
@stop

@section('content')
<div class="x_panel">
  <div class="x_title">
    <h2>Pilih Lokasi Asset {{$data_master->nama_asset}}</h2>
    <ul class="nav navbar-right panel_toolbox">
                     
    </ul>
    <div class="clearfix"></div>
  </div>
</div>  
  <div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
    <div class="x_panel tile fixed_height">
                <div class="x_title">
                   <a href=""><h3>Universitas Andalas</h3></a>
                  <ul class="nav navbar-right panel_toolbox">
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div>
                   
                  </div>
                </div>
        </div>
        </div>

         <div class="col-md-4 col-sm-4 col-xs-12">
    <div class="x_panel tile fixed_height">
                <div class="x_title">
                  <a href=""><h3>Payakumbuh</h3></a>
                  <ul class="nav navbar-right panel_toolbox">
                  
                  </ul>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">
                  <div>

                    
                  </div>
                </div>
        </div>
        </div>

             <div class="col-md-4 col-sm-4 col-xs-12">
    <div class="x_panel tile fixed_height">
                <div class="x_title">
                  <a href=""><h3>Dhamasraya</h3></a>
                  <ul class="nav navbar-right panel_toolbox">
                  
                  </ul>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">
                  <div>

                    
                  </div>
                </div>
        </div>
        </div>
   
</div>
@endsection
