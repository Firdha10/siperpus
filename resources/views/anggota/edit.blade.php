@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $(".users").select2();
    });
</script>
@stop
@extends('layouts.app')
@section('title')
    Edit Anggota
@endsection
@section('content')
<form action="{{ route('anggota.update', $data->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Anggota</h4>
                            <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                                <label for="nama" class="col-md-4 control-label">Nama</label>
                                <div class="col-md-6">
                                    <input id="nama" type="text" class="form-control" name="nama" value="{{ $data->nama }}" required>
                                    @if ($errors->has('nama'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nama') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('no_identitas') ? ' has-error' : '' }}">
                                <label for="no_identitas" class="col-md-4 control-label">Nomor Identitas</label>
                                <div class="col-md-6">
                                    <input id="no_identitas" type="number" class="form-control" name="no_identitas" value="{{ $data->no_identitas }}" maxlength="8" required>
                                    @if ($errors->has('no_identitas'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('no_identitas') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('tempat_lahir') ? ' has-error' : '' }}">
                                <label for="tempat_lahir" class="col-md-4 control-label">Tempat Lahir</label>
                                <div class="col-md-6">
                                    <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" value="{{ $data->tempat_lahir }}" required>
                                    @if ($errors->has('tempat_lahir'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tempat_lahir') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('tgl_lahir') ? ' has-error' : '' }}">
                                <label for="tgl_lahir" class="col-md-4 control-label">Tanggal Lahir</label>
                                <div class="col-md-6">
                                    <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir" value="{{ $data->tgl_lahir }}" required>
                                    @if ($errors->has('tgl_lahir'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                                <label for="level" class="col-md-4 control-label">Jenis Kelamin</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="jk" required="">
                                        <option value=""></option>
                                        <option value="L" {{$data->jk === "L" ? "selected" : ""}}>Laki - Laki</option>
                                        <option value="P" {{$data->jk === "P" ? "selected" : ""}}>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('jurusan_id') ? ' has-error' : '' }}">
                                <label for="jurusan_id" class="col-md-4 control-label">Jurusan</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="jurusan_id" required="">
                                        <option value="">--- Pilih Jurusan ---</option>
                                        @foreach($u as $list)
                                            <option value="{{$list->id}}" {{$data->jurusan_id === $list->id ? "selected" : ""}}>{{$list->jurusan_id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }} " style="margin-bottom: 20px;">
                                <label for="user_id" class="col-md-4 control-label">User Login</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="user_id" required="">
                                        <option value="">--- Pilih User ---</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}" {{$data->user_id === $user->id ? "selected" : ""}}>{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="submit">Simpan</button>
                            <a href="{{route('anggota.index')}}" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection