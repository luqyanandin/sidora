@extends('super admin.v_template')
@section('title', 'Akun')
@section('content')
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                {{-- <h3 class="card-title">Akun</h3> --}}
                <a href="/akun/add" class="btn btn-primary btn-sm">Tambah</a> <br>
                {{-- <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div> --}}
            </div>

            @if (session('pesan'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Success</h5>
                    {{ session('pesan') }}.
                </div>
            @endif
            <table class="table table-bordered" <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Hak Akses</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($Akun as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->username }}</td>
                            <td>{{ $data->password }}</td>
                            <td>{{ $data->email}}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->hak_akses }}</td>
                            <td>
                                <a href="/akun/edit/{{ $data->username }}" class="btn btn-sm btn-warning">Edit</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#delete{{ $data->username }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @foreach ($Akun as $data)
                <div class="modal modal-danger fade" id="delete{{ $data->username }}">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content bg-danger">
                            <div class="modal-header">
                                <h4 class="modal-title">{{ $data->name}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda Yakin Ingin Menghapus Data Ini?</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
                                <a href="/akun/delete/{{ $data->username }}" class="btn btn-outline-light">Yes</a>
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
        <!-- /.card -->

    </section>

@endsection
