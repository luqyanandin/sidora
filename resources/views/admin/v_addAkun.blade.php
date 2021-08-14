@extends('layout.v_template')
@section('title','Tambah Akun')
@section ('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        {{-- <h3 class="card-title">Tambah Dokumen</h3> --}}

        <form action="/akun/insert" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>NIP/No Induk</label>
                            <input name="nip" class="form-control" value="{{old('nip')}}">
                            <div class="text-danger">
                              @error ('nip')
                              {{$message}}
                              @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" value="{{old('password')}}">
                            <div class="text-danger">
                              @error ('password')
                              {{$message}}
                              @enderror
                            </div>
                        </div>
            
                        <div class="form-group">
                            <label>Nama</label>
                            <input name="nama_pegawai" class="form-control" value="{{old('nama_pegawai')}}">
                            <div class="text-danger">
                              @error ('nama_pegawai')
                              {{$message}}
                              @enderror
                            </div>
                        </div>

                        <div class="form-group">
                          <label>Hak Akses</label>
                          <input name="hak_akses" class="form-control" value="{{old('hak_akses')}}">
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

