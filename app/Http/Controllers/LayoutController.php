<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;

use Auth;
use Excel;

use App\Models\BerkasLamaran;
use App\Models\Penempatan;

use Yajra\DataTables\Facades\DataTables;

class LayoutController extends BaseController
{
	public function indexHome(Request $request){
        return view('layouts/home');
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