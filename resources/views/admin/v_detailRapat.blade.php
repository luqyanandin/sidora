@extends('admin.v_template')
@section('title','Detail Data Rapat')
@section ('content')

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
    <th width="100px">Tindak Lanjut</th>
    <th width="30px">:</th>
    <th>{!!$rapat->tindak_lanjut!!}</th>
</tr>
<tr>
    <th><a href="/rapat" class="btn btn-success tbn-sm">Kembali</a></th>
</tr>
</table>

    </div>
</div>

@endsection