<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Usaha</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
            line-height: 1.5;
        }
        .center {
            text-align: center;
        }
        .title {
            font-weight: bold;
        }
        table {
            width: 100%;
        }
        td {
            vertical-align: top;
            padding: 2px 0;
        }
        .section {
            margin-top: 20px;
        }
        .signature {
            margin-top: 50px;
            width: 100%;
        }
        .right {
            text-align: right;
        }
    </style>
</head>
<body>

<div class="center">
    <div class="title">SURAT KETERANGAN USAHA</div>
    <div>Nomor : {{ $nomor_surat ?? '.....................' }}</div>
</div>

<div class="section">
    <p>
        Yang bertanda tangan di bawah ini pengurus RT {{ $rt }} RW {{ $rw }}
        Kelurahan {{ $kelurahan }} Kecamatan {{ $kecamatan }}
        Kota {{ $kota }} dengan ini menerangkan :
    </p>

    <table>
        <tr>
            <td>Nama</td>
            <td>: {{ $nama }}</td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>: {{ $nik }}</td>
        </tr>
        <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td>: {{ $ttl }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: {{ $jenis_kelamin }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>: {{ $pekerjaan }}</td>
        </tr>
        <tr>
            <td>Alamat Tempat Tinggal</td>
            <td>: {{ $alamat }}</td>
        </tr>
        <tr>
            <td>Nomor Telepon/HP</td>
            <td>: {{ $no_hp }}</td>
        </tr>
    </table>

    <p>
        Bahwa yang namanya tersebut di atas benar mempunyai/memiliki usaha dengan identitas usaha sebagai berikut:
    </p>

    <table>
        <tr>
            <td>Nama Perusahaan</td>
            <td>: {{ $nama_usaha }}</td>
        </tr>
        <tr>
            <td>Bentuk Perusahaan</td>
            <td>: {{ $bentuk_usaha }}</td>
        </tr>
        <tr>
            <td>NPWP</td>
            <td>: {{ $npwp }}</td>
        </tr>
        <tr>
            <td>Kegiatan Usaha</td>
            <td>: {{ $kegiatan_usaha }}</td>
        </tr>
        <tr>
            <td>Sarana Usaha</td>
            <td>: {{ $sarana_usaha }}</td>
        </tr>
        <tr>
            <td>Alamat Tempat Usaha</td>
            <td>: {{ $alamat_usaha }}</td>
        </tr>
        <tr>
            <td>Jumlah Modal Usaha</td>
            <td>: Rp {{ number_format($modal_usaha, 0, ',', '.') }}</td>
        </tr>
    </table>

    <p class="section">
        Demikian Surat Keterangan Usaha diberikan kepada yang bersangkutan untuk dapat dipergunakan sebagaimana mestinya.
    </p>
</div>

<div class="signature">
    <table>
        <tr>
            <td class="center">
                Mengetahui,<br>
                Lurah {{ $kelurahan }}<br><br><br><br>
                ..................................
            </td>
            <td class="right">
                {{ $kota }}, {{ $tanggal }}<br>
                Ketua RT {{ $rt }} RW {{ $rw }}<br><br><br><br>
                ..................................
            </td>
        </tr>
    </table>
</div>

</body>
</html>