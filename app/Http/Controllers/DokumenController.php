<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    // public function index(){
    //     $database=[
    //         'nama'=>'Vananda'
    //     ];
    //     return view('admin.v_dokumen',$database);
    // }
    public function __construct()
    {
        $this->middleware('auth');
        $this->Dokumen=new Dokumen();
    }
    public function index(){
        $data=[
            'Dokumen'=>$this->Dokumen->allData(),
        ];
        // // dd(Akun::all());        
        return view('admin.v_dokumen', $data);
    }

    public function add()
    {
        return view('admin.v_addDok');
    }

    public function insert()
    {
        
        Request()->validate([
            'nama_rapat' => 'required|unique:tb_dokumen,nama_rapat|min:10',
            'tanggal_rapat' => 'required',
            'id_tempat' => 'required',
            'jumlah' => 'required|min:1',
            'id_pic' => 'required',
            'bahan' => 'required|mimes:pdf,pptx,docx|max:5000000',
            'notulensi' => 'required|mimes:pdf,pptx,docx|max:5000000',
            'undangan' => 'required|mimes:pdf,pptx,docx|max:5000000',
            'tindak_lanjut' => 'required'
        ],[
            'nama_rapat.required' => 'Harap isi bidang ini',
            'nama_rapat.unique' => 'Nama Rapat ini sudah ada',
            'nama_rapat.min' => 'Min 10 Karakter',
            'tanggal_rapat.required' => 'Harap isi bidang ini',
            'id_tempat.required' => 'Harap isi bidang ini',
            'jumlah.required' => 'Harap isi bidang ini',
            'jumlah.min' => 'Min 1 karakter',
            'id_pic.required' => 'Harap isi bidang ini',
            'bahan.required' => 'Harap isi bidang ini',
            'notulensi.required' => 'Harap isi bidang ini',
            'undangan.required' => 'Harap isi bidang ini',
            'tindak_lanjut.required' => 'Harap isi bidang ini'
        ]);

        $bahan = Request()->bahan;
        $notulensi = Request()->notulensi;
        $undangan = Request()->undangan;
        $bahanname = Request()->id_dokumen . '.' . $bahan->extension();
        $notulensiname = Request()->id_dokumen . '.' . $notulensi->extension();
        $undanganname = Request()->id_dokumen . '.' . $undangan->extension();
        $bahan->move(public_path('bahan'), $bahan);
        $notulensi->move(public_path('notulensi'), $notulensi);
        $undangan->move(public_path('undangan'), $undangan);

        $data = [
            'id_dokumen' => Request()->id_dokumen,
            'nama_rapat' => Request()->nama_rapat,
            'tanggal_rapat' => Request()->tanggal_rapat,
            'id_tempat' => Request()->id_tempat,
            'jumlah' => Request()->jumlah,
            'id_pic' => Request()->id_pic,
            'bahan' => $bahan,
            'nip'=>'199507232018',
            'notulensi' => $notulensi,
            'undangan' => $undangan,
            'tindak_lanjut'=>Request()->tindak_lanjut
        ];

            $this->Dokumen->addData($data);
            return redirect()->route('dokumen')->with('pesan', 'Data Berhasil Ditambahkan');
    }

    public function detail($id_dokumen)
    {
        if (!$this->Dokumen->detailData($id_dokumen)){
            abort (404);
        }
        $data = [
            'dokumen' => $this->Dokumen->detailData($id_dokumen),
        ];
        return view ('admin.v_detailDok', $data);
    }


    public function edit($id_dokumen)
    {
        if (!$this->Dokumen->detailData($id_dokumen)){
            abort (404);
        }
        $data = [
            'dokumen' => $this->Dokumen->detailData($id_dokumen),
        ];

        return view ('admin.v_editDok', $data);
    }

    public function update($id_dokumen)
    {
        Request()->validate([
            'nama_rapat' => 'required|unique:tb_dokumen,nama_rapat|min:10',
            'tanggal_rapat' => 'required',
            'id_tempat' => 'required',
            'jumlah' => 'required|min:1',
            'id_pic' => 'required',
            'bahan' => 'required|mimes:pdf,pptx,docx|max:5000000',
            'notulensi' => 'required|mimes:pdf,pptx,docx|max:5000000',
            'undangan' => 'required|mimes:pdf,pptx,docx|max:5000000',
            'tindak_lanjut' => 'required'
        ],[
            'nama_rapat.required' => 'Harap isi bidang ini',
            'nama_rapat.unique' => 'Nama Rapat ini sudah ada',
            'nama_rapat.min' => 'Min 10 Karakter',
            'tanggal_rapat.required' => 'Harap isi bidang ini',
            'id_tempat.required' => 'Harap isi bidang ini',
            'jumlah.required' => 'Harap isi bidang ini',
            'jumlah.min' => 'Min 1 karakter',
            'id_pic.required' => 'Harap isi bidang ini',
            'bahan.required' => 'Harap isi bidang ini',
            'notulensi.required' => 'Harap isi bidang ini',
            'undangan.required' => 'Harap isi bidang ini',
            'tindak_lanjut.required' => 'Harap isi bidang ini'
        ]);

        $bahan = Request()->bahan;
        $notulensi = Request()->notulensi;
        $undangan = Request()->undangan;
        $bahanname = Request()->id_dokumen . '.' . $bahan->extension();
        $notulensiname = Request()->id_dokumen . '.' . $notulensi->extension();
        $undanganname = Request()->id_dokumen . '.' . $undangan->extension();
        $bahan->move(public_path('bahan'), $bahan);
        $notulensi->move(public_path('notulensi'), $notulensi);
        $undangan->move(public_path('undangan'), $undangan);

        $data = [
            'id_dokumen' => Request()->id_dokumen,
            'nama_rapat' => Request()->nama_rapat,
            'tanggal_rapat' => Request()->tanggal_rapat,
            'id_tempat' => Request()->id_tempat,
            'jumlah' => Request()->jumlah,
            'id_pic' => Request()->id_pic,
            'bahan' => $bahan,
            'nip'=>'199507232018',
            'notulensi' => $notulensi,
            'undangan' => $undangan,
            'tindak_lanjut'=>Request()->tindak_lanjut
        ];

        $this->Dokumen->editData($id_dokumen, $data);
        return redirect()->route('dokumen')->with('pesan', 'Data Berhasil Diupdate');

    }

    public function delete($id_dokumen)
    {
        $this->Dokumen->deleteData($id_dokumen);
        return redirect()->route('dokumen')->with('pesan', 'Data Berhasil Dihapus');
        
    }

}
