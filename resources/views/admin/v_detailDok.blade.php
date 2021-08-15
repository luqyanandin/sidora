@extends('admin.v_template')
@section('title','Detail Dokumen')
@section ('content')

<div class="card">
    <div class="card-header">
<table class="table">
<tr>
    <th width="100px">Nama Rapat</th>
    <th width="30px">:</th>
    <th>{{$dokumen->nama_rapat}}</th>
</tr>
<tr>
    <th width="100px">Tanggal Rapat</th>
    <th width="30px">:</th>
    <th>{{$dokumen->tanggal_rapat}}</th>
</tr>
<tr>
    <th width="100px">Tempat Rapat</th>
    <th width="30px">:</th>
    <th>{{$dokumen->id_tempat}}</th>
</tr>
<tr>
    <th width="100px">Jumlah Peserta</th>
    <th width="30px">:</th>
    <th>{{$dokumen->jumlah}}</th>
</tr>
<tr>
    <th width="100px">PIC Bagian</th>
    <th width="30px">:</th>
    <th>{{$dokumen->id_pic}}</th>
</tr>
<tr>
    <th width="100px">Bahan Rapat</th>
    <th width="30px">:</th>
    <th>{{$dokumen->bahan}}</th>
</tr>
<tr>
    <th width="100px">Notulensi</th>
    <th width="30px">:</th>
    <th>{{$dokumen->notulensi}}</th>
</tr>
<tr>
    <th width="100px">Undangan</th>
    <th width="30px">:</th>
    <th>{{$dokumen->undangan}}</th>
</tr>
<tr>
    <th width="100px">Tindak Lanjut</th>
    <th width="30px">:</th>
    <th>{{$dokumen->tindak_lanjut}}</th>
</tr>
<tr>
    <th><a href="/dokumen" class="btn btn-success tbn-sm">Kembali</a></th>
</tr>
</table>
    </div>
</div>

@endsection