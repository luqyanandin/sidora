@extends('layout.v_template')
@section('title','Edit Dokumen')
@section ('content')

<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        {{-- <h3 class="card-title">Tambah Dokumen</h3> --}}

        <form action="/dokumen/update/{{$dokumen->id_dokumen}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Rapat</label>
                            <input name="nama_rapat" class="form-control" value="{{$dokumen->nama_rapat}}">
                            <div class="text-danger">
                              @error ('nama_rapat')
                              {{$message}}
                              @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Rapat</label>
                            <input type="date" name="tanggal_rapat" class="form-control" value="{{$dokumen->tanggal_rapat}}">
                            <div class="text-danger">
                              @error ('tanggal_rapat')
                              {{$message}}
                              @enderror
                            </div>
                        </div>

                        <div class="form-group">
                          <label>Tempat Rapat</label>
                          <select class="form-control select2" name="id_tempat" style="width: 100%;" value="{{$dokumen->id_tempat}}">
                            <option>Pilih tempat rapat</option>
                            <option {{$dokumen->id_tempat == 1  ? 'selected' : ''}} value="1">Luar Kantor</option>
                            <option {{$dokumen->id_tempat == 2  ? 'selected' : ''}} value="2">Dalam Kantor</option>
                            <option {{$dokumen->id_tempat == 3  ? 'selected' : ''}} value="3">Virtual Meeting</option>
                          </select>
                          <div class="text-danger">
                            @error ('id_tempat')
                            {{$message}}
                            @enderror
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Jumlah Peserta Rapat</label>
                          <input type="text" name="jumlah" class="form-control" value="{{$dokumen->jumlah}}">
                          <div class="text-danger">
                            @error ('jumlah')
                            {{$message}}
                            @enderror
                          </div>
                        </div>

                        <div class="form-group">
                          <label>PIC Bagian</label>
                          <select class="form-control select2" name="id_pic" style="width: 100%;" value="{{$dokumen->id_pic}}">
                            <option>Pilih PIC</option>
                            <option {{$dokumen->id_pic == 1  ? 'selected' : ''}} value="1">Persidangan</option>
                            <option {{$dokumen->id_pic == 2  ? 'selected' : ''}} value="2">Umum</option>
                          </select>
                          <div class="text-danger">
                            @error ('id_pic')
                            {{$message}}
                            @enderror
                          </div>
                        </div>

                        <div class="form-group">
                            <label>Bahan Rapat</label>
                            <input type="file" name="bahan" class="form-control" value="{{$dokumen->bahan}}">
                            <div class="text-danger">
                              @error ('bahan')
                              {{$message}}
                              @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Notulensi</label>
                            <input type="file" name="notulensi" class="form-control" value="{{$dokumen->notulensi}}">
                            <div class="text-danger">
                              @error ('notulensi')
                              {{$message}}
                              @enderror
                            </div>
                        </div>

                        <div class="form-group">
                          <label>Undangan</label>
                          <input type="file" name="undangan" class="form-control" value="{{$dokumen->undangan}}">
                          <div class="text-danger">
                            @error ('undangan')
                            {{$message}}
                            @enderror
                          </div>
                      </div>

                      <div class="form-group">
                        <label>Tindak Lanjut</label>
                          <textarea name="tindak_lanjut" class="form-control">{{$dokumen->tindak_lanjut}}</textarea>
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