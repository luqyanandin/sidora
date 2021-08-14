<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dokumen extends Model
{
    public function allData()
    {
        return DB::table('tb_dokumen')
            ->leftJoin('tb_tempat', 'tb_tempat.id_tempat', '=', 'tb_dokumen.id_tempat')
            ->leftJoin('tb_pic', 'tb_pic.id_pic', '=', 'tb_dokumen.id_pic')
            ->get();
    }

    public function addData($data)
    {
        DB::table('tb_dokumen')->insert($data);
    }

    public function detailData($id_dokumen)
    {
        return DB::table('tb_dokumen')->where('id_dokumen' , $id_dokumen)->first();
    }

    public function editData($id_dokumen,$data)
    {
        return DB::table('tb_dokumen')->where('id_dokumen', $id_dokumen)->update($data);
    }

    public function deleteData($id_dokumen)
    {
        return DB::table('tb_dokumen')->where('id_dokumen', $id_dokumen)->delete();
    }

}
