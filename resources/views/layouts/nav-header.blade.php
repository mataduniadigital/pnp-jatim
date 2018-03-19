<nav class="navbar is-link">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{url('/')}}">
                <b>Pendaftaran PNP Jatim</b>
            </a>
            <div class="navbar-burger burger" data-target="main-navigation">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div id="main-navigation" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="{{url('/')}}">
                    Home
                </a>
                <a class="navbar-item" href="{{url('daftar')}}">
                    Pendaftaran
                </a>
                <a class="navbar-item" href="{{url('pengumuman-berkas')}}">
                    Pengumuman Berkas
                </a>
                <a class="navbar-item" href="{{url('contact-person')}}">
                    Contact Person
                </a>
            </div>

            @if(Auth::check())
            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="field is-grouped is-grouped-multiline">
                        <p class="control">
                            <a class="button is-primary" href="{{url('upload-berkas')}}">
                                <span class="icon">
                                    <i class="fa fa-upload"></i>
                                </span>
                                <span>Upload Berkas</span>
                            </a>
                        </p>
                        <p class="control">
                            <a class="button is-warning" href="{{url('signout')}}">
                                <span class="icon">
                                    <i class="fa fa-sign-out"></i>
                                </span>
                                <span>Log out</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</nav>
<section class="hero is-link is-bold">
    <div class="hero-body">
        <div class="container">
            <article class="media">
                <figure class="media-left">
                    <p class="image is-64x64">
                        <img src="{{asset('images/kementerian-PU.png')}}">
                    </p>
                </figure>
                <div class="media-content">
                    <div class="content">
                        <h3 style="color: white;">
                            <b>KEMENTERIAN PEKERJAAN UMUM DAN PERUMAHAN RAKYAT
                                <br> DIREKTORAT JENDERAL PENYEDIAAN PERUMAHAN
                                <br> SNVT PENYEDIAAN PERUMAHAN PROVINSI JAWA TIMUR
                                <br>
                            </b>
                        </h3>
                        <small>Jl. Gayung Kebonsari No. 50 Surabaya 60233 Telp./Fax (031) 82516822 Email:
                            <a href="mailto:satkerperumahan.jatim@gmail.com">satkerperumahan.jatim@gmail.com</a>
                        </small>
                    </div>
                </div>
                <div class="media-right">
                </div>
            </article>
        </div>
    </div>
</section>