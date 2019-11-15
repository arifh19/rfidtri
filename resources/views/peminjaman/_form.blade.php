<div class="box-body">
    <div class="form-group has-feedback{{ $errors->has('kartu_id') ? ' has-error' : '' }}">
            {!! Form::label('kartu_id', 'Nama Peminjam') !!}
            <select name="kartu_id" class="form-control select2" required>
                <option value="" disabled selected>Tentukan nama peminjam</option>
                @foreach($kehadirans as $hadir)
                    
                    <option value="{{$hadir->kartu_id}}">{{$hadir->kartu->nama}}</option>
                @endforeach
            </select>
            {!! $errors->first('kartu_id', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group has-feedback{{ $errors->has('inventaris_id') ? ' has-error' : '' }}">
            {!! Form::label('inventaris_id', 'Nama Barang') !!}
    
            <select name="inventaris_id" class="form-control select2" required>
                <option value="" disabled selected>Tentukan nama barang</option>
                @foreach($barangs as $bar)
                    <option value="{{$bar->id}}">{{$bar->nama}}</option>
                @endforeach
            </select>
            {!! $errors->first('inventaris_id', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group has-feedback{{ $errors->has('waktu') ? ' has-error' : '' }}">
            {!! Form::label('waktu', 'Alokasi Waktu') !!}
    
            {!! Form::number('waktu', null, ['class' => 'form-control', 'placeholder' => 'Alokasi Waktu','required']) !!}
            {!! $errors->first('waktu', '<p class="help-block">:message</p>') !!}
        </div>
    
    </div>
    <!-- /.box-body -->
    
    <div class="box-footer">
        {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    </div>
@section('scripts')
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>
@endsection