<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

use Auth;
use Excel;
use Session;

use App\Models\Pelamar;
use App\Models\BerkasLamaran;

use Yajra\DataTables\Facades\DataTables;

class FunctionController extends BaseController
{
	public function actionPelamarDaftar(Request $request){
        $input = (object) $request->input();

        $nik = str_replace(' ', '-', $input->nik);
        $nik = str_replace( array( '\'', '"', ',' , ';', '<', '>', '@', '-', '.'), '', $nik);

        if($input->password != $input->repassword){
            Session::flash('error-msg', 'Ketik kembali kolom re-password sama dengan kolom password Anda.');
            return Redirect::back()->withInput();
        }
        
        if($pelamar = Pelamar::where('nik', $nik)->first()){
            Session::flash('error-msg', 'nik Anda sudah terdaftar.');
            return Redirect::back()->withInput();
        }else{
            $pelamar = new Pelamar;
            $pelamar->nama_lengkap  = $input->nama_lengkap;
            $pelamar->nik           = $nik;
            $pelamar->password      = Hash::make($input->password);
            $pelamar->save();

            $berkas_lamaran = new BerkasLamaran;
            $berkas_lamaran->id_pelamar = $pelamar->id_pelamar;
            $berkas_lamaran->save();

            Session::flash('success-msg', 'Akun Anda dengan nik '.$nik.' berhasil didaftarkan.');
            return Redirect::back();
        }
    }

    public function actionPelamarLogin(Request $request){
        $input = (object) $request->input();

        $nik = str_replace(' ', '-', $input->nik);
        $nik = str_replace( array( '\'', '"', ',' , ';', '<', '>', '@', '-', '.'), '', $nik);

        if(Auth::attempt(['nik' => $nik, 'password' => $input->password], true)){
            Session::flash('success-msg', 'Selamat datang ...');
            return Redirect::back();
        }else{
            Session::flash('error-msg', 'Login failed ...');
            return Redirect::back()->withInput();
        }
    }

    public function actionPelamarLogout(Request $request){
        Auth::logout();
        return Redirect::back();
    }

    public function actionPelamarFinishUpload(Request $request){
        $input = (object) $request->input();

        $pelamar = Auth::user();
        if($berkas_lamaran = BerkasLamaran::where('id_pelamar', $pelamar->id_pelamar)->first()){
            if($berkas_lamaran->status != 0){
                return 404;
            }
            $berkas_lamaran->id_penempatan  = $input->penempatan;
            $berkas_lamaran->status         = 1;
            $berkas_lamaran->save();
        }

        Session::flash('success-msg', 'Terima kasih atas lamaran Anda, mohon tunggu dalam proses verifikasi ...');
        return Redirect::back();
    }

    public function actionPelamarUploadBerkas(Request $request){
        $pelamar = Auth::user();
        if($berkas_lamaran = BerkasLamaran::where('id_pelamar', $pelamar->id_pelamar)->first()){
            if($berkas_lamaran->status != 0){
                return 404;
            }
            if($request->input('jenis_file') == 'file_foto'){
                if ($request->hasFile('file_foto')) {
                    $filename = 'p'.$pelamar->id_pelamar.'-'.uniqid().'.'.$request->file('file_foto')->getClientOriginalExtension();
                    $path = $request->file('file_foto')->storeAs('public/file_foto', $filename);
                    $path = str_replace('public', 'storage', $path);

                    $berkas_lamaran->file_foto = $path;
                    $berkas_lamaran->save();
                    Session::flash('success-msg', 'Berhasil upload berkas ..');
                }
            }

            if($request->input('jenis_file') == 'file_ktp'){
                if ($request->hasFile('file_ktp')) {
                    $filename = 'p'.$pelamar->id_pelamar.'-'.uniqid().'.'.$request->file('file_ktp')->getClientOriginalExtension();
                    $path = $request->file('file_ktp')->storeAs('public/file_ktp', $filename);
                    $path = str_replace('public', 'storage', $path);
    
                    $berkas_lamaran->file_ktp = $path;
                    $berkas_lamaran->save();
                    Session::flash('success-msg', 'Berhasil upload berkas ..');
                }
            }
            
            if($request->input('jenis_file') == 'file_npwp'){
                if ($request->hasFile('file_npwp')) {
                    $filename = 'p'.$pelamar->id_pelamar.'-'.uniqid().'.'.$request->file('file_npwp')->getClientOriginalExtension();
                    $path = $request->file('file_npwp')->storeAs('public/file_npwp', $filename);
                    $path = str_replace('public', 'storage', $path);
    
                    $berkas_lamaran->file_npwp = $path;
                    $berkas_lamaran->save();
                    Session::flash('success-msg', 'Berhasil upload berkas ..');
                }
            }

            if($request->input('jenis_file') == 'file_keterangan_sehat'){
                if ($request->hasFile('file_keterangan_sehat')) {
                    $filename = 'p'.$pelamar->id_pelamar.'-'.uniqid().'.'.$request->file('file_keterangan_sehat')->getClientOriginalExtension();
                    $path = $request->file('file_keterangan_sehat')->storeAs('public/file_keterangan_sehat', $filename);
                    $path = str_replace('public', 'storage', $path);
    
                    $berkas_lamaran->file_keterangan_sehat = $path;
                    $berkas_lamaran->save();
                    Session::flash('success-msg', 'Berhasil upload berkas ..');
                }
            }

            if($request->input('jenis_file') == 'file_surat_lamaran'){
                if ($request->hasFile('file_surat_lamaran')) {
                    $filename = 'p'.$pelamar->id_pelamar.'-'.uniqid().'.'.$request->file('file_surat_lamaran')->getClientOriginalExtension();
                    $path = $request->file('file_surat_lamaran')->storeAs('public/file_surat_lamaran', $filename);
                    $path = str_replace('public', 'storage', $path);
    
                    $berkas_lamaran->file_surat_lamaran = $path;
                    $berkas_lamaran->save();
                    Session::flash('success-msg', 'Berhasil upload berkas ..');
                }
            }

            if($request->input('jenis_file') == 'file_cv'){
                if ($request->hasFile('file_cv')) {
                    $filename = 'p'.$pelamar->id_pelamar.'-'.uniqid().'.'.$request->file('file_cv')->getClientOriginalExtension();
                    $path = $request->file('file_cv')->storeAs('public/file_cv', $filename);
                    $path = str_replace('public', 'storage', $path);
    
                    $berkas_lamaran->file_cv = $path;
                    $berkas_lamaran->save();
                    Session::flash('success-msg', 'Berhasil upload berkas ..');
                }
            }

            if($request->input('jenis_file') == 'file_ijazah'){
                if ($request->hasFile('file_ijazah')) {
                    $filename = 'p'.$pelamar->id_pelamar.'-'.uniqid().'.'.$request->file('file_ijazah')->getClientOriginalExtension();
                    $path = $request->file('file_ijazah')->storeAs('public/file_ijazah', $filename);
                    $path = str_replace('public', 'storage', $path);
    
                    $berkas_lamaran->file_ijazah = $path;
                    $berkas_lamaran->save();
                    Session::flash('success-msg', 'Berhasil upload berkas ..');
                }
            }
            
            if($request->input('jenis_file') == 'file_transkrip'){
                if ($request->hasFile('file_transkrip')) {
                    $filename = 'p'.$pelamar->id_pelamar.'-'.uniqid().'.'.$request->file('file_transkrip')->getClientOriginalExtension();
                    $path = $request->file('file_transkrip')->storeAs('public/file_transkrip', $filename);
                    $path = str_replace('public', 'storage', $path);
    
                    $berkas_lamaran->file_transkrip = $path;
                    $berkas_lamaran->save();
                    Session::flash('success-msg', 'Berhasil upload berkas ..');
                }
            }

            if($request->input('jenis_file') == 'file_skck'){
                if ($request->hasFile('file_skck')) {
                    $filename = 'p'.$pelamar->id_pelamar.'-'.uniqid().'.'.$request->file('file_skck')->getClientOriginalExtension();
                    $path = $request->file('file_skck')->storeAs('public/file_skck', $filename);
                    $path = str_replace('public', 'storage', $path);
    
                    $berkas_lamaran->file_skck = $path;
                    $berkas_lamaran->save();
                    Session::flash('success-msg', 'Berhasil upload berkas ..');
                }
            }

            if($request->input('jenis_file') == 'file_bebas_narkoba'){
                if ($request->hasFile('file_bebas_narkoba')) {
                    $filename = 'p'.$pelamar->id_pelamar.'-'.uniqid().'.'.$request->file('file_bebas_narkoba')->getClientOriginalExtension();
                    $path = $request->file('file_bebas_narkoba')->storeAs('public/file_bebas_narkoba', $filename);
                    $path = str_replace('public', 'storage', $path);
    
                    $berkas_lamaran->file_bebas_narkoba = $path;
                    $berkas_lamaran->save();
                    Session::flash('success-msg', 'Berhasil upload berkas ..');
                }
            }

            if($request->input('jenis_file') == 'file_keterangan_pengalaman'){
                if ($request->hasFile('file_keterangan_pengalaman')) {
                    $filename = 'p'.$pelamar->id_pelamar.'-'.uniqid().'.'.$request->file('file_keterangan_pengalaman')->getClientOriginalExtension();
                    $path = $request->file('file_keterangan_pengalaman')->storeAs('public/file_keterangan_pengalaman', $filename);
                    $path = str_replace('public', 'storage', $path);
    
                    $berkas_lamaran->file_keterangan_pengalaman = $path;
                    $berkas_lamaran->save();
                    Session::flash('success-msg', 'Berhasil upload berkas ..');
                }
            }

            if($request->input('jenis_file') == 'file_sertifikat'){
                if ($request->hasFile('file_sertifikat')) {
                    $filename = 'p'.$pelamar->id_pelamar.'-'.uniqid().'.'.$request->file('file_sertifikat')->getClientOriginalExtension();
                    $path = $request->file('file_sertifikat')->storeAs('public/file_sertifikat', $filename);
                    $path = str_replace('public', 'storage', $path);
    
                    $berkas_lamaran->file_sertifikat = $path;
                    $berkas_lamaran->save();
                    Session::flash('success-msg', 'Berhasil upload berkas ..');
                }
            }

            if($request->input('jenis_file') == 'file_bukan_pns'){
                if ($request->hasFile('file_bukan_pns')) {
                    $filename = 'p'.$pelamar->id_pelamar.'-'.uniqid().'.'.$request->file('file_bukan_pns')->getClientOriginalExtension();
                    $path = $request->file('file_bukan_pns')->storeAs('public/file_bukan_pns', $filename);
                    $path = str_replace('public', 'storage', $path);
    
                    $berkas_lamaran->file_bukan_pns = $path;
                    $berkas_lamaran->save();
                    Session::flash('success-msg', 'Berhasil upload berkas ..');
                }
            }

            if($request->input('jenis_file') == 'file_bpjs'){
                if ($request->hasFile('file_bpjs')) {
                    $filename = 'p'.$pelamar->id_pelamar.'-'.uniqid().'.'.$request->file('file_bpjs')->getClientOriginalExtension();
                    $path = $request->file('file_bpjs')->storeAs('public/file_bpjs', $filename);
                    $path = str_replace('public', 'storage', $path);
    
                    $berkas_lamaran->file_bpjs = $path;
                    $berkas_lamaran->save();
                    Session::flash('success-msg', 'Berhasil upload berkas ..');
                }
            }

        }

        return Redirect::back();
    }
    
}