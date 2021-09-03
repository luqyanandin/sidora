<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Undangan extends Model
{

    public function getData($id_rapat)
    {
        return DB::table('undangans')
            ->leftJoin('tb_rapat', 'undangans.id_rapat', '=', 'tb_rapat.id_rapat')
            ->where('undangans.id_rapat',$id_rapat)
            ->get();
    }
    public function addData($data)
    {
        DB::table('undangans')->insert($data);
    }


    public function deleteData($id_undangan)
    {
        return DB::table('undangans')->where('id_undangan', $id_undangan)->delete();
    }


}
