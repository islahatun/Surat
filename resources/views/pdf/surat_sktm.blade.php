<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Tidak Mampu</title>

    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 12pt;
            line-height: 1.6;
            margin: 40px;
        }

        .title {
            text-align: center;
            font-weight: bold;
            text-transform: uppercase;
        }

        .nomor {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            vertical-align: top;
            padding: 2px;
        }

        .ttd {
            margin-top: 50px;
            width: 100%;
        }

        .ttd-kanan {
            width: 40%;
            float: right;
            text-align: center;
        }

        .nama-kades {
            margin-top: 80px;
            font-weight: bold;
            text-decoration: underline;
        }

        .jabatan {
            font-weight: bold;
        }

        .catatan {
            margin-top: 80px;
            font-size: 10pt;
        }
    </style>
</head>

<body>

    <div class="title">
        SURAT KETERANGAN TIDAK MAMPU
    </div>

    <div class="nomor">
        Nomor : {{ $surat->no_surat }}
    </div>

    <p>
        Yang bertanda tangan dibawah ini, saya :
    </p>

    <table>
        <tr>
            <td width="30%">Nama</td>
            <td width="5%">:</td>
            <td>{{ $kepalaDesa->nama ?? 'Nama Kepala Desa' }}</td>
        </tr>

        <tr>
            <td>Tempat, Tgl Lahir</td>
            <td>:</td>
            <td>
                {{ $kepalaDesa->tempat_lahir ?? '-' }},
                {{ $kepalaDesa->tanggal_lahir ?? '-' }}
            </td>
        </tr>

        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $kepalaDesa->alamat ?? '-' }}</td>
        </tr>

        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td>Kepala Desa</td>
        </tr>
    </table>

    <br>

    <p>
        Dengan ini menerangkan bahwa :
    </p>

    <table>
        <tr>
            <td width="30%">Nama</td>
            <td width="5%">:</td>
            <td>{{ $penduduk->nama }}</td>
        </tr>

        <tr>
            <td>Tempat, Tgl Lahir</td>
            <td>:</td>
            <td>
                {{ $penduduk->tempat_lahir }},
                {{ \Carbon\Carbon::parse($penduduk->tanggal_lahir)->format('d-m-Y') }}
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $penduduk->alamat }}</td>
        </tr>

        <tr>
            <td>NIK</td>
            <td>:</td>
            <td>{{ $penduduk->nik }}</td>
        </tr>
    </table>

    <br>

    <p style="text-align: justify">
        Orang tersebut benar-benar penduduk Desa
        {{ $penduduk->desa ?? '....................' }}
        dan termasuk keluarga tidak mampu.
        Surat keterangan ini dipergunakan untuk
        <b>
            "Syarat Kelengkapan Administrasi Calon Penerima
            Beasiswa Bank Indonesia"
        </b>.
    </p>

    <p style="text-align: justify">
        Demikian surat keterangan ini kami buat dengan sebenarnya
        untuk dapat dipergunakan sebagaimana mestinya.
    </p>

    <div class="ttd">
        <div class="ttd-kanan">
            {{ $penduduk->kota ?? 'Kota' }},
            {{ now()->translatedFormat('d F Y') }}
            <br><br>

            <span class="jabatan">
                Kepala Desa
            </span>

            <div class="nama-kades">
                {{ $kepalaDesa->nama ?? 'Nama Kepala Desa' }}
            </div>
        </div>
    </div>

    <div style="clear: both;"></div>

    <div class="catatan">
        <b>Catatan :</b><br>
        Redaksi (isi keterangan) dapat ditambahkan menurut
        kebutuhan setempat dengan tidak mengurangi contoh aslinya.
    </div>

</body>

</html>