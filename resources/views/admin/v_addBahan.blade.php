@extends('admin.v_template')
@section('title','Dokumen Rapat')
@section ('content')

<div class='col-sm-12'>
<div class="card">
    <div class="card-header">
<table class="table">
<tr>
    <th width="100px">Nama Rapat</th>
    <th width="30px">:</th>
    <th>{{$rapat->nama_rapat}}</th>
</tr>
<tr>
    <th width="100px">Tanggal Rapat</th>
    <th width="30px">:</th>
    <th>{{$rapat->tanggal_rapat}}</th>
</tr>
<tr>
    <th width="100px">Tempat Rapat</th>
    <th width="30px">:</th>
    <th>{{$rapat->tempat_rapat}}</th>
</tr>
<tr>
    <th width="100px">Jumlah Peserta</th>
    <th width="30px">:</th>
    <th>{{$rapat->jumlah}}</th>
</tr>
<tr>
    <th width="100px">PIC Bagian</th>
    <th width="30px">:</th>
    <th>{{$rapat->pic}}</th>
</tr>


<tr>
    <th><a href="/rapat" class="btn btn-success tbn-sm">Kembali</a></th>
</tr>
</table>
    </div>
</div>
</div>
            <div class="col-sm-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Bahan Rapat</h3>
                    </div>
                    <div class="card-body">
                        <form action="/bahan/insertBahan/{{$rapat->id_rapat}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <div class="col-md-4">
                        <div class="form-group">
                        <input type="file" name="bahan" class="form-control">
                            <div class="text-danger">
                              @error ('bahan')
                              {{$message}}
                              @enderror
                            </div>                       
                        </div>
                    </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-info">Upload</button>
                        </div>
                    </div>
                        </form>
                    </div>
                        

                        <table class="table table-bordered">
                            @if (session('bahan'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> Success </h5>
                                {{ session('bahan') }}.
                            </div>
                        @endif
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bahan Rapat</th>
                                    <th>Download</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php $no=1 ?>
                                    @foreach ($bahan as $data)
                                    <tr>
                                        <td align="center">{{$no++}}</td>
                                        <td>{{$data->bahan_rapat}}</td>
                                        <td align="center"><a href="{{asset('bahan')}}/{{$data->bahan_rapat}}"
                                                class="btn btn-sm btn-info"><i class="fa fa-download"></i></a></td> 
                                        <td align="center">
                                                                                                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#deleteBahan{{ $data->id_bahan }}"><i class="fa fa-trash"></i>
                                </button>
                                            {{-- <a href="/bahan/deleteBahan/{{ $data->id_bahan }}" type="button" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i></a> --}}
                                        </td>      
                                            

                                </button>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    <!-- /.card-body -->
                </div>
            </div>
            @foreach ($bahan as $data)
                        <div class="modal modal-danger fade" id="deleteBahan{{ $data->id_bahan }}">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content bg-danger">
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{ $data->bahan_rapat }}</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda Yakin Ingin Menghapus Data Ini?</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                                        <a href="/bahan/deleteBahan/{{ $data->id_bahan}}"
                                            class="btn btn-outline-light">Yes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach

            <div class="col-sm-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Notulensi</h3>
                    </div>
                    <div class="card-body">
                        <form action="/bahan/insertNotulensi/{{$rapat->id_rapat}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                        <div class="form-group">
                            <input type="file" name="notulensi" class="form-control">
                            <div class="text-danger">
                              @error ('notulensi')
                              {{$message}}
                              @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                            <button type="submit" class="btn btn-info">Upload</button>
                        </div>
                    </div>
                                            </form>
                        </div>

                        <table class="table table-bordered">
                            @if (session('notulensi'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> Success </h5>
                                {{ session('notulensi') }}.
                            </div>
                        @endif
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Notulensi Rapat</th>
                                    <th>Download</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php $no=1 ?>
                                    @foreach ($notulensi as $data)
                                    <tr>
                                        <td align="center">{{$no++}}</td>
                                        <td>{{$data->notulensi_rapat}}</td>
                                        <td align="center"><a href="{{asset('bahan')}}/{{$data->notulensi_rapat}}"
                                                class="btn btn-sm btn-info"><i class="fa fa-download"></i></a></td> 
                                        <td align="center">
                                                                                                                                                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#deleteNotulensi{{ $data->id_notulensi }}"><i class="fa fa-trash"></i>
                                </button>
                                        </td>                                          
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            
            @foreach ($notulensi as $data)
                        <div class="modal modal-danger fade" id="deleteNotulensi{{ $data->id_notulensi }}">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content bg-danger">
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{ $data->notulensi_rapat }}</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda Yakin Ingin Menghapus Data Ini?</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                                        <a href="/bahan/deleteNotulensi/{{ $data->id_notulensi}}"
                                            class="btn btn-outline-light">Yes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach


                <div class="col-sm-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Undangan</h3>
                    </div>
                    <div class="card-body">
                        <form action="/bahan/insertUndangan/{{$rapat->id_rapat}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                        <div class="form-group">
                            <input type="file" name="undangan" class="form-control">
                            <div class="text-danger">
                              @error ('undangan')
                              {{$message}}
                              @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                            <button type="submit" class="btn btn-info">Upload</button>
                        </div>
                    </div>
                                            </form>
                        </div>

                        <table class="table table-bordered">
                            @if (session('undangan'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> Success </h5>
                                {{ session('undangan') }}.
                            </div>
                        @endif
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Undangan Rapat</th>
                                    <th>Download</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php $no=1 ?>
                                    @foreach ($undangan as $data)
                                    <tr>
                                        <td align="center">{{$no++}}</td>
                                        <td>{{$data->undangan_rapat}}</td>
                                        <td align="center"><a href="{{asset('bahan')}}/{{$data->undangan_rapat}}"
                                                class="btn btn-sm btn-info"><i class="fa fa-download"></i></a></td> 
                                        <td align="center">
                                                                                                                                                                                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#deleteUndangan{{ $data->id_undangan }}"><i class="fa fa-trash"></i>
                                </button>
                                        </td>                                          
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            @foreach ($undangan as $data)
                        <div class="modal modal-danger fade" id="deleteUndangan{{ $data->id_undangan }}">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content bg-danger">
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{ $data->undangan_rapat }}</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda Yakin Ingin Menghapus Data Ini?</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                                        <a href="/bahan/deleteUndangan/{{ $data->id_undangan}}"
                                            class="btn btn-outline-light">Yes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
@endsection