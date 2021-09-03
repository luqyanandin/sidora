<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Notulensi extends Model
{

    public function getData($id_rapat)
    {
        return DB::table('notulensis')
            ->leftJoin('tb_rapat', 'notulensis.id_rapat', '=', 'tb_rapat.id_rapat')
            ->where('notulensis.id_rapat',$id_rapat)
            ->get();
    }
    public function addData($data)
    {
        DB::table('notulensis')->insert($data);
    }


    public function deleteData($id_notulensi)
    {
        return DB::table('notulensis')->where('id_notulensi', $id_notulensi)->delete();
    }


}
