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
        $this->middleware('auth');
    }
    public function index(){
        // $data = User::all();
        $data=[
            'Akun'=>User::all(),
        ];
        // // dd(Akun::all());        
        return view('super admin.v_akun', $data);
    }

    public function add()
    {
        return view('super admin.v_addAkun');
    }

    public function insert()
    {
        Request()->validate([
            'username' => 'required|min:5',
            'password' => 'required|min:3|max:10',
            'email' => 'required',
            'name' => 'required',
            'email' => 'required',
            'hak_akses' => 'required',
        ],[
            'username.required' => 'Harap isi bidang ini',
            'username.min' => 'Min 5 Karakter',
            'password.required' => 'Harap isi bidang ini',
            'password.min' => 'Min 3 Karakter',
            'password.max' => 'Min 10 Karakter',
            'email' => 'Harap isi bidang ini',
            'name.required' => 'Harap isi bidang ini',
            'hak_akses.required' => 'Harap isi bidang ini'
        ]);

        $data = [
            'username' => Request()->username,
            'password' => Request()->password,
            'email' => Request()->email,
            'name' => Request()->name,
            'hak_akses' => Request()->hak_akses,
        ];

        $this->Akun->addData($data);
            return redirect()->route('akun')->with('pesan', 'Data Berhasil Ditambahkan');

    }

    public function detail($username)
    {
        if (!$this->Akun->detailData($username)){
            abort (404);
        }
        $data = [
            'akun' => $this->Akun->detailData($username),
        ];
        return view ();
    }

    public function edit($username)
    {
        if (!$this->Akun->detailData($username)){
            abort (404);
        }
        $data = [
            'akun' => $this->Akun->detailData($username),
        ];

        return view ('super admin.v_editAkun', $data);
    }

    public function update($username)
    {
        Request()->validate([
            'username' => 'required|min:5',
            'password' => 'required|min:3|max:10',
            'email' => 'required',
            'name' => 'required',
            'email' => 'required',
            'hak_akses' => 'required',
        ],[
            'username.required' => 'Harap isi bidang ini',
            'username.min' => 'Min 5 Karakter',
            'password.required' => 'Harap isi bidang ini',
            'password.min' => 'Min 3 Karakter',
            'password.max' => 'Min 10 Karakter',
            'email' => 'Harap isi bidang ini',
            'name.required' => 'Harap isi bidang ini',
            'hak_akses.required' => 'Harap isi bidang ini'
        ]);

        $data = [
            'username' => Request()->username,
            'password' => Request()->password,
            'email' => Request()->email,
            'name' => Request()->name,
            'hak_akses' => Request()->hak_akses,
        ];

        $this->Akun->editData($username, $data);
        return redirect()->route('akun')->with('pesan', 'Data Berhasil Diupdate');
    }

    public function delete($username)
    {
        $this->Akun->deleteData($username);
        return redirect()->route('akun')->with('pesan', 'Data Berhasil Dihapus');
        
    }
}
