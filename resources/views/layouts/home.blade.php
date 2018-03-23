@push('meta')
<!-- Meta Tag -->
@endpush 

@extends('app')
@section('content')
@include('layouts/nav-header')
@if(!Auth::check())
<section class="section">
    <div class="container">
        <div class="content">
            <h2>
                <b>Silakan login menggunakan NIK yang sudah terdaftar</b>
            </h2>
        </div>
        <div class="columns">
            <div class="column is-6">
                <form action="{{action('FunctionController@actionPelamarLogin')}}" method="POST">
                    {{csrf_field()}}
                    <div class="field">
                        <label class="label">NIK</label>
                        <div class="control">
                            <input class="input" type="text" placeholder="Nomor NIK" name="nik" value="{{Request::old('nik')}}">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Password</label>
                        <div class="control">
                            <input class="input" type="password" placeholder="password" name="password">
                        </div>
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-link">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@else
<section class="section">
    <div class="container">
        <div class="content">
            <h2>
                <b>Hai, Saudara/i {{Auth::user()->nama_lengkap}}</b>
            </h2>
            @if($berkas_lamaran = \App\Models\BerkasLamaran::where('id_pelamar', Auth::user()->id_pelamar)->first())
                @if($berkas_lamaran->status == 11)
                <h2><b>SELAMAT! ANDA DINYATAKAN LOLOS SELEKSI ADMINISTRASI</b></h2>
                <a href="{{url('kartu-saya')}}" class="button is-link">
                    <span class="icon is-small">
                        <i class="fa fa-download"></i>
                    </span>
                    <span>DOWNLOAD KARTU TANDA PESERTA</span>
                </a>
        </div>
        <div class="content">
                <dt>
                    <dl>Lokasi tes tulis dan Wawancara berada pada:</dl>
                    <dl>Tempat : Universitas Maarif Hasyim Latif (UMAHA) Jln. Raya Megare No. 30 Taman, Sidoarjo</dl>
                    <dl>Waktu :	 25 Maret 2018, pukul 08:00 WIB - selesai</dl>
                </dt>
                @else
                <h2><b>MAAF, ANDA DINYATAKAN TIDAK LOLOS SELEKSI ADMINISTRASI</b></h2>
                @endif
            @endif
        </div>
    </div>
</section>
@endif
<section class="section">
    <div class="container">
        <div class="content has-text-centered">
            <h2>
                <b>PENETAPAN NAMA-NAMA PESERTA YANG LOLOS SELEKSI ADMINISTRASI<br>
                CALON TENAGA PENDAMPING KEGIATAN<br>
                BANTUAN STIMULAN PERUMAHAN SWADAYA (BSPS)<br>
                PROVINSI JAWA TIMUR TAHUN 2018<br>
                </b>
            </h2>
            <a href="{{asset('download/penetapan-2018.pdf')}}" class="button is-link">
                <span class="icon is-small">
                    <i class="fa fa-download"></i>
                </span>
                <span>Download daftar pelamar yang lolos di sini</span>
            </a>
        </div>
        <div class="content">
            <p>Adapun peserta yang dinyatakan lolos seleksi administrasi , diharapkan:</p>
            <ol type="a">
                <li>Login dengan memasukkan NIK dan password</li>
                <li>Kartu Tanda Peserta hanya dapat dicetak apabila peserta telah login dan dinyatakan lolos seleksi administrasi</li>
                <li>Membawa kelengkapan alat tulis berupa pensil 2B, bolpoin, dan penghapus</li>
                <li>Membawa berkas lamaran, tanda pengenal asli (KTP, SIM atau paspor), dan Kartu Tanda Peserta</li>
                <li>Berkas lamaran yang dibawa:
                    <ol type="A">
                        <li>Surat lamaran (asli)</li>
                        <li>Daftar Riwayat Hidup (asli)</li>
                        <li>Pas foto 4x6 = 1 lembar</li>
                        <li>Fotocopy KTP</li>
                        <li>Fotocopy NPWP</li>
                        <li>Surat keterangan sehat jasmani dan rohani (asli)</li>
                        <li>Fotocopy ijazah terakhir (legalisir)</li>
                        <li>Fotocopy transkrip (legalisir)</li>
                        <li>Fotocopy SKCK yang masih berlaku (legalisir)</li>
                        <li>Surat bebas narkoba, psikotropika, dan zat aditif lainnya (asli)</li>
                        <li>Surat keterangan pengalaman kerja sejenis (jika ada)</li>
                        <li>Sertifikat kursus/pelatihan keahlian terkait (jika ada)</li>
                        <li>Surat pernyataan bukan PNS, pengurus LSM, bukan anggota dan simpatisan partai politik sertaq bukan tim sukses dari calon kepala desa, calon pasangan kepala daerah, dan calon pasangan Presiden Republik Indonesia bermaterai (asli)</li>
                        <li>Surat pernyataan bersedia bekerja penuh waktu (Full Time) sesuai dengan jam kerja selama masa kontrak bermaterai (asli)</li>
                        <li>Surat BPJS (jika ada)</li>
                    </ol>
                </li>
                <li>Jadwal tes tulis dan wawancara ditetapkan pada tanggal 25 Maret 2018 dengan rincian jadwal dan tempat yang dapat diakses setelah login</li>
                <li>Peserta diharapkan dating satu jam sebelum tes tulis dan wawancara dilaksanakan</li>
                <li>Peserta yang mengikuti tes tulis dan wawancara diwajibkan menggunakan pakaian bebas rapi (bukan bahan kaos) dan bersepatu.</li>
            </ol>
        </div>
        <div class="content">
        <p><b>KETERANGAN :</b></p>
        <ol>
            <li>Keputusan dan penentuan hasil seleksi sepenuhnya merupakan kewenangan pejabat pengadaan Barang/jasa pada SNVT Penyediaan Perumahan Provinsi Jawa Timur yang bersifat final dan tidak bias diganggu gugat</li>
            <li>Biaya akomodasi dan transportasi ditanggung oleh masing-masing peserta yang dinyatakan lolos seleksi administrasi</li>
            <li>Peserta tidka dipungut biaya apapun dalam proses seleksi Tenaga Pendamping Kegiatan Bantuan Stimulan Perumaha Swadaya (BSPS) Provinsi Jawa Timur</li>
        </ol>
        </div>
    </div>
</section>
@endsection 

@push('scripts')
<!-- Js -->
@endpush