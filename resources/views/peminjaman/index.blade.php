@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Daftar Pinjaman
                            <button class="btn btn-primary col-md-offset-10" data-toggle="modal" data-target="#modal-default">Tambah</button>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered" id="laravel_datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Peminjam</th>
                                    <th>Nama Barang</th>
                                    <th>Status</th>
                                    <th>Tanggan Peminjaman</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Created at</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach($peminjamans as $pem)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$pem->kartu->nama}}</td>
                                        <td>{{$pem->inventaris->nama}}</td>
                                        <td>@if($pem->status==1) 
                                            {{"Sedang dipinjam"}}
                                            @else {{"Telah dikembalikan"}}
                                            @endif</td>
                                        <td>{{$pem->tanggal_peminjaman}}</td>
                                        <td>{{$pem->tanggal_pengembalian}}</td>
                                        <td>{{$pem->created_at}}</td>
                                        
                                    <td>
                                        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal-default"><i class="fa fa-edit"></i></button>
                                        {{ Form::open(['url' => route('inventaris.destroy', $pem->id), 'method' => 'delete', 'class' => 'btn btn-outline-danger']) }}
                                            <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                                        {{ Form::close() }}
                                    </td>
                                    </tr> 
                                    <div hidden>{{$i++}}<div>
                                @endforeach  
                            </tbody>  
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Inventaris</h4>
                </div>
            <form class="form-horizontal" method="POST" action="{{route('inventaris.store')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group{{ $errors->has('daerah') ? ' has-error' : '' }}">
                        <label for="daerah" class="col-md-4 control-label">No Inventaris</label>
                        <div class="col-md-6"> 
                            <input class="form-control" name="no_inv" required>
                        </div>
                        <label for="daerah" class="col-md-4 control-label">Nama Barang</label>
                        <div class="col-md-6"> 
                            <input class="form-control" name="nama" required>
                        </div>   
                        <label for="daerah" class="col-md-4 control-label">Deskripsi</label>
                        <div class="col-md-6"> 
                            <textarea class="form-control" name="deskripsi" required></textarea>
                        </div>   
                        <label for="daerah" class="col-md-4 control-label">Jumlah</label>
                        <div class="col-md-6"> 
                            <input type="number" class="form-control" name="jumlah" required>
                        </div>                
                    </div>
                
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
            <!-- /.modal-content -->
    </div>
          <!-- /.modal-dialog -->

@endsection
@section('scripts')
<script>
   $(document).ready(function() {
        $('#laravel_datatable').DataTable();
    });
  </script>
@endsection
