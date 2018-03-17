@push('meta')
<!-- Meta Tag -->
@endpush 

@extends('app', ['page' => 'home'])
@section('content')
<nav class="navbar is-link">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="https://bulma.io">
                <b>Pendaftaran Pnp Jatim</b>
            </a>
            <div class="navbar-burger burger" data-target="main-navigation">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div id="main-navigation" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="https://bulma.io/">
                    Home
                </a>
            </div>

            <div class="navbar-end">
            </div>
        </div>
    </div>
</nav>
<section class="section">
    <div class="container">
        <div class="content">
            <h2><b>Pengumuman</b></h2>
            <p>Untuk formulir dalam pendaftaran silakan di-download <a href="{{asset('download/Daftar-formulir-penerimaan-BSPS-2018.zip')}}">di sini</a>.</p>
            <p>Isi kemudian kirim untuk proses verifikasi.</p>
        </div>
        <div class="content">
            <h4><b>Lain - Lain</b></h4>
            <ol>
                <li>Seleksi Penerimaan Tenaga Pendamping (KORFAS dan TFL) Kegiatan BSPS Provinsi Jawa Timur Tahun 2018 TIDAK DIPUNGUT BIAYA.</li>
                <li>Segala biaya/akomodasi/transportasi selama mengikuti proses seleksi ditanggung oleh Pelamar.</li>
                <li>Panitia membuka jalur layanan bantuan melalui telephone (hotline) bagi para pelamar pada hari dan jam kerja Senin-Jumat pukul 09.00-16.00 WIB selama periode pendaftaran pada tanggal 14 Maret s.d 20 Maret 2018. (Panitia tidak melayani Whatsapp & SMS).</li>
                    <ul>
                        <li>Wicky Arya Pradana (0822-4032-8348)</li>
                        <li>Andhika Eko P.H (0853-3010-3441)</li>
                        <li>Graha Pandita (0813-3375-7091)</li>
            </ol>
    </div>
</section>
@endsection 

<script>
    document.addEventListener('DOMContentLoaded', function () {
    var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
        if ($navbarBurgers.length > 0) {
            $navbarBurgers.forEach(function ($el) {
                $el.addEventListener('click', function () {
                    // Get the target from the "data-target" attribute
                    var target = $el.dataset.target;
                    var $target = document.getElementById(target);

                    // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                    $el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');
                });
            });
        }
    });
</script>
@push('scripts')
@endpush