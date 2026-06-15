<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Domisili</title>

    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 11pt; /* Diperkecil dari 12pt */
            line-height: 1.5; /* Jarak baris dirapatkan agar lebih padat */
            margin: 20px;
        }
        
        /* Layout untuk Kop Surat */
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
            width: 65px; /* Penyesuaian dimensi logo dengan teks baru */
            height: auto;
        }
        .kop-teks {
            width: 85%;
            text-align: center;
            line-height: 1.2;
            padding-right: 65px; /* Penyeimbang agar teks benar-benar di tengah */
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

        .nomor {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 13pt;
        }
        .nomor-sub {
            font-weight: normal;
            text-decoration: none;
            font-size: 11pt;
        }

        table.isi-surat {
            width: 100%;
            border-collapse: collapse;
            margin-left: 15px;
            font-size: 11pt;
        }
        table.isi-surat td {
            vertical-align: top;
            padding: 3px 2px; /* Padding baris dirapatkan */
        }

        .ttd {
            margin-top: 30px;
            width: 100%;
            font-size: 11pt;
        }
        .ttd-kanan {
            width: 40%;
            float: right;
            text-align: center;
            line-height: 1.3;
        }
        .nama-kades {
            margin-top: 5px; /* Reset margin karena ruang kosong diisi QR Code */
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

    <div class="nomor">
        SURAT KETERANGAN DOMISILI
        <div class="nomor-sub">Nomor : {{ $surat->no_surat }}</div>
    </div>

    <p style="text-align: justify; text-indent: 45px; margin: 0 0 10px 0;">
        Yang bertanda tangan dibawah ini, Kepala Desa Sangiang, Kecamatan Mancak, Kabupaten Serang, Provinsi Banten, menerangkan dengan sebenarnya bahwa :
    </p>

    <table class="isi-surat">
        <tr>
            <td width="30%">Nama</td>
            <td width="3%">:</td>
            <td style="font-weight: bold;">{{ $surat->penduduk->nama }}</td>
        </tr>
        <tr>
            <td>Tempat, Tgl Lahir</td>
            <td>:</td>
            <td>
                {{ $surat->penduduk->tempat_lahir }}, 
                {{ \Carbon\Carbon::parse($surat->penduduk->tanggal_lahir)->translatedFormat('d F Y') }}
            </td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $surat->penduduk->jenis_kelamin }}</td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td>{{ $surat->penduduk->nik }}</td>
        </tr>
        <tr>
            <td>Status Perkawinan</td>
            <td>:</td>
            <td>
                @switch($surat->penduduk->status_perkawinan)
                    @case('BK') Belum Kawin @break
                    @case('K') Kawin @break
                    @case('CH') Cerai Hidup @break
                    @case('CM') Cerai Mati @break
                    @default -
                @endswitch
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $surat->penduduk->alamat }}</td>
        </tr>
    </table>

    <br>

    <p style="text-align: justify; text-indent: 45px; margin: 0 0 10px 0;">
        Nama tersebut benar-benar penduduk Desa Sangiang, Kecamatan Mancak, Kabupaten Serang, Provinsi Banten, yang berdomisili di lingkungan kami lebih dari 6 bulan, dan surat keterangan ini dibuat untuk keperluan <strong>{{ $surat->keterangan }}</strong>.
    </p>

    <p style="text-align: justify; text-indent: 45px; margin: 0 0 10px 0;">
        Demikian surat keterangan ini kami buat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.
    </p>

    <div class="ttd">
        <div class="ttd-kanan">
            Sangiang, {{ now()->translatedFormat('d F Y') }}
            <br>
            <span class="jabatan">Kepala Desa Sangiang</span>

            <div style="margin-top: 8px; margin-bottom: 8px;">
                @if(isset($qrcodeBase64))
                    <img src="{{ $qrcodeBase64 }}" style="width: 75px; height: 75px;" alt="QR Code Verifikasi">
                @else
                    <div style="height: 75px;"></div>
                @endif
            </div>

            <div class="nama-kades">
                {{ $kepalaDesa->name ?? 'Nama Kepala Desa' }}
            </div>
            
            <div style="font-size: 10pt; margin-top: 2px;">
                NIP. {{ $kepalaDesa->nik ?? '----------------------' }} 
            </div>
        </div>
    </div>

    <div style="clear: both;"></div>

</body>
</html>