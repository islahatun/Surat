<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Surat Pengantar Pindah Penduduk</title>

    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 11pt; /* Diperkecil dari 12pt */
            line-height: 1.5; /* Jarak baris lebih rapat */
            margin: 20px;
        }

        /* Layout untuk Kop Surat Berlogo */
        .kop-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 5px;
        }
        .kop-logo {
            width: 15%;
            vertical-align: middle;
            text-align: center;
        }
        .kop-logo img {
            width: 65px; /* Disesuaikan agar seimbang dengan font baru */
            height: auto;
        }
        .kop-teks {
            width: 85%;
            text-align: center;
            line-height: 1.2;
            padding-right: 65px; /* Penyeimbang posisi tengah */
        }
        .kop-teks h4 {
            font-size: 13pt; /* Diperkecil dari 14pt */
            margin: 0;
            text-transform: uppercase;
        }
        .kop-teks p {
            font-size: 9pt; /* Diperkecil dari 10pt */
            margin: 0;
            font-style: italic;
        }

        .line {
            border-bottom: 3px solid black;
            border-top: 1px solid black;
            height: 2px;
            margin-top: 5px;
            margin-bottom: 15px;
        }

        .judul {
            text-align: center;
            font-weight: bold;
            text-decoration: underline;
            font-size: 13pt; /* Diperkecil dari 14pt */
            text-transform: uppercase;
        }

        .nomor {
            text-align: center;
            margin-bottom: 20px;
            font-size: 11pt;
        }

        table.isi-surat {
            width: 100%;
            border-collapse: collapse;
            margin-left: 15px;
            font-size: 11pt;
        }

        table.isi-surat td {
            padding: 3px 2px; /* Padding tabel dirapatkan */
            vertical-align: top;
        }

        .ttd {
            width: 40%;
            margin-left: auto;
            margin-top: 30px;
            text-align: center;
            line-height: 1.3;
            font-size: 11pt;
        }

        .nama-lurah {
            margin-top: 5px; /* Di-reset karena ruang kosong diisi QR Code */
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <table class="kop-table">
        <tr>
            <td class="kop-logo">
                <img src="{{ $_SERVER['DOCUMENT_ROOT'] . '/images/Logo_kabupaten_serang.png' }}" alt="Logo">
            </td>
            <td class="kop-teks">
                <h4>PEMERINTAH KABUPATEN SERANG</h4>
                <h4>KECAMATAN MANCAK</h4>
                <h4 style="font-size: 15pt;">KELURAHAN SANGIANG</h4>
                <p>Jl. Sangiang, Kecamatan Mancak, Kabupaten Serang, Provinsi Banten. Kode Pos: 42165.</p>
            </td>
        </tr>
    </table>
    <div class="line"></div>

    <div class="judul">
        SURAT KETERANGAN PINDAH PENDUDUK
    </div>

    <div class="nomor">
        NOMOR : {{ $surat->no_surat }}
    </div>

    <p style="text-align: justify; text-indent: 45px; margin: 0 0 10px 0;">
        Yang bertanda tangan di bawah ini, Kepala Desa Sangiang, Kecamatan Mancak, Kabupaten Serang, Provinsi Banten, menerangkan Permohonan Pindah Penduduk dengan data sebagai berikut :
    </p>

    <table class="isi-surat">
        <tr>
            <td width="35%">1. NIK</td>
            <td width="3%">:</td>
            <td>{{ $surat->penduduk->nik }}</td>
        </tr>
        <tr>
            <td>2. Nama Lengkap</td>
            <td>:</td>
            <td style="font-weight: bold;">{{ $surat->penduduk->nama }}</td>
        </tr>
        <tr>
            <td>3. Nomor Kartu Keluarga</td>
            <td>:</td>
            <td>{{ $surat->penduduk->no_kk }}</td>
        </tr>
        <tr>
            <td>4. Nama Kepala Keluarga</td>
            <td>:</td>
            <td>{{ $surat->penduduk->nama }}</td>
        </tr>
        <tr>
            <td>5. Alamat Sekarang</td>
            <td>:</td>
            <td>{{ $surat->penduduk->alamat }}</td>
        </tr>
        <tr>
            <td>6. Alamat Tujuan Pindah</td>
            <td>:</td>
            <td style="font-weight: bold;">{{ $surat->alamat_baru }}</td>
        </tr>
        <tr>
            <td>7. Jumlah Keluarga Yang Pindah</td>
            <td>:</td>
            <td>{{ $surat->jumlah_orang }} Orang</td>
        </tr>
    </table>

    <br>

    <p style="text-align: justify; text-indent: 45px; margin: 0 0 10px 0;">
        Adapun berkas persyaratan Permohonan Pindah Penduduk yang bersangkutan adalah sebagaimana terlampir.
    </p>

    <p style="text-align: justify; text-indent: 45px; margin: 0 0 10px 0;">
        Demikian surat pengantar ini kami buat dengan sebenarnya, untuk dapat dipergunakan sebagaimana mestinya.
    </p>

    <div class="ttd">
        Dikeluarkan di : Sangiang<br>
        Pada tanggal : {{ now()->translatedFormat('d F Y') }}
        <br><br>
        <strong>Kepala Desa Sangiang</strong>

        <div style="margin-top: 8px; margin-bottom: 8px;">
            @if(isset($qrcodeBase64))
                <img src="{{ $qrcodeBase64 }}" style="width: 75px; height: 75px;" alt="QR Code Verifikasi">
            @else
                <div style="height: 75px;"></div>
            @endif
        </div>

        <div class="nama-lurah">
            {{ $kepalaDesa->name ?? '(Nama Kepala Desa)' }}
        </div>

        <div style="font-size: 10pt; margin-top: 2px;">
            NIP. {{ $kepalaDesa->nik ?? '----------------------' }}
        </div>
    </div>

</body>

</html>