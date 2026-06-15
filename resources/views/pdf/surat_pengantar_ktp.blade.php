```blade
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 12pt;
            margin: 40px;
        }

        .header {
            text-align: center;
            line-height: 1.3;
        }

        .header h3,
        .header h4,
        .header p {
            margin: 0;
        }

        .line {
            border-bottom: 3px solid black;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .judul {
            text-align: center;
            font-weight: bold;
            text-decoration: underline;
        }

        .nomor {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
        }

        td {
            padding: 2px;
            vertical-align: top;
        }

        .ttd {
            width: 40%;
            margin-left: auto;
            margin-top: 40px;
            text-align: center;
        }

        .nama-lurah {
            margin-top: 80px;
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="header">
        <h4>PEMERINTAH KABUPATEN SERANG</h4>
        <h4>KELURAHAN SANGIANG</h4>

        <p>Jl. Trikora Sowi &nbsp;&nbsp;&nbsp; Telp. - &nbsp;&nbsp;&nbsp; Kode Pos :</p>
    </div>

    <div class="line"></div>

    <div class="judul">
        SURAT KETERANGAN
    </div>

    <div class="nomor">
        NOMOR : {{ $surat->no_surat }}
    </div>

    <p>
        Kepala Desa Sangiang, menerangkan dengan sebenarnya bahwa :
    </p>

    <table>
        <tr>
            <td width="35%">Nama</td>
            <td width="5%">:</td>
            <td>{{ $surat->penduduk->nama }}</td>
        </tr>

        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $surat->penduduk->jenis_kelamin }}</td>
        </tr>

        <tr>
            <td>Tempat Tanggal Lahir</td>
            <td>:</td>
            <td>
                {{ $surat->penduduk->tempat_lahir }},
                {{ \Carbon\Carbon::parse($surat->penduduk->tanggal_lahir)->translatedFormat('d F Y') }}
            </td>
        </tr>

        <tr>
            <td>Status</td>
            <td>:</td>
            <td>{{ $surat->penduduk->status_perkawinan }}</td>
        </tr>

        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>{{ $surat->penduduk->agama }}</td>
        </tr>

        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>{{ $surat->penduduk->pekerjaan }}</td>
        </tr>

        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $surat->penduduk->alamat }}</td>
        </tr>

        <tr>
            <td>Golongan Darah</td>
            <td>:</td>
            <td>{{ $surat->penduduk->golongan_darah ?? '-' }}</td>
        </tr>
    </table>

    <br>

    <p style="text-align: justify">
        Adalah benar-benar warga penduduk Desa Sangiang,
        Kabupaten Serang.
        Mohon bantuannya agar yang bersangkutan dapat diberikan :
    </p>

    <p style="text-align:center; font-weight:bold;">
        KARTU TANDA PENDUDUK (KTP)
    </p>

    <p>
        Demikian surat pengantar ini kami buat, untuk dapat dipergunakan sebagaimana mestinya.
    </p>

    <div class="ttd">
        Dikeluarkan di : Sangiang
        <br>

        Pada tanggal :
        {{ now()->translatedFormat('d F Y') }}

        <br><br><br>

        <strong>Kepala Desa Sangiang</strong>

        <div class="nama-lurah">
            {{ $kepalaDesa->name ?? '(Nama Kepala Desa)' }}
        </div>

        <div>
            NIP :
            {{ $kepalaDesa->nik ?? '' }}
        </div>
    </div>

</body>

</html>
```
