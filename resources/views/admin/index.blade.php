@extends('admin.layouts.app')
@section('title','Index')
@push('style')
    
@endpush

@section('content-header')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ Sentinel::getUser()->first_name }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard {{ Sentinel::getUser()->first_name }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection


@section('main-content')
    <div class="container-fluid">
        <!-- Main row -->
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ count($jumlah) }}</h3>

                <p>Jumlah Lowongan</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ count($pelamar) }}</h3>

                <p>Jumlah Pelamar yang nge-Apply</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ count($user) }}</h3>

                <p>User Yang Mendaftar</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ count($perusahaan) }}</h3>

                <p>Perusahaan</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->    
    <div class="container-fluid">
        <!-- Main row -->
        <!-- Small boxes (Stat box) -->
        <!-- /.row -->
        <!-- /.row (main row) -->
        <div class="row">
          <div class="col-md-12" id="chart">
              
          </div>
        </div>
      </div><!-- /.container-fluid -->    
@endsection
  
@push('script')
    <script src="{{ asset('highchart.js') }}"></script> }}
    <script>
      Highcharts.chart('chart', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Data Pelamar Yang Sudah Meng-apply'
        },
        subtitle: {
            text: 'Lolokeran'
        },
        xAxis: {
            categories: {!! json_encode($array) !!},
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Orang'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:1f} orang</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Jumlah',
            data: {!! json_encode($array2) !!}
        }]
    });
    </script>
@endpush