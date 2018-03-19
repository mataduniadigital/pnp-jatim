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
                    <i>(Untuk detail kontak silakan menuju bagian<a href="{{url('contact-person')}}">kontak person</a>)</i>
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