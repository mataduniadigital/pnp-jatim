<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;

use Auth;
use Excel;
use PDF;

use App\Models\BerkasLamaran;
use App\Models\Penempatan;

use Yajra\DataTables\Facades\DataTables;

class LayoutController extends BaseController
{
	public function indexHome(Request $request){
        return view('layouts/home');
    }

	public function indexKartuSaya(Request $request){
        $pelamar = Auth::user();
        $berkas_lamaran = BerkasLamaran::join('penempatan', 'penempatan.id_penempatan', '=', 'berkas_lamaran.id_penempatan')
                                        ->join('jabatan_lamaran', 'jabatan_lamaran.id_jabatan_lamaran', '=', 'berkas_lamaran.id_jabatan_lamaran')
                                        ->join('pelamar', 'pelamar.id_pelamar', '=', 'berkas_lamaran.id_pelamar')
                                        ->where('berkas_lamaran.id_pelamar', $pelamar->id_pelamar)->first();
        if($berkas_lamaran->status == 11){
            $pdf = PDF::loadView('pdf-layouts/kartu-peserta', ['berkas_lamaran' => $berkas_lamaran]);
            return $pdf->download('kartu-peserta.pdf');
        }else{
            return '';
        }
    }

	public function indexPengumuman(Request $request){
        return view('layouts/pengumuman-berkas');
    }

	public function indexContact(Request $request){
        return view('layouts/contact-person');
    }

	public function indexDaftar(Request $request){
        return view('layouts/daftar');
    }

	public function indexUbahPassword(Request $request){
        return view('layouts/ubah-password');
    }

	public function indexUploadBerkas(Request $request){
        $pelamar = Auth::user();
        $data = array(
            'pelamar' => $pelamar,
            'berkas_lamaran' => BerkasLamaran::where('id_pelamar', $pelamar->id_pelamar)->first(),
            'list_penempatan' => Penempatan::get()
        );
        return view('layouts/upload-berkas', $data);
    }

}