@extends('admin.v_template')
@section('title', 'Data Rapat')
@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <h3 class="card-title">Dokumen Rapat DJSN</h3> --}}

                        {{-- <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <form action="{{url("/rapat")}}" method="GET">
                                    <div class="input-group input-group-lg">
                                        <input name="keyword" type="text" class="form-control form-control-lg"
                                            placeholder="Nama Rapat" value="{{old('keyword')}}">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-lg btn-default">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> --}}
                        <a href="/rapat/add" class="btn btn-primary btn-sm">Tambah</a> <br>
                        {{-- <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div> --}}
                    </div>
                    {{-- <div class="card-body">
        Selamat datang {{$nama}}     
      </div> --}}
                    <div class="card-body table-responsive p-0">
                        @if (session('pesan'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> Success </h5>
                                {{ session('pesan') }}.
                            </div>
                        @endif
                        {{-- <div class="container">
        
      <div class="row">
      <div class="col-md-3"> --}}

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Rapat</th>
                                    <th>Tanggal Rapat</th>
                                    <th>Tempat Rapat</th>
                                    <th>Jumlah Peserta</th>
                                    <th>PIC Bagian</th>
                                    <th>Dokumen</th>
                                    <th>Tindak Lanjut</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($Rapat as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->nama_rapat }}</td>
                                        <td>{{ $data->tanggal_rapat }}</td>
                                        <td>{{ $data->tempat_rapat }}</td>
                                        <td>{{ $data->jumlah }}</td>
                                        <td>{{ $data->pic }}</td>
                                        <td align="center"><a href="/rapat/dokumen/{{ $data->id_rapat }}"
                                                class="btn btn-sm btn-info"><i class="fa fa-folder-open"></i></a></td>
                                        <td align="center"><a href="/rapat/detail/{{ $data->id_rapat }}"
                                                class="btn btn-sm btn-success center"><i class="fa fa-eye open"></a></td>
                                        <td align="center" style="width:150px">
                                            <a href="/rapat/edit/{{ $data->id_rapat }}"
                                                class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $data->id_rapat }}"><i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- </div>
  </div> --}}
                    @foreach ($Rapat as $data)
                        <div class="modal modal-danger fade" id="delete{{ $data->id_rapat }}">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content bg-danger">
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{ $data->nama_rapat }}</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda Yakin Ingin Menghapus Data Ini?</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                                        <a href="/rapat/delete/{{ $data->id_rapat }}"
                                            class="btn btn-outline-light">Yes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                @endforeach
                <!-- /.card-body -->
                {{-- <div class="card-footer">
        Footer
      </div> --}}
                <!-- /.card-footer-->
            </div>
        </div>
        </div>
        <!-- /.card -->

    </section>
@endsection
