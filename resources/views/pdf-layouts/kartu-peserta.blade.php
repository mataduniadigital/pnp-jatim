<!DOCTYPE html>
<html>

<head>
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 800px;
            margin: auto;
            text-align: left;
            font-family: arial;
            padding: 0.5rem 2rem;
            position: absolute;
        }

        .title {
            color: grey;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="card">
        <h2 style="text-align:center">KARTU TANDA PESERTA</h2>
        <h3>NOMOR PESERTA: {{$berkas_lamaran->nomor_peserta}}</h3>
        <h1>{{$berkas_lamaran->nama_lengkap}} ({{$berkas_lamaran->nik}})</h1>
        <p class="title">Melamar di posisi {{$berkas_lamaran->nama_penempatan}}, di {{$berkas_lamaran->nama}}</p>
        <hr>
        <p class="title">Jadwal Ujian: 25 Maret 2018, pukul 08:00 WIB - selesai</p>
        <p class="title">Tempat Ujian: Universitas Maarif Hasyim Latif (UMAHA) Jln. Raya Megare No. 30 Taman, Sidoarjo</p>
        <p class="title">Ruang Ujian: </p>
        <hr>
        <p class="title" style="text-align: right;">Tertanda</p>
        <p class="title" style="text-align: right; margin-top: 3rem">({{$berkas_lamaran->nama_lengkap}})</p>
        <p class="title" style="text-align: left; font-size: 10px;">*Silakan cetak 2 lembar</p>
        <p class="title" style="text-align: left; font-size: 10px;">*Lembar pertama untuk peserta</p>
        <p class="title" style="text-align: left; font-size: 10px;">*Lembar kedua untuk verifikator</p>
    </div>
</body>

</html>
