<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Pengantar Pindah</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12pt; }
        .center { text-align: center; }
        .line { margin-top: 20px; }
        .content { margin-top: 30px; }
        table { width: 100%; }
        td { vertical-align: top; padding: 2px 0; }
    </style>
</head>
<body>

<div class="center">
    <h3>SURAT PENGANTAR PINDAH</h3>
    <h4>ANTAR KABUPATEN/KOTA ATAU ANTAR PROVINSI</h4>
</div>

<p>Nomor : {{ $nomor_surat ?? '.........................' }}</p>

<div class="content">
    <p>Yang bertanda tangan di bawah ini, menerangkan Permohonan Pindah Penduduk WNI dengan data sebagai berikut :</p>

    <table>
        <tr>
            <td>1. NIK</td>
            <td>: {{ $nik }}</td>
        </tr>
        <tr>
            <td>2. Nama Lengkap</td>
            <td>: {{ $nama }}</td>
        </tr>
        <tr>
            <td>3. Nomor Kartu Keluarga</td>
            <td>: {{ $no_kk }}</td>
        </tr>
        <tr>
            <td>4. Nama Kepala Keluarga</td>
            <td>: {{ $kepala_keluarga }}</td>
        </tr>
        <tr>
            <td>5. Alamat Sekarang</td>
            <td>: {{ $alamat_sekarang }}</td>
        </tr>
        <tr>
            <td>6. Alamat Tujuan Pindah</td>
            <td>: {{ $alamat_tujuan }}</td>
        </tr>
        <tr>
            <td>7. Jumlah Keluarga Yang Pindah</td>
            <td>: {{ $jumlah_keluarga }} Orang</td>
        </tr>
    </table>

    <p class="line">
        Adapun Permohonan Pindah Penduduk WNI yang bersangkutan sebagaimana terlampir.
    </p>

    <p>
        Demikian Surat Pengantar Pindah ini dibuat agar digunakan sebagaimana mestinya.
    </p>

    <br><br>

    <div style="width: 100%; text-align: right;">
        <p>{{ $kota ?? '............' }}, {{ $tanggal ?? '.....................' }}</p>
        <p><b>Camat {{ $kecamatan ?? '.....................' }}</b></p>

        <br><br><br>

        <p><b>( {{ $nama_camat ?? '.....................' }} )</b></p>
    </div>
</div>

</body>
</html>