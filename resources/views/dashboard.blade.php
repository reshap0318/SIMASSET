@extends('layouts.frontend')

@section('title')
  dashboard
@stop

@section('content')
<div class="row">
  <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="tile-stats">
      <div class="icon"><i class="fa fa-list-alt"></i></div>
      <div class="count">268101</div>
      <h3>Banyak Tanah</h3>
    </div>
  </div>
  <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="tile-stats">
      <div class="icon"><i class="fa fa-clock-o"></i></div>
      <div class="count">50</div>
      <h3>BANYAK BANGUNAN</h3>
    </div>
  </div>
  <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="tile-stats">
      <div class="icon"><i class="fa fa-clock-o"></i></div>
      <div class="count">2410</div>
      <h3>Banyak Mobil</h3>
    </div>
  </div>
</div>
@stop
