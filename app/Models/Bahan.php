<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bahan extends Model
{

    public function getData($id_rapat)
    {
        return DB::table('bahans')
            ->leftJoin('tb_rapat', 'bahans.id_rapat', '=', 'tb_rapat.id_rapat')
            ->where('bahans.id_rapat',$id_rapat)
            ->get();
    }
    public function addData($data)
    {
        DB::table('bahans')->insert($data);
    }


    public function deleteData($id_bahan)
    {
        return DB::table('bahans')->where('id_bahan', $id_bahan)->delete();
    }


}
