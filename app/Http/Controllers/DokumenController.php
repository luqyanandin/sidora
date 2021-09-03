<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\Notulensi;
use App\Models\Undangan;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;

class DokumenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->Bahan=new Bahan();
        $this->Notulensi=new Notulensi();
        $this->Undangan=new Undangan();
    }
 
    public function insertBahan($id_rapat)
    {

    Request()->validate([
    'bahan' => 'mimes:pdf,pptx,docx,rar,zip',
    'bahan' => 'required|file|max:8000',
    ]);

    $bahan = Request()->bahan;
    $bahanname = time().'-'. $bahan->getClientOriginalName();
    $bahan->move(public_path('bahan'), $bahanname);
    
    $data = [
    'bahan_rapat' => $bahanname,
    'id_rapat'=>$id_rapat
    ];

    $this->Bahan->addData($data);
    return back()->with('bahan', 'Bahan Berhasil Ditambahkan');
//    return redirect()->with('pesan', 'Data Berhasil Ditambahkan');
    }

    public function insertNotulensi($id_rapat)
    {
    Request()->validate([
    'notulensi' => 'mimes:pdf,pptx,docx,rar,zip|max:100000000000000',
    ]);

    $notulensi = Request()->notulensi;
    $notulensiname = time().'-'. $notulensi->getClientOriginalName();
    $notulensi->move(public_path('notulensi'), $notulensiname);

    $data = [
    'notulensi_rapat' => $notulensiname,
    'id_rapat'=>$id_rapat
    ];

    $this->Notulensi->addData($data);
    return back()->with('notulensi', 'Notulensi Berhasil Ditambahkan');
    }


    public function insertUndangan($id_rapat)
    {
    Request()->validate([
    'undangan' => 'mimes:pdf,pptx,docx,rar,zip|max:100000000000000',
    ]);

    $undangan = Request()->undangan;
    $undanganname = time().'-'. $undangan->getClientOriginalName();
    $undangan->move(public_path('undangan'), $undanganname);

    $data = [
    'undangan_rapat' => $undanganname,
    'id_rapat'=>$id_rapat
    ];

    $this->Undangan->addData($data);
    return back()->with('undangan', 'Undangan Berhasil Ditambahkan');
    }


    public function deleteBahan($id_rapat)

    {
    $this->Bahan->deleteData($id_rapat);
    return back()->with('bahan', 'Bahan Berhasil Dihapus');

    }

    public function deleteNotulensi($id_rapat)

    {
    $this->Notulensi->deleteData($id_rapat);
    return back()->with('notulensi', 'Notulensi Berhasil Dihapus');

    }

    public function deleteUndangan($id_rapat)

    {
    $this->Undangan->deleteData($id_rapat);
    return back()->with('undangan', 'Undangan Berhasil Dihapus');

    }


}
