@extends('layouts.app')

@section('dashboard')
    Dashboard
    <small>Admin</small>
@endsection

@section('breadcrumb')
    <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
@endsection

@section('content')
    <!-- Welcome -->
    <div class="row">
        <div class="col-md-12">
            <div class="callout callout-success">
              <h4>Selamat Datang</h4>

              <p>Sistem xxx</p>

            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-android-download"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Jumlah Inventaris</span>
                <span class="info-box-number">{{$inventaris->count()}} aset</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Kehadiran</span>
              <span class="info-box-number">{{$kehadiran->count()}} mahasiswa</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-android-hand"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Peminjaman</span>
              <span class="info-box-number">{{$peminjaman->count()}} aset</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-android-send"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah yang sedang dipinjam</span>
              <span class="info-box-number">{{$pinjam->count()}} aset</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col --><div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-redo"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah yang sudah dikembalikan</span>
              <span class="info-box-number">{{$kembali->count()}} aset</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>

    <!-- Info boxes -->
    <div class="row">
        

    </div>
    <!-- /.row -->

@endsection

