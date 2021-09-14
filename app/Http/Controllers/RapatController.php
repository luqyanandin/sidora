<?php

namespace App\Http\Controllers;

use App\Models\Rapat;
use App\Models\Bahan;
use App\Models\Notulensi;
use App\Models\Undangan;
use Illuminate\Http\Request;

class RapatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->Rapat=new Rapat();
        $this->Bahan=new Bahan();
        $this->Notulensi=new Notulensi();
        $this->Undangan=new Undangan();
    }
    public function index(Request $request)
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

       
        return view('admin.v_rapat', $data);
    }

    public function add()
    {
        return view('admin.v_addRapat');
    }

    public function insert()
    {
        
        Request()->validate([
            'nama_rapat' => 'required|unique:tb_rapat,nama_rapat|min:10',
            'tanggal_rapat' => 'required',
            'id_tempat' => 'required',
            // 'jumlah' => 'required|min:1',
            'id_pic' => 'required',
            // 'tindak_lanjut' => 'required'
        ],[
            'nama_rapat.required' => 'Harap isi kolom ini',
            'nama_rapat.unique' => 'Nama Rapat ini sudah ada, lengkapi dengan kata lain',
            'nama_rapat.min' => 'Min 10 Karakter',
            'tanggal_rapat.required' => 'Harap isi kolom ini',
            'id_tempat.required' => 'Harap isi kolom ini',
            // 'jumlah.required' => 'Harap isi kolom ini',
            // 'jumlah.min' => 'Min 1 karakter',
            'id_pic.required' => 'Harap isi kolom ini',
            // 'tindak_lanjut.required' => 'Harap isi bidang ini'
        ]);

        $data = [
            'id_rapat' => Request()->id_rapat,
            'nama_rapat' => Request()->nama_rapat,
            'tanggal_rapat' => Request()->tanggal_rapat,
            'id_tempat' => Request()->id_tempat,
            'jumlah' => Request()->jumlah,
            'id_pic' => Request()->id_pic,
            'tindak_lanjut'=>Request()->tindak_lanjut
        ];

            $this->Rapat->addData($data);
            return redirect()->route('rapat')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    public function detail($id_rapat)
    {
        if (!$this->Rapat->detailData($id_rapat)){
            abort (404);
        }
        $data = [
            'rapat' => $this->Rapat->detailData($id_rapat),
        ];
        return view ('admin.v_detailRapat', $data);
    }


    public function edit($id_rapat)
    {
        if (!$this->Rapat->detailData($id_rapat)){
            abort (404);
        }
        $data = [
            'rapat' => $this->Rapat->detailData($id_rapat),
        ];

        return view ('admin.v_editRapat', $data);
    }

    public function update($id_rapat)
    {
        Request()->validate([
            'nama_rapat' => 'required|min:10',
            'tanggal_rapat' => 'required',
            'id_tempat' => 'required',
            // 'jumlah' => 'required|min:1',
            'id_pic' => 'required',
            // 'tindak_lanjut' => 'required'
        ],[
            'nama_rapat.required' => 'Harap isi kolom ini',
            'nama_rapat.min' => 'Min 10 Karakter',
            'tanggal_rapat.required' => 'Harap isi kolom ini',
            'id_tempat.required' => 'Harap isi kolom ini',
            // 'jumlah.required' => 'Harap isi kolom ini',
            // 'jumlah.min' => 'Min 1 karakter',
            'id_pic.required' => 'Harap isi kolom ini',
            // 'tindak_lanjut.required' => 'Harap isi bidang ini'
        ]);

        $data = [
            'id_rapat' => Request()->id_rapat,
            'nama_rapat' => Request()->nama_rapat,
            'tanggal_rapat' => Request()->tanggal_rapat,
            'id_tempat' => Request()->id_tempat,
            'jumlah' => Request()->jumlah,
            'id_pic' => Request()->id_pic,
            'tindak_lanjut'=>Request()->tindak_lanjut
        ];

        $this->Rapat->editData($id_rapat, $data);
        return redirect()->route('rapat')->with('pesan', 'Data Berhasil Diupdate');

    }

    public function delete($id_rapat)
    {
        $this->Rapat->deleteData($id_rapat);
        return redirect()->route('rapat')->with('pesan', 'Data Berhasil Dihapus');
        
    }

    public function dokumen($id_rapat)
    {
        if (!$this->Rapat->detailData($id_rapat)){
        abort (404);
        }


        $data = [
        'rapat' => $this->Rapat->detailData($id_rapat),
        'bahan'=> $this->Bahan->getData($id_rapat),
        'notulensi' => $this->Notulensi->getData($id_rapat),
        'undangan' => $this->Undangan->getData($id_rapat)
        ];

        return view ('admin.v_addBahan',$data);
    }

}
