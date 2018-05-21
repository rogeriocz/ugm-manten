@extends('layout')

@section('content')
<h1>OK</h1>
  <div>{!! $chart->html() !!}</div>

{!! Charts::scripts() !!}
{!! $chart->script() !!}
@endsection
 <!-- <script src=//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js charset=utf-8></script> -->
<!-- <script src="/adminlte/bower_components/chart.js/dist/Chart.min.js"></script> -->
 
 