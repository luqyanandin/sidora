@extends('layout.v_template')
@section('title','Dokumen')
@section ('content')
<section class="content">

    <!-- Default box -->
    <div class="row">
      <div class="col-12">
    <div class="card">
      <div class="card-header">
        {{-- <h3 class="card-title">Dokumen Rapat DJSN</h3> --}}
        <a href="/dokumen/add" class="btn btn-primary btn-sm">Tambah</a> <br>
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
        {{session('pesan')}}.
      </div>
      @endif
      {{-- <div class="container">
        
      <div class="row">
      <div class="col-md-3"> --}}
        
      <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Rapat</th>
                <th>Tanggal Rapat</th>
                <th>Tempat Rapat</th>
                <th>Jumlah Peserta</th>
                <th>PIC Bagian</th>
                <th>Bahan</th>
                <th>Notulensi</th>
                <th>Undangan</th>
                <th>Tindak Lanjut</th>
                <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1;?>
            @foreach ($Dokumen as $data)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$data->nama_rapat}}</td>
                <td>{{$data->tanggal_rapat}}</td>
                <td>{{$data->tempat_rapat}}</td>
                <td>{{$data->jumlah}}</td>
                <td>{{$data->pic}}</td>
                <td>{{$data->bahan}}</td>
                <td>{{$data->notulensi}}</td>
                <td><a href="{{$data->undangan}}" class="btn btn-sm btn-success">Download</a></td>
                <td><a href="/dokumen/detail/{{$data->id_dokumen}}" class="btn btn-sm btn-success">Detail</a></td>
                <td style="width:500px">
                  <a href="/dokumen/edit/{{$data->id_dokumen}}" class="btn btn-sm btn-warning">Edit</a>
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$data->id_dokumen}}">
                    Delete
                  </button>
                </td>
              </tr>
            @endforeach
          </tbody>
      </table>
    </div>
    {{-- </div>
  </div> --}}
      @foreach ($Dokumen as $data)
      <div class="modal modal-danger fade" id="delete{{$data->id_dokumen}}">
        <div class="modal-dialog modal-sm">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">{{$data->nama_rapat}}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah Anda Yakin Ingin Menghapus Data Ini?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
              <a href="/dokumen/delete/{{$data->id_dokumen}}" class="btn btn-outline-light">Yes</a>
            </div>
          </div>
        </div>
      </div>
    </div>
      @endforeach
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
  </div>
</div>
    <!-- /.card -->

  </section>
@endsection

