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

              <p>Sistem Klasifikasi Nama</p>

            </div>
        </div>
    </div>

    <!-- Info boxes -->
    <div class="row">
        

    </div>
    <!-- /.row -->

@endsection

