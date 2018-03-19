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
            <p>Untuk mengupload berkas Anda bisa klik link berikut atau klik tombol upload berkas di bagian navigasi</p>
            <a href="{{url('upload-berkas')}}" class="button is-primary">
                <span class="icon is-small">
                    <i class="fa fa-upload"></i>
                </span>
                <span>Upload Berkas</span>
            </a>
        </div>
    </div>
</section>
@endif
<section class="section">
    <div class="container">
        <div class="content">
            <h2><b>Pengumuman Upload Berkas Tambahan</b></h2>
            <p>Untuk seluruh pelamar dimohon untuk melakukan penggabungan dari semua file berkas persyaratan dalam satu file berekstensi pdf dan melakukan upload berkas tersebut setelah memilih pilihan lokasi penempatan saat masuk ke menu upload berkas.</p>
            <p>Berikut nama-nama pelamar yang harus menambahkan persyaratan upload berkas tambahan:</p>
            <ol>
                <li>NIK: 3573034xxxxxxxxxx a.n. {{ucwords(strtolower('R. YUNITA AMALA'))}}</li>
                <li>NIK: 3573022xxxxxxxxxx a.n. {{ucwords(strtolower('Aminuddin Efendy'))}}</li>
                <li>NIK: 3309066xxxxxxxxxx a.n. {{ucwords(strtolower('rohmantika wulandari'))}}</li>
                <li>NIK: 3509221xxxxxxxxxx a.n. {{ucwords(strtolower('DEDY SAPUTRO'))}}</li>
                <li>NIK: 3578041xxxxxxxxxx a.n. {{ucwords(strtolower('MEIDY KUNCORO ADI'))}}</li>
                <li>NIK: 3518141xxxxxxxxxx a.n. {{ucwords(strtolower('JUNADI'))}}</li>
                <li>NIK: 3509205xxxxxxxxxx a.n. {{ucwords(strtolower('aprilia kusuma wardani'))}}</li>
                <li>NIK: 3506252xxxxxxxxxx a.n. {{ucwords(strtolower('alfian soffa'))}}</li>
                <li>NIK: 3524041xxxxxxxxxx a.n. {{ucwords(strtolower('Widodo Sutresno'))}}</li>
                <li>NIK: 3509201xxxxxxxxxx a.n. {{ucwords(strtolower('Nur Anis Faisal'))}}</li>
            </ol>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="content">
            <h2><b>Petunjuk Alur Pendaftaran Peserta</b></h2>
            <ol>
                <li>Klik Menu Pendaftaran</li>
                <li>Masukkan NIK, Nama Lengkap (sesuai identitas), Email, dan Password yg diinginkan untuk login akun</li>
                <li>Kembali ke Menu Home, lalu login sesuai dengan NIK dan password yang telah didaftarkan</li>
                <li>Klik tombol "Upload Berkas" untuk melakukan upload berkas sesuai yg dibutuhkan</li>
                <li>Upload satu per satu berkas sesuai yang ada pada tampilan website</li>
                <li>Pilih lokasi (kabupaten/kota) yang dikendaki untuk lokasi penempatan </li>
                <li>Lakukan persetujuan dengan klik centang pada 2 poin terakhir</li>
                <li>Klik tombol "Submit All"</li>
                <li>Setelah Anda dipastikan lolos seleksi berkas oleh Tim Verifikator, lakukan login kembali dan cetak Kartu Tanda Pendaftaran </li>
                <li>Kartu Tanda Pendaftaran digunakan sebagai tanda ketika melakukan Tes Tulis dan Wawancara</li>
            </ol>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="content">
            <h2>
                <b>Pengumuman</b>
            </h2>
            <p>Silakan mendownload berkas-berkas penting berikut</p>
            <a href="{{asset('download/Daftar-formulir-penerimaan-BSPS-2018.zip')}}" class="button is-link">
                <span class="icon is-small">
                    <i class="fa fa-download"></i>
                </span>
                <span>Download berkas formulir peneriman</span>
            </a>
            <a href="{{asset('download/pengumuman-rekrutmen-tenaga-pendamping-BSPS-2018-new.pdf')}}" class="button is-primary">
                <span class="icon is-small">
                    <i class="fa fa-download"></i>
                </span>
                <span>Download pengumuman BSPS 2018</span>
            </a>
        </div>
        <div class="content">
            <ol>
                <li>Seleksi Penerimaan Tenaga Pendamping (KORFAS dan TFL) Kegiatan BSPS Provinsi Jawa Timur Tahun 2018 <b>TIDAK DIPUNGUT BIAYA</b></li>
                <li>Segala biaya/akomodasi/transportasi selama mengikuti proses seleksi ditanggung oleh Pelamar.</li>
                <li>Panitia membuka jalur layanan bantuan melalui telephone (hotline) bagi para pelamar pada hari dan jam kerja
                    Senin-Jumat pukul 09.00-16.00 WIB selama periode pendaftaran pada tanggal 19 Maret s.d 22 Maret 2018.
                    (Panitia tidak melayani Whatsapp & SMS).
                    <br>
                    <i>(Untuk detail kontak silakan menuju bagian <a href="{{url('contact-person')}}">kontak person</a>)</i>
                </li>
                <li>Berkas lamaran yang diterima panitia menjadi milik panitia dan tidak dapat diminta kembali oleh pelamar.</li>
            </ol>
        </div>
    </div>
</section>
@endsection 

@push('scripts')
<!-- Js -->
@endpush