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
            margin: 20px;
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
        .line {
            border-bottom: 3px solid black;
            margin-top: 10px;
            margin-bottom: 20px;
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
    </style>
</head>

<body>

    <div class="header">
        <h4>PEMERINTAH KABUPATEN SERANG</h4>
        <h4>KELURAHAN SANGIANG</h4>

        <p>Jl. Sangiang, Kecamatan Mancak, Kabupaten Serang, Provinsi Banten. Kode Pos: 42165.</p>
    </div>
    <div class="line"></div>

    <div class="nomor">
        SURAT KETERANGAN TIDAK MAMPU
        <br>
        Nomor : {{ $surat->no_surat }}
    </div>

    <p>
        Yang bertanda tangan dibawah ini, saya :
    </p>

    <table>
        <tr>
            <td width="30%">Nama</td>
            <td width="5%">:</td>
            <td>{{ $kepalaDesa->name ?? 'Nama Kepala Desa' }}</td>
        </tr>

        <tr>
            <td>NIP</td>
            <td>:</td>
            <td>{{ $kepalaDesa->nik ?? 'NIP Kepala Desa' }}</td>
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
            <td>{{ $surat->penduduk->nama }}</td>
        </tr>

        <tr>
            <td>Tempat, Tgl Lahir</td>
            <td>:</td>
            <td>
                {{ $surat->penduduk->tempat_lahir }},
                {{ \Carbon\Carbon::parse($surat->penduduk->tanggal_lahir)->format('d-m-Y') }}
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $surat->penduduk->alamat }}</td>
        </tr>

        <tr>
            <td>NIK</td>
            <td>:</td>
            <td>{{ $surat->penduduk->nik }}</td>
        </tr>
    </table>

    <br>

    <p style="text-align: justify">
        Orang tersebut benar-benar penduduk Desa Sangiang
        dan termasuk keluarga tidak mampu.
        Surat keterangan ini dipergunakan untuk
        <b>
            "{{ $surat->keterangan }}"
        </b>.
    </p>

    <p style="text-align: justify">
        Demikian surat keterangan ini kami buat dengan sebenarnya
        untuk dapat dipergunakan sebagaimana mestinya.
    </p>

    <div class="ttd">
        <div class="ttd-kanan">
            Dikeluarkan di: Sangiang
            {{ now()->translatedFormat('d F Y') }}
            <br><br>

            <span class="jabatan">
                Kepala Desa
            </span>

            <div class="nama-kades">
                {{ $kepalaDesa->name ?? 'Nama Kepala Desa' }}
            </div>
            <div>
                NIP :
                {{ $kepalaDesa->nik ?? 'NIP Kepala Desa' }} 
            </div>
        </div>
    </div>

    <div style="clear: both;"></div>

</body>

</html>




