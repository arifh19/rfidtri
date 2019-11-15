@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Daftar Kehadiran
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered" id="laravel_datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>NIM</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Keluar</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach($hadirs as $had)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$had->kartu->nama}}</td>
                                        <td>{{$had->kartu->nim}}</td>
                                        <td>{{$had->clock_in}}</td>
                                        <td>
                                            @if($had->clock_out==null)
                                                -
                                            @else
                                                {{$had->clock_out}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($had->status==0)
                                                Masuk
                                            @else
                                                Keluar
                                            @endif
                                        </td>
                                        <td>{{$had->created_at}}</td>
                                        
                                
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
