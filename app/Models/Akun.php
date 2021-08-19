<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Akun extends Model
{
    public function allData()
    {
        return DB::table('users')->get();
    }

    public function addData($data)
    {
        DB::table('users')->insert($data);
    }

    public function detailData($username)
    {
        return DB::table('users')->where('username' , $username)->first();
    }

    public function editData($username,$data)
    {
        return DB::table('users')->where('username', $username)->update($data);
    }

    public function deleteData($username)
    {
        return DB::table('users')->where('username', $username)->delete();
    }

}
