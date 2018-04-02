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
<section class="section">
    <div class="container">
        <div class="content has-text-centered">
            <h2>
                <b>PENGUMUMAN</b>
            </h2>
        </div>
        <div class="content">
            <p>Disampaikan Kepada Seluruh Pelamar Calon Tenaga Pendamping BSPS Provinsi Jawa Timur Tahun 2018, silakan login untuk melihat Pengumuman Hasil Seleksi</p>
            <br>
            <p>Demikian disampaikan terimakasih.</p>
        </div>
    </div>
</section>
@else
<section class="section">
    <div class="container">
        @if($pelamar_lolos = \App\Models\PelamarLolos::where('id_pelamar', Auth::user()->id_pelamar)->first())
        <div class="content">
            <h2>
                <b>Hai, Saudara/i {{Auth::user()->nama_lengkap}}</b>
            </h2>
            <h2><b>SELAMAT! ANDA DINYATAKAN LOLOS SELEKSI</b></h2>
            <p>Untuk daftar seluruh peserta yang lolos bisa di download di bawah</p>
            <a href="{{url('download/applicant-lolos-seleksi.pdf')}}" class="button is-link">
                <span class="icon is-small">
                    <i class="fa fa-download"></i>
                </span>
                <span>DOWNLOAD DAFTAR PESERTA LOLOS</span>
            </a>
        </div>
        @if($pelamar_lolos->status == 0)
        <div class="content" style="border: 1px solid #000; padding: 1.5rem;">
            <form action="{{action('FunctionController@actionAgreeWithResult')}}" method="POST">
                {{csrf_field()}}
                <div class="field is-grouped is-grouped-centered">
                    <div class="control">
                        <label class="checkbox">
                            <input type="checkbox" required>
                            Dengan ini saya menyatakan bersedia menjadi {{$pelamar_lolos->jabatan_lamaran->nama}} dan ditempatkan di {{$pelamar_lolos->penempatan->nama_penempatan}}
                        </label>
                    </div>
                </div>
                <div class="field is-grouped is-grouped-centered">
                    <div class="control">
                        <button class="button is-primary">Ya, saya setuju</button>
                    </div>
                </div>
            </form>
        </div>
        @else
        <p><b>Anda sudah menyetujui untuk menjadi {{$pelamar_lolos->jabatan_lamaran->nama}} dan ditempatkan di {{$pelamar_lolos->penempatan->nama_penempatan}}</b></p>
        @endif
        @else
        <div class="content">
            <h2>
                <b>Hai, Saudara/i {{Auth::user()->nama_lengkap}}</b>
            </h2>
                <h2><b>MAAF, ANDA DINYATAKAN TIDAK LOLOS SELEKSI</b></h2>
        </div>
        @endif
    </div>
</section>
@endif
@endsection 

@push('scripts')
<!-- Js -->
@endpush