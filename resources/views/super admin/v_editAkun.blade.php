@extends('super admin.v_template')
@section('title','Edit Akun')
@section ('content')

<div class="card">
    <div class="card-header">
<form action="/akun/update/{{$akun->username}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="content">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" class="form-control" value="{{$akun->username}}">
                    <div class="text-danger">
                      @error ('username')
                      {{$message}}
                      @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    <div class="text-danger">
                      @error ('password')
                      {{$message}}
                      @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{$akun->email}}">
                    <div class="text-danger">
                      @error ('email')
                      {{$message}}
                      @enderror
                    </div>
                </div>
    
                <div class="form-group">
                    <label>Nama</label>
                    <input name="name" class="form-control" value="{{$akun->name}}">
                    <div class="text-danger">
                      @error ('name')
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