<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Tidak Mampu</title>

    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 11pt;
            line-height: 1.6;
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
            width: 70px;
            height: auto;
        }
        .kop-teks {
            width: 85%;
            text-align: center;
            line-height: 1.3;
            padding-right: 70px; /* Penyeimbang posisi tengah */
        }
        .kop-teks h4 {
            font-size: 14pt;
            margin: 0;
            text-transform: uppercase;
        }
        .kop-teks p {
            font-size: 10pt;
            margin: 0;
            font-style: italic;
        }

        .line {
            border-bottom: 3px solid black;
            border-top: 1px solid black;
            height: 2px;
            margin-top: 5px;
            margin-bottom: 20px;
        }

        .nomor {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
            text-transform: uppercase;
        }

        table.isi-surat {
            width: 100%;
            border-collapse: collapse;
            margin-left: 15px;
        }

        table.isi-surat td {
            vertical-align: top;
            padding: 4px 2px;
        }

        .ttd {
            margin-top: 40px;
            width: 100%;
        }

        .ttd-kanan {
            width: 40%;
            float: right;
            text-align: center;
            line-height: 1.4;
        }

        .nama-kades {
            margin-top: 0px; /* Di-nol-kan karena diganti tinggi QR Code */
            font-weight: bold;
            text-decoration: underline;
        }

        .jabatan {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <table class="kop-table">
        <tr>
            <td class="kop-logo">
                <img src="{{ public_path('images/Logo_kabupaten_serang.png') }}" alt="Logo">
            </td>
            <td class="kop-teks">
                <h4>PEMERINTAH KABUPATEN SERANG</h4>
                <h4>KECAMATAN MANCAK</h4>
                <h4 style="font-size: 16pt;">KELURAHAN SANGIANG</h4>
                <p>Jl. Sangiang, Kecamatan Mancak, Kabupaten Serang, Provinsi Banten. Kode Pos: 42165.</p>
            </td>
        </tr>
    </table>
    <div class="line"></div>

    <div class="nomor">
        SURAT KETERANGAN TIDAK MAMPU
        <br>
        <span style="font-weight: normal;">Nomor : {{ $surat->no_surat }}</span>
    </div>

    <p style="text-align: justify; text-indent: 35px; margin-top: 5px; margin-bottom: 10px;">
        Yang bertanda tangan dibawah ini, saya :
    </p>

    <table class="isi-surat">
        <tr>
            <td width="30%">Nama</td>
            <td width="3%">:</td>
            <td>{{ $kepalaDesa->name ?? 'Nama Kepala Desa' }}</td>
        </tr>
        <tr>
            <td>NIP / NIK</td>
            <td>:</td>
            <td>{{ $kepalaDesa->nik ?? '----------------------' }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $kepalaDesa->alamat ?? 'Kantor Desa Sangiang, Kec. Mancak' }}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td class="jabatan">Kepala Desa Sangiang</td>
        </tr>
    </table>

    <br>

<p style="text-align: justify; text-indent: 45px; margin-top: 5px; margin-bottom: 10px;">
        Dengan ini menerangkan bahwa :
    </p>

    <table class="isi-surat">
        <tr>
            <td width="30%">Nama</td>
            <td width="3%">:</td>
            <td style="font-weight: bold;">{{ $surat->penduduk->nama }}</td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td>{{ $surat->penduduk->nik }}</td>
        </tr>
        <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td>:</td>
            <td>
                {{ $surat->penduduk->tempat_lahir }},
                {{ \Carbon\Carbon::parse($surat->penduduk->tanggal_lahir)->translatedFormat('d F Y') }}
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $surat->penduduk->alamat }}</td>
        </tr>
    </table>

    <br>

    <p style="text-align: justify; text-indent: 45px;">
        Orang tersebut di atas benar-benar penduduk Desa Sangiang, Kecamatan Mancak, Kabupaten Serang dan termasuk dalam kategori keluarga tidak mampu. Surat keterangan ini dipergunakan khusus untuk keperluan: 
        <strong>"{{ $surat->keterangan }}"</strong>.
    </p>

    <p style="text-align: justify; text-indent: 45px;">
        Demikian surat keterangan ini kami buat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.
    </p>

    <div class="ttd">
        <div class="ttd-kanan">
            Dikeluarkan di : Sangiang<br>
            {{ now()->translatedFormat('d F Y') }}
            <br><br>
            <span class="jabatan">Kepala Desa Sangiang</span>

            <div style="margin-top: 10px; margin-bottom: 10px;">
                @if(isset($qrcodeBase64))
                    <img src="{{ $qrcodeBase64 }}" style="width: 85px; height: 85px;" alt="QR Code Verifikasi">
                @else
                    <div style="height: 85px;"></div>
                @endif
            </div>

            <div class="nama-kades">
                {{ $kepalaDesa->name ?? '(Nama Kepala Desa)' }}
            </div>
        
            <div style="font-size: 11pt; margin-top: 2px;">
                NIP. {{ $kepalaDesa->nik ?? '----------------------' }}
            </div>
        </div>
    </div>

    <div style="clear: both;"></div>

</body>

</html>