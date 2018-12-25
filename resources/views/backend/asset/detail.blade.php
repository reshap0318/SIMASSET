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
      
  </div>
</div>

@endsection
