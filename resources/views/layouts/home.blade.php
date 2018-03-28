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
                <b>PENGUMUMAN</b>
            </h2>
        </div>
        <div class="content">
            <p>Disampaikan Kepada Seluruh Pelamar Calon Tenaga Pendamping BSPS Provinsi Jawa Timur Tahun 2018, Pengumuman Hasil Seleksi Penerimaan Calon Tenaga Pendamping masih dalam proses evaluasi dan DIUNDUR pada hari SENIN tanggal 02 April 2018</p>
            <br>
            <p>Demikian disampaikan terimakasih.</p>
        </div>
    </div>
</section>
@endsection 

@push('scripts')
<!-- Js -->
@endpush