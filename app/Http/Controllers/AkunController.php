<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\User;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function __construct()
    {
        $this->Akun=new Akun();
        // $this->middleware('auth');
    }
    public function index(){
        // $data = User::all();
        $data=[
            'Akun'=>User::all(),
        ];
        // // dd(Akun::all());        
        return view('admin.v_akun', $data);
    }

    public function add()
    {
        return view('admin.v_addAkun');
    }

    public function insert()
    {
        Request()->validate([
            'nip' => 'required|unique:tb_user,nip|min:18',
            'password' => 'required|min:3|max:5',
            'nama_pegawai' => 'required',
            'hak_akses' => 'required',
        ],[
            'nip.required' => 'Harap isi bidang ini',
            'nip.unique' => 'NIP/No Induk ini sudah ada',
            'nip.min' => 'Min 4 Karakter',
            'password.required' => 'Harap isi bidang ini',
            'password.min' => 'Min 3 Karakter',
            'password.max' => 'Min 5 Karakter',
            'nama_pegawai.required' => 'Harap isi bidang ini',
            'hak_akses.required' => 'Harap isi bidang ini'
        ]);

        $data = [
            'nip' => Request()->nip,
            'password' => Request()->password,
            'nama_pegawai' => Request()->nama_pegawai,
            'hak_akses' => Request()->hak_akses,
        ];

        $this->Akun->addData($data);
            return redirect()->route('akun')->with('pesan', 'Data Berhasil Ditambahkan');

    }

    public function detail($nip)
    {
        if (!$this->Akun->detailData($nip)){
            abort (404);
        }
        $data = [
            'akun' => $this->Akun->detailData($nip),
        ];
        return view ();
    }

    public function edit($nip)
    {
        if (!$this->Akun->detailData($nip)){
            abort (404);
        }
        $data = [
            'akun' => $this->Akun->detailData($nip),
        ];

        return view ('admin.v_editAkun', $data);
    }

    public function update($nip)
    {
        Request()->validate([
            'nip' => 'required|min:18',
            'password' => 'required|min:3|max:5',
            'nama_pegawai' => 'required',
            'hak_akses' => 'required',
        ],[
            'nip.required' => 'Harap isi bidang ini',
            'nip.unique' => 'NIP/No Induk ini sudah ada',
            'nip.min' => 'Min 4 Karakter',
            'password.required' => 'Harap isi bidang ini',
            'password.min' => 'Min 3 Karakter',
            'password.max' => 'Min 5 Karakter',
            'nama_pegawai.required' => 'Harap isi bidang ini',
            'hak_akses.required' => 'Harap isi bidang ini'
        ]);

        $data = [
            'nip' => Request()->nip,
            'password' => Request()->password,
            'nama_pegawai' => Request()->nama_pegawai,
            'hak_akses' => Request()->hak_akses,
        ];

        $this->Akun->editData($nip, $data);
        return redirect()->route('akun')->with('pesan', 'Data Berhasil Diupdate');
    }

    public function delete($nip)
    {
        $this->Akun->deleteData($nip);
        return redirect()->route('akun')->with('pesan', 'Data Berhasil Dihapus');
        
    }
}
