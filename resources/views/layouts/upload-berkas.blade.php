@push('meta')
<!-- Meta Tag -->
@endpush 

@extends('app')
@section('content')
@include('layouts/nav-header')
<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-8">
                @if($berkas_lamaran->status == 0)
                <div class="content">
                    <h2>Silakan upload berkas-berkas Anda, berkas dapat berupa <b>file gambar maupun pdf dengan Maks. size 25 MB</b></h2>
                </div>
                <div class="field">
                    <label class="label">NIK</label>
                    <div class="control">
                        <input class="input" type="text" value="{{$pelamar->nik}}" disabled>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Nama Lengkap</label>
                    <div class="control">
                        <input class="input" type="text" value="{{$pelamar->nama_lengkap}}" disabled>
                    </div>
                </div>
                <hr>
                <form action="{{action('FunctionController@actionPelamarUploadBerkas')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="field is-grouped">
                        <div class="control">
                            <label class="label">a. Scan foto 4x6 (Background merah)</label>
                        </div>
                        @if(empty($berkas_lamaran->file_foto))
                        <div class="control">
                            <small>
                                <i style="color: #ff3860">(Wajib diupload)</i>
                            </small>
                        </div>
                        @else
                        <div class="control">
                            <span class="icon is-success is-rounded">
                                <i class="fa fa-check"></i>
                            </span>
                        </div>
                        <div class="control">
                            <a href="{{asset($berkas_lamaran->file_foto)}}" target="_blank">
                                <i>(Lihat upload)</i>
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <div class="file has-name is-fullwidth">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="file_foto">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fa fa-upload"></i>
                                        </span>
                                        <span class="file-label">
                                            Choose a file…
                                        </span>
                                    </span>
                                    <span class="file-name" for="file_foto">
                                        ...
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="control">
                            <button class="button is-link">Upload</button>
                        </div>
                    </div>
                    <hr>
                    <div class="field is-grouped">
                        <div class="control">
                            <label class="label">b. Scan Kartu Tanda Penduduk</label>
                        </div>
                        @if(empty($berkas_lamaran->file_ktp))
                        <div class="control">
                            <small>
                                <i style="color: #ff3860">(Wajib diupload)</i>
                            </small>
                        </div>
                        @else
                        <div class="control">
                            <span class="icon is-success is-rounded">
                                <i class="fa fa-check"></i>
                            </span>
                        </div>
                        <div class="control">
                            <a href="{{asset($berkas_lamaran->file_ktp)}}" target="_blank">
                                <i>(Lihat upload)</i>
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <div class="file has-name is-fullwidth">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="file_ktp">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fa fa-upload"></i>
                                        </span>
                                        <span class="file-label">
                                            Choose a file…
                                        </span>
                                    </span>
                                    <span class="file-name" for="file_ktp">
                                        ...
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="control">
                            <button class="button is-link">Upload</button>
                        </div>
                    </div>
                    <hr>
                    <div class="field is-grouped">
                        <div class="control">
                            <label class="label">c. Scan Nomor Pokok Wajib Pajak</label>
                        </div>
                        @if(empty($berkas_lamaran->file_npwp))
                        <div class="control">
                            <small>
                                <i style="color: #ff3860">(Wajib diupload)</i>
                            </small>
                        </div>
                        @else
                        <div class="control">
                            <span class="icon is-success is-rounded">
                                <i class="fa fa-check"></i>
                            </span>
                        </div>
                        <div class="control">
                            <a href="{{asset($berkas_lamaran->file_npwp)}}" target="_blank">
                                <i>(Lihat upload)</i>
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <div class="file has-name is-fullwidth">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="file_npwp">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fa fa-upload"></i>
                                        </span>
                                        <span class="file-label">
                                            Choose a file…
                                        </span>
                                    </span>
                                    <span class="file-name" for="file_npwp">
                                        ...
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="control">
                            <button class="button is-link">Upload</button>
                        </div>
                    </div>
                    <hr>
                    <div class="field is-grouped">
                        <div class="control">
                            <label class="label">d. Scan Surat Keterangan Sehat Jasmani dan Rohani</label>
                        </div>
                        @if(empty($berkas_lamaran->file_keterangan_sehat))
                        <div class="control">
                            <small>
                                <i style="color: #ff3860">(Wajib diupload)</i>
                            </small>
                        </div>
                        @else
                        <div class="control">
                            <span class="icon is-success is-rounded">
                                <i class="fa fa-check"></i>
                            </span>
                        </div>
                        <div class="control">
                            <a href="{{asset($berkas_lamaran->file_keterangan_sehat)}}" target="_blank">
                                <i>(Lihat upload)</i>
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <div class="file has-name is-fullwidth">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="file_keterangan_sehat">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fa fa-upload"></i>
                                        </span>
                                        <span class="file-label">
                                            Choose a file…
                                        </span>
                                    </span>
                                    <span class="file-name" for="file_keterangan_sehat">
                                        ...
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="control">
                            <button class="button is-link">Upload</button>
                        </div>
                    </div>
                    <hr>
                    <div class="field is-grouped">
                        <div class="control">
                            <label class="label">e. Scan Surat Lamaran</label>
                        </div>
                        @if(empty($berkas_lamaran->file_surat_lamaran))
                        <div class="control">
                            <small>
                                <i style="color: #ff3860">(Wajib diupload)</i>
                            </small>
                        </div>
                        @else
                        <div class="control">
                            <span class="icon is-success is-rounded">
                                <i class="fa fa-check"></i>
                            </span>
                        </div>
                        <div class="control">
                            <a href="{{asset($berkas_lamaran->file_surat_lamaran)}}" target="_blank">
                                <i>(Lihat upload)</i>
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <div class="file has-name is-fullwidth">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="file_surat_lamaran">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fa fa-upload"></i>
                                        </span>
                                        <span class="file-label">
                                            Choose a file…
                                        </span>
                                    </span>
                                    <span class="file-name" for="file_surat_lamaran">
                                        ...
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="control">
                            <button class="button is-link">Upload</button>
                        </div>
                    </div>
                    <hr>
                    <div class="field is-grouped">
                        <div class="control">
                            <label class="label">f. Scan Daftar Riwayat Hidup</label>
                        </div>
                        @if(empty($berkas_lamaran->file_cv))
                        <div class="control">
                            <small>
                                <i style="color: #ff3860">(Wajib diupload)</i>
                            </small>
                        </div>
                        @else
                        <div class="control">
                            <span class="icon is-success is-rounded">
                                <i class="fa fa-check"></i>
                            </span>
                        </div>
                        <div class="control">
                            <a href="{{asset($berkas_lamaran->file_cv)}}" target="_blank">
                                <i>(Lihat upload)</i>
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <div class="file has-name is-fullwidth">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="file_cv">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fa fa-upload"></i>
                                        </span>
                                        <span class="file-label">
                                            Choose a file…
                                        </span>
                                    </span>
                                    <span class="file-name" for="file_cv">
                                        ...
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="control">
                            <button class="button is-link">Upload</button>
                        </div>
                    </div>
                    <hr>
                    <div class="field is-grouped">
                        <div class="control">
                            <label class="label">g. Scan Ijazah Terakhir</label>
                        </div>
                        @if(empty($berkas_lamaran->file_ijazah))
                        <div class="control">
                            <small>
                                <i style="color: #ff3860">(Wajib diupload)</i>
                            </small>
                        </div>
                        @else
                        <div class="control">
                            <span class="icon is-success is-rounded">
                                <i class="fa fa-check"></i>
                            </span>
                        </div>
                        <div class="control">
                            <a href="{{asset($berkas_lamaran->file_ijazah)}}" target="_blank">
                                <i>(Lihat upload)</i>
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <div class="file has-name is-fullwidth">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="file_ijazah">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fa fa-upload"></i>
                                        </span>
                                        <span class="file-label">
                                            Choose a file…
                                        </span>
                                    </span>
                                    <span class="file-name" for="file_ijazah">
                                        ...
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="control">
                            <button class="button is-link">Upload</button>
                        </div>
                    </div>
                    <hr>
                    <div class="field is-grouped">
                        <div class="control">
                            <label class="label">h. Scan Transkrip</label>
                        </div>
                        @if(empty($berkas_lamaran->file_transkrip))
                        <div class="control">
                            <small>
                                <i style="color: #ff3860">(Wajib diupload)</i>
                            </small>
                        </div>
                        @else
                        <div class="control">
                            <span class="icon is-success is-rounded">
                                <i class="fa fa-check"></i>
                            </span>
                        </div>
                        <div class="control">
                            <a href="{{asset($berkas_lamaran->file_transkrip)}}" target="_blank">
                                <i>(Lihat upload)</i>
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <div class="file has-name is-fullwidth">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="file_transkrip">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fa fa-upload"></i>
                                        </span>
                                        <span class="file-label">
                                            Choose a file…
                                        </span>
                                    </span>
                                    <span class="file-name" for="file_transkrip">
                                        ...
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="control">
                            <button class="button is-link">Upload</button>
                        </div>
                    </div>
                    <hr>
                    <div class="field is-grouped">
                        <div class="control">
                            <label class="label">i. Scan SKCK yang masih berlaku</label>
                        </div>
                        @if(empty($berkas_lamaran->file_skck))
                        <div class="control">
                            <small>
                                <i style="color: #ff3860">(Wajib diupload)</i>
                            </small>
                        </div>
                        @else
                        <div class="control">
                            <span class="icon is-success is-rounded">
                                <i class="fa fa-check"></i>
                            </span>
                        </div>
                        <div class="control">
                            <a href="{{asset($berkas_lamaran->file_skck)}}" target="_blank">
                                <i>(Lihat upload)</i>
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <div class="file has-name is-fullwidth">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="file_skck">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fa fa-upload"></i>
                                        </span>
                                        <span class="file-label">
                                            Choose a file…
                                        </span>
                                    </span>
                                    <span class="file-name" for="file_skck">
                                        ...
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="control">
                            <button class="button is-link">Upload</button>
                        </div>
                    </div>
                    <hr>
                    <div class="field is-grouped">
                        <div class="control">
                            <label class="label">j. Scan Surat Keterangan bebas narkoba, psikotropika, dan zat adiktif lainnya</label>
                        </div>
                        @if(empty($berkas_lamaran->file_bebas_narkoba))
                        <div class="control">
                            <small>
                                <i style="color: #ff3860">(Wajib diupload)</i>
                            </small>
                        </div>
                        @else
                        <div class="control">
                            <span class="icon is-success is-rounded">
                                <i class="fa fa-check"></i>
                            </span>
                        </div>
                        <div class="control">
                            <a href="{{asset($berkas_lamaran->file_bebas_narkoba)}}" target="_blank">
                                <i>(Lihat upload)</i>
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <div class="file has-name is-fullwidth">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="file_bebas_narkoba">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fa fa-upload"></i>
                                        </span>
                                        <span class="file-label">
                                            Choose a file…
                                        </span>
                                    </span>
                                    <span class="file-name" for="file_bebas_narkoba">
                                        ...
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="control">
                            <button class="button is-link">Upload</button>
                        </div>
                    </div>
                    <hr>
                    <div class="field is-grouped">
                        <div class="control">
                            <label class="label">k. Scan Surat Keterangan pengalaman kerja sejenis</label>
                        </div>
                        @if(empty($berkas_lamaran->file_keterangan_pengalaman))
                        <div class="control">
                            <small>
                                <i style="color: #ff3860">(Jika ada)</i>
                            </small>
                        </div>
                        @else
                        <div class="control">
                            <span class="icon is-success is-rounded">
                                <i class="fa fa-check"></i>
                            </span>
                        </div>
                        <div class="control">
                            <a href="{{asset($berkas_lamaran->file_keterangan_pengalaman)}}" target="_blank">
                                <i>(Lihat upload)</i>
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <div class="file has-name is-fullwidth">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="file_keterangan_pengalaman">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fa fa-upload"></i>
                                        </span>
                                        <span class="file-label">
                                            Choose a file…
                                        </span>
                                    </span>
                                    <span class="file-name" for="file_keterangan_pengalaman">
                                        ...
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="control">
                            <button class="button is-link">Upload</button>
                        </div>
                    </div>
                    <hr>
                    <div class="field is-grouped">
                        <div class="control">
                            <label class="label">l. Scan sertifikat kursus/pelatihan Keahlian khusus terkait</label>
                        </div>
                        @if(empty($berkas_lamaran->file_sertifikat))
                        <div class="control">
                            <small>
                                <i style="color: #ff3860">(Jika ada)</i>
                            </small>
                        </div>
                        @else
                        <div class="control">
                            <span class="icon is-success is-rounded">
                                <i class="fa fa-check"></i>
                            </span>
                        </div>
                        <div class="control">
                            <a href="{{asset($berkas_lamaran->file_sertifikat)}}" target="_blank">
                                <i>(Lihat upload)</i>
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <div class="file has-name is-fullwidth">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="file_sertifikat">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fa fa-upload"></i>
                                        </span>
                                        <span class="file-label">
                                            Choose a file…
                                        </span>
                                    </span>
                                    <span class="file-name" for="file_sertifikat">
                                        ...
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="control">
                            <button class="button is-link">Upload</button>
                        </div>
                    </div>
                    <hr>
                    <div class="field is-grouped">
                        <div class="control">
                            <label class="label">m. Scan Surat Pernyataan Bukan PNS, pengurus LSM,
                                <br> bukan anggota dan simpatisan partai politik serta bukan
                                <br> tim sukses dari calon kepala desa, calon pasangan kepala daerah,
                                <br> dan calon pasangan Presiden Republik Indonesia dan
                                <br> Surat Pernyataan bersedia bekerja penuh waktu (full time)
                                <br> sesuai dengan jam kerja selama masa kontrak (bermaterai)
                                <br> dengan format terlampir</label>
                        </div>
                        @if(empty($berkas_lamaran->file_bukan_pns))
                        <div class="control">
                            <small>
                                <i style="color: #ff3860">(Wajib diupload)</i>
                            </small>
                        </div>
                        @else
                        <div class="control">
                            <span class="icon is-success is-rounded">
                                <i class="fa fa-check"></i>
                            </span>
                        </div>
                        <div class="control">
                            <a href="{{asset($berkas_lamaran->file_bukan_pns)}}" target="_blank">
                                <i>(Lihat upload)</i>
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <div class="file has-name is-fullwidth">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="file_bukan_pns">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fa fa-upload"></i>
                                        </span>
                                        <span class="file-label">
                                            Choose a file…
                                        </span>
                                    </span>
                                    <span class="file-name" for="file_bukan_pns">
                                        ...
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="control">
                            <button class="button is-link">Upload</button>
                        </div>
                    </div>
                    <hr>
                    <div class="field is-grouped">
                        <div class="control">
                            <label class="label">n. Scan BPJS</label>
                        </div>
                        @if(empty($berkas_lamaran->file_bpjs))
                        <div class="control">
                            <small>
                                <i style="color: #ff3860">(Jika ada)</i>
                            </small>
                        </div>
                        @else
                        <div class="control">
                            <span class="icon is-success is-rounded">
                                <i class="fa fa-check"></i>
                            </span>
                        </div>
                        <div class="control">
                            <a href="{{asset($berkas_lamaran->file_bpjs)}}" target="_blank">
                                <i>(Lihat upload)</i>
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <div class="file has-name is-fullwidth">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="file_bpjs">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fa fa-upload"></i>
                                        </span>
                                        <span class="file-label">
                                            Choose a file…
                                        </span>
                                    </span>
                                    <span class="file-name" for="file_bpjs">
                                        ...
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="control">
                            <button class="button is-link">Upload</button>
                        </div>
                    </div>
                    <input class="input" type="hidden" name="jenis_file">
                    <hr>
                    <div class="content has-text-centered">
                        <h2>Isikan tambahan informasi yang kami perlukan, kemudian klik "Submit All"</h2>
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <label class="label">Satukan semua file di atas dalam bentuk pdf kemudian upload sebagai pertimbangan kami</label>
                        </div>
                        @if(empty($berkas_lamaran->file_summary))
                        <div class="control">
                            <small>
                                <i style="color: #ff3860">(Wajib diupload)</i>
                            </small>
                        </div>
                        @else
                        <div class="control">
                            <span class="icon is-success is-rounded">
                                <i class="fa fa-check"></i>
                            </span>
                        </div>
                        <div class="control">
                            <a href="{{asset($berkas_lamaran->file_summary)}}" target="_blank">
                                <i>(Lihat upload)</i>
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="field is-grouped">
                        <div class="control">
                            <div class="file has-name is-fullwidth">
                                <label class="file-label">
                                    <input class="file-input" type="file" name="file_summary">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fa fa-upload"></i>
                                        </span>
                                        <span class="file-label">
                                            Choose a file…
                                        </span>
                                    </span>
                                    <span class="file-name" for="file_summary">
                                        ...
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="control">
                            <button class="button is-link">Upload</button>
                        </div>
                    </div>
                    </form>
                    <hr>
                    <form action="{{action('FunctionController@actionPelamarFinishUpload')}}" method="POST">
                    {{csrf_field()}}
                    <div class="field">
                        <label class="label">Jika Anda belum mengisi email, silakan isi email di sini agar kami dapat menghubungi Anda</label>
                        <div class="control">
                            <input class="input" type="text" name="email" value="{{$pelamar->email}}" placeholder="email Anda" required>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Mohon pilih 1 lokasi yang Anda kehendaki untuk penempatan</label>
                        <div class="control">
                            <div class="select">
                                <select name="penempatan" required>
                                    <option value="">Pilih satu lokasi</option>
                                    @foreach($list_penempatan as $penempatan)
                                    @if($penempatan->id_penempatan == 11 || $penempatan->id_penempatan == 19)
                                    <option value="{{$penempatan->id_penempatan}}">{{$penempatan->nama_penempatan}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <label class="checkbox">
                                <input type="checkbox" required>
                                    Saya menyetujui bahwa apa yang saya upload ini benar dan dapat dipertanggungjawabkan di kemudian hari.
                            </label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <label class="checkbox">
                                <input type="checkbox" required>
                                Saya menyelesaikan proses pengupload an berkas ini dan siap untuk diverifikasi
                            </label>
                        </div>
                    </div>
                    <div class="field is-grouped is-grouped-right">
                        <div class="control">
                            <button class="button is-primary">Submit All</button>
                        </div>
                    </div>
                </form>
                @else
                <div class="field">
                    <label class="label">NIK</label>
                    <div class="control">
                        <input class="input" type="text" value="{{$pelamar->nik}}" disabled>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Nama Lengkap</label>
                    <div class="control">
                        <input class="input" type="text" value="{{$pelamar->nama_lengkap}}" disabled>
                    </div>
                </div>
                <hr>
                <div class="content">
                    <h2>Anda sudah selesai mengupload berkas-berkas Anda</h2>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection 

@push('scripts')
<!-- Js -->
<script>
    $(document).on('change', '.file-input', function() {
        var file = this;
        var name = $(this).attr('name');
        if(file.files.length > 0){
            $('span[for="'+name+'"]').html(file.files[0].name);
            $('input[name="jenis_file"]').val(name);
        }
    });
</script>
@endpush