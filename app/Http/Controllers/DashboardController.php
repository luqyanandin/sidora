<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Chart;
use App\Models\Rapat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->Rapat=new Rapat();
    }

    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        // dd($this->Dokumen->dashboardJumlahRapat());
        // $data=['Dashboard'=>$this->Dokumen->dashboardJumlahRapat()];
        $groups = $this->Rapat->dashboardJumlahRapat();
        
        $chart = new Chart;
        $chart->labels = (array_keys($groups));
        $chart->dataset = (array_values($groups));

        $groups2 = $this->Rapat->dashboardTempatRapat();
                $chart2 = new Chart;
                $chart2->labels = (array_keys($groups2));
                $chart2->dataset = (array_values($groups2));
        if($keyword){
            $data=[
                'Rapat'=>$this->Rapat->allDataWithKeyword($keyword),
                'Chart'=>$chart,
                'Chart2'=>$chart2
            ];
            // $data = Dokumen::where("nama_rapat","LIKE","%$keyword%")->get();
        }else{
            $data=[
                'Rapat'=>$this->Rapat->allData(),
                'Chart'=>$chart,
                                'Chart2'=>$chart2
            ];
        }

        return view('admin.v_dashboard', $data);
    }

    public function search(Request $request)
    {
    $keyword = $request->get('keyword');

    if($keyword){
    $data=[
    'Rapat'=>$this->Rapat->allDataWithKeyword($keyword),
    ];
    // $data = Dokumen::where("nama_rapat","LIKE","%$keyword%")->get();
    }else{
    $data=[
    'Rapat'=>$this->Rapat->allData(),
    ];
    }


    return view('admin.v_dashboard', $data);
    }
}
