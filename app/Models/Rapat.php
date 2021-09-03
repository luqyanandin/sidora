<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rapat extends Model
{
    protected $table = 'tb_rapat';

    public function allData()
    {
        return DB::table('tb_rapat')
            ->leftJoin('tb_tempat', 'tb_tempat.id_tempat', '=', 'tb_rapat.id_tempat')
            ->leftJoin('tb_pic', 'tb_pic.id_pic', '=', 'tb_rapat.id_pic')
            ->get();
    }

    public function allDataWithKeyword($keyword)
    {
        return DB::table('tb_rapat')->where('nama_rapat','like','%'.$keyword.'%')
            ->leftJoin('tb_tempat', 'tb_tempat.id_tempat', '=', 'tb_rapat.id_tempat')
            ->leftJoin('tb_pic', 'tb_pic.id_pic', '=', 'tb_rapat.id_pic')
            ->get();
    }

    public function addData($data)
    {
        DB::table('tb_rapat')->insert($data);
    }

    public function detailData($id_rapat)
    {
        return DB::table('tb_rapat')
            ->leftJoin('tb_tempat', 'tb_tempat.id_tempat', '=', 'tb_rapat.id_tempat')
            ->leftJoin('tb_pic', 'tb_pic.id_pic', '=', 'tb_rapat.id_pic')
            ->where('id_rapat' , $id_rapat)
            ->first();
            
    }

    public function editData($id_rapat,$data)
    {
        return DB::table('tb_rapat')->where('id_rapat', $id_rapat)->update($data);
    }

    public function deleteData($id_rapat)
    {
        return DB::table('tb_rapat')->where('id_rapat', $id_rapat)->delete();
    }

    public function dashboardJumlahRapat(){
        return DB::table('tb_rapat')->select(DB::raw('count(id_rapat) as `data`'),DB::raw('YEAR(tanggal_rapat) year, MONTH(tanggal_rapat) month'))
        ->groupBy('year','month')->pluck('data','month')->all();
    }

    public function dashboardTempatRapat(){
    return DB::table('tb_rapat')->leftJoin('tb_tempat', 'tb_tempat.id_tempat', '=',
    'tb_rapat.id_tempat')->select(DB::raw('count(id_rapat) as `data`'),'tempat_rapat')
    ->groupBy('tempat_rapat')->pluck('data','tempat_rapat')->all();
    }

}
