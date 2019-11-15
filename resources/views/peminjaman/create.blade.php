@extends('layouts.app')

@section('dashboard')
Peminjaman Barang
    <small>Input Peminjaman</small>
@endsection

@section('breadcrumb')
    <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ url('/peminjaman') }}">Peminjaman</a></li>
    <li class="active">Pinjam Barang</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Isi Form</div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['url' => route('peminjaman.store'), 'method' => 'post']) !!}
                    @include('peminjaman._form')
                {!! Form::close() !!}
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col (left) -->

        <div class="col-md-7">

        </div>
        <!-- /.col (right)-->
    </div>
    <!-- /.row -->

@endsection