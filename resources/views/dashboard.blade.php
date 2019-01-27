@extends('layouts.frontend')

@section('title')
  dashboard
@stop

@section('content')
<div class="">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="dashboard_graph">
          <div class="row x_title">
            <div class="col-md-6">
              <h3>Grafik Luas Tanah Dan Jumlah Tanah<small></small></h3>
            </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12">
            <div id="app">
              {!! $lchart->container() !!}
            </div>

            <script src="https://unpkg.com/vue"></script>
            <script>
                var app = new Vue({
                    el: '#app',
                });
            </script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js" charset="utf-8"></script>
            {!! $lchart->script() !!}
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div id="app">
              {!! $jchart->container() !!}
            </div>

            <script src="https://unpkg.com/vue"></script>
            <script>
                var app = new Vue({
                    el: '#app',
                });
            </script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js" charset="utf-8"></script>
            {!! $jchart->script() !!}
          </div>
          <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<br><br>
<div class="">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="dashboard_graph">
          <div class="row x_title">
            <div class="col-md-6">
              <h3>Grafik Keuangan Asset<small></small></h3>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div id="app">
              {!! $gchart->container() !!}
            </div>

            <script src="https://unpkg.com/vue"></script>
            <script>
                var app = new Vue({
                    el: '#app',
                });
            </script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js" charset="utf-8"></script>
            {!! $gchart->script() !!}
          </div>
          <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<br><br>
<div class="">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="dashboard_graph">
          <div class="row x_title">
            <div class="col-md-6">
              <h3>Grafik Total Asset Setiap Unit<small></small></h3>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div id="app">
              {!! $mchart->container() !!}
            </div>

            <script src="https://unpkg.com/vue"></script>
            <script>
                var app = new Vue({
                    el: '#app',
                });
            </script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js" charset="utf-8"></script>
            {!! $mchart->script() !!}
          </div>
          <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<br><br>
@stop
