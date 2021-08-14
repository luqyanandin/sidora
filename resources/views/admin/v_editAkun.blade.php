@extends('layout.v_template')
@section('title','Edit Akun')
@section ('content')

<div class="card">
    <div class="card-header">
<form action="/akun/update/{{$akun->nip}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="content">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>NIP/No Induk</label>
                    <input name="nip" class="form-control" value="{{$akun->nip}}" readonly>
                    <div class="text-danger">
                      @error ('nip')
                      {{$message}}
                      @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" value="{{$akun->password}}">
                    <div class="text-danger">
                      @error ('password')
                      {{$message}}
                      @enderror
                    </div>
                </div>
    
                <div class="form-group">
                    <label>Nama</label>
                    <input name="nama_pegawai" class="form-control" value="{{$akun->nama_pegawai}}">
                    <div class="text-danger">
                      @error ('nama_pegawai')
                      {{$message}}
                      @enderror
                    </div>
                </div>

                <div class="form-group">
                  <label>Hak Akses</label>
                  <input name="hak_akses" class="form-control" value="{{$akun->hak_akses}}">
                  <div class="text-danger">
                    @error ('hak_akses')
                    {{$message}}
                    @enderror
                  </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-sm">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    
</form>
@endsection