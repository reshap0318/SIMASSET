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
                        <h3>Grafik Total Asset PerKategori<small></small></h3>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div id="app">
                        {!! $chart_rph->container() !!}
                    </div>

                    <script src="https://unpkg.com/vue"></script>
                    <script>
                        var app = new Vue({
                            el: '#app',
                        });
                    </script>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js" charset="utf-8"></script>
                    {!! $chart_rph->script() !!}
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">
                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Grafik Keuangan Pertahun<small></small></h3>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div id="app1">
                        {!! $pchart->container() !!}
                    </div>
                    <script>
                        var app = new Vue({
                            el: '#app1',
                        });
                    </script>
                      {!! $pchart->script() !!}
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
@stop
