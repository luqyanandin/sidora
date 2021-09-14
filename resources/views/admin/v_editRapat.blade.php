@extends('admin.v_template')
@section('title','Edit Data Rapat')
@section ('content')

<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        {{-- <h3 class="card-title">Tambah Dokumen</h3> --}}

        <form action="/rapat/update/{{$rapat->id_rapat}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Rapat</label>
                            <input name="nama_rapat" class="form-control" value="{{$rapat->nama_rapat}}">
                            <div class="text-danger">
                              @error ('nama_rapat')
                              {{$message}}
                              @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Rapat</label>
                            <input type="date" name="tanggal_rapat" class="form-control" value="{{$rapat->tanggal_rapat}}">
                            <div class="text-danger">
                              @error ('tanggal_rapat')
                              {{$message}}
                              @enderror
                            </div>
                        </div>

                        <div class="form-group">
                          <label>Tempat Rapat</label>
                          <select class="form-control select2" name="id_tempat" style="width: 100%;" value="{{$rapat->id_tempat}}">
                            <option>Pilih tempat rapat</option>
                            <option {{$rapat->id_tempat == 1  ? 'selected' : ''}} value="1">Luar Kantor</option>
                            <option {{$rapat->id_tempat == 2  ? 'selected' : ''}} value="2">Dalam Kantor</option>
                            <option {{$rapat->id_tempat == 3  ? 'selected' : ''}} value="3">Virtual Meeting</option>
                          </select>
                          <div class="text-danger">
                            @error ('id_tempat')
                            {{$message}}
                            @enderror
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Jumlah Peserta Rapat</label>
                          <input type="text" name="jumlah" class="form-control" value="{{$rapat->jumlah}}">
                          <div class="text-danger">
                            @error ('jumlah')
                            {{$message}}
                            @enderror
                          </div>
                        </div>

                        <div class="form-group">
                          <label>PIC Bagian</label>
                          <select class="form-control select2" name="id_pic" style="width: 100%;" value="{{$rapat->id_pic}}">
                            <option>Pilih PIC</option>
                            <option {{$rapat->id_pic == 1  ? 'selected' : ''}} value="1">Persidangan</option>
                            <option {{$rapat->id_pic == 2  ? 'selected' : ''}} value="2">Umum</option>
                          </select>
                          <div class="text-danger">
                            @error ('id_pic')
                            {{$message}}
                            @enderror
                          </div>
                        </div>

                      <div class="form-group">
                        <label>Tindak Lanjut</label>
                                        <textarea id="summernote" name="tindak_lanjut">
                                          {{$rapat->tindak_lanjut}}
              </textarea>
                          {{-- <textarea name="tindak_lanjut" class="form-control">{{$rapat->tindak_lanjut}}</textarea> --}}
                        <div class="text-danger">
                          @error ('tindak_lanjut')
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

            
        </form>
@endsection