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
        <h4>PEMERINTAH KABUPATEN MANOKWARI</h4>
        <h4>DISTRIK MANOKWARI SELATAN</h4>
        <h4>KELURAHAN SOWI</h4>

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
        Kepala Kelurahan Sowi, menerangkan dengan sebenarnya bahwa :
    </p>

    <table>
        <tr>
            <td width="35%">Nama</td>
            <td width="5%">:</td>
            <td>{{ $penduduk->nama }}</td>
        </tr>

        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $penduduk->jenis_kelamin }}</td>
        </tr>

        <tr>
            <td>Tempat Tanggal Lahir</td>
            <td>:</td>
            <td>
                {{ $penduduk->tempat_lahir }},
                {{ \Carbon\Carbon::parse($penduduk->tanggal_lahir)->translatedFormat('d F Y') }}
            </td>
        </tr>

        <tr>
            <td>Status</td>
            <td>:</td>
            <td>{{ $penduduk->status_perkawinan }}</td>
        </tr>

        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>{{ $penduduk->agama }}</td>
        </tr>

        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>{{ $penduduk->pekerjaan }}</td>
        </tr>

        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $penduduk->alamat }}</td>
        </tr>

        <tr>
            <td>RT / RW</td>
            <td>:</td>
            <td>
                {{ $penduduk->rt ?? '-' }}
                /
                {{ $penduduk->rw ?? '-' }}
            </td>
        </tr>

        <tr>
            <td>Golongan Darah</td>
            <td>:</td>
            <td>{{ $penduduk->golongan_darah ?? '-' }}</td>
        </tr>
    </table>

    <br>

    <p style="text-align: justify">
        Adalah benar-benar warga penduduk Kelurahan Sowi,
        Distrik Manokwari Selatan, Kabupaten Manokwari.
        Mohon bantuannya agar yang bersangkutan dapat diberikan :
    </p>

    <p style="text-align:center; font-weight:bold;">
        KARTU TANDA PENDUDUK (KTP) / KARTU KELUARGA
    </p>

    <p>
        Demikian agar maklum.
    </p>

    <div class="ttd">
        Dikeluarkan di : Manokwari
        <br>

        Pada tanggal :
        {{ now()->translatedFormat('d F Y') }}

        <br><br><br>

        <strong>LURAH SOWI</strong>

        <div class="nama-lurah">
            {{ $lurah->nama ?? '(Nama Lurah)' }}
        </div>

        <div>
            NIP :
            {{ $lurah->nip ?? '' }}
        </div>
    </div>

</body>

</html>
```
