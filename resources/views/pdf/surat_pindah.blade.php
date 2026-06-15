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

        <p>Jl. Sangiang, Kecamatan Mancak, Kabupaten Serang, Provinsi Banten. Kode Pos: 42165.</p>
    </div>

    <div class="line"></div>

    <div class="judul">
        SURAT KETERANGAN
    </div>

    <div class="nomor">
        NOMOR : {{ $surat->no_surat }}
    </div>

    <p>
        Yang bertanda tangan di bawah ini, menerangkan Permohonan Pindah Penduduk dengan data sebagai berikut :
    </p>

    <table>
        <tr>
            <td>1. NIK</td>
            <td>: {{ $surat->penduduk->nik }}</td>
        </tr>
        <tr>
            <td>2. Nama Lengkap</td>
            <td>: {{ $surat->penduduk->nama }}</td>
        </tr>
        <tr>
            <td>3. Nomor Kartu Keluarga</td>
            <td>: {{ $surat->penduduk->no_kk }}</td>
        </tr>
        <tr>
            <td>4. Nama Kepala Keluarga</td>
            <td>: {{ $surat->penduduk->nama}}</td>
        </tr>
        <tr>
            <td>5. Alamat Sekarang</td>
            <td>: {{ $surat->penduduk->alamat }}</td>
        </tr>
        <tr>
            <td>6. Alamat Tujuan Pindah</td>
            <td>: {{ $surat->alamat_baru }}</td>
        </tr>
        <tr>
            <td>7. Jumlah Keluarga Yang Pindah</td>
            <td>: {{ $surat->jumlah_orang }} Orang</td>
        </tr>
    </table>

    <br>

    <p style="text-align: justify">
        Adapun Permohonan Pindah Penduduk  yang bersangkutan sebagaimana terlampir.
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
