<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Akun extends Model
{
    public function allData()
    {
        return DB::table('tb_user')->get();
    }

    public function addData($data)
    {
        DB::table('tb_user')->insert($data);
    }

    public function detailData($nip)
    {
        return DB::table('tb_user')->where('nip' , $nip)->first();
    }

    public function editData($nip,$data)
    {
        return DB::table('tb_user')->where('nip', $nip)->update($data);
    }

    public function deleteData($nip)
    {
        return DB::table('tb_user')->where('nip', $nip)->delete();
    }

}
