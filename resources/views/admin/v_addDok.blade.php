@extends('admin.v_template')
@section('title','Tambah Dokumen')
@section ('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        {{-- <h3 class="card-title">Tambah Dokumen</h3> --}}

        <form action="/dokumen/insert" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Rapat</label>
                            <input name="nama_rapat" class="form-control" value="{{old('nama_rapat')}}">
                            <div class="text-danger">
                              @error ('nama_rapat')
                              {{$message}}
                              @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Rapat</label>
                            <input type="date" name="tanggal_rapat" class="form-control" value="{{old('tanggal_rapat')}}">
                            <div class="text-danger">
                              @error ('tanggal_rapat')
                              {{$message}}
                              @enderror
                            </div>
                        </div>

                        <div class="form-group">
                          <label>Tempat Rapat</label>
                          <select class="form-control select2" name="id_tempat" style="width: 100%;" value="{{old('id_tempat')}}">
                            <option>Pilih tempat rapat</option>
                            <option value="1">Luar Kantor</option>
                            <option value="2">Dalam Kantor</option>
                            <option value="3">Virtual Meeting</option>
                          </select>
                          <div class="text-danger">
                            @error ('id_tempat')
                            {{$message}}
                            @enderror
                          </div>
                        </div>
            
                        {{-- <div class="form-group">
                            <label>Tempat Rapat</label>
                            <input type="text" name="tempat_rapat" class="form-control" value="{{old('tempat_rapat')}}">
                            <div class="text-danger">
                              @error ('tempat_rapat')
                              {{$message}}
                              @enderror
                            </div>
                        </div> --}}

                        <div class="form-group">
                          <label>Jumlah Peserta Rapat</label>
                          <input type="text" name="jumlah" class="form-control" value="{{old('jumlah')}}">
                          <div class="text-danger">
                            @error ('jumlah')
                            {{$message}}
                            @enderror
                          </div>
                        </div>

                      <div class="form-group">
                        <label>PIC Bagian</label>
                        <select class="form-control select2" name="id_pic" style="width: 100%;" value="{{old('id_pic')}}">
                          <option>Pilih PIC</option>
                          <option value="1">Persidangan</option>
                          <option value="2">Umum</option>
                        </select>
                        <div class="text-danger">
                          @error ('id_pic')
                          {{$message}}
                          @enderror
                        </div>
                      </div>

                        <div class="form-group">
                            <label>Bahan Rapat</label>
                            <input type="file" name="bahan" class="form-control" value="{{old('bahan')}}">
                            <div class="text-danger">
                              @error ('bahan')
                              {{$message}}
                              @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Notulensi</label>
                            <input type="file" name="notulensi" class="form-control" value="{{old('notulensi')}}">
                            <div class="text-danger">
                              @error ('notulensi')
                              {{$message}}
                              @enderror
                            </div>
                        </div>

                        <div class="form-group">
                          <label>Undangan</label>
                          <input type="file" name="undangan" class="form-control" value="{{old('undangan')}}">
                          <div class="text-danger">
                            @error ('undangan')
                            {{$message}}
                            @enderror
                          </div>
                      </div>

                        <div class="form-group">
                            <label>Tindak Lanjut</label>
                              <textarea name="tindak_lanjut" class="form-control" rows="3" placeholder="Enter ..." value="{{old('tindak_lanjut')}}"></textarea>
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
        {{-- <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div> --}}
      </div>
      {{-- <table class="table table-bordered"
        <thead>
            <tr>
                <th>No</th>
                <th>NIP/No Induk</th>
                <th>Password</th>
                <th>Nama</th>
                <th>Hak Akses</th>
                <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1;?>
            @foreach ($Akun as $data)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$data->nip}}</td>
                <td>{{$data->password}}</td>
                <td>{{$data->nama_pegawai}}</td>
                <td>{{$data->hak_akses}}</td>
                <td>
                  <a href="" class="btn btn-sm btn-warning">Edit</a>
                  <a href="" class="btn btn-sm btn-danger">Delete</a>
                </td>
              </tr>
            @endforeach
          </tbody>
      </table> --}}
          
      {{-- <div class="card-body">    
        @foreach ($Akun as $data)
        <h4>{{$data['nip']}}</h4>           
        <h4>{{$data['nama']}}</h4>             
        
        @endforeach
      </div> --}}
      <!-- /.card-body -->
      {{-- <div class="card-footer">
        Footer
      </div> --}}
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
@endsection

