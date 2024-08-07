<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            margin: 20px;
        }

        .header {
            text-align: center;
            font-family: 'Bookman Old Style', serif;
            margin-bottom: 20px;
        }

        .info-table {
            margin-bottom: 40px;
            width: 100%;
        }

        .info-table td {
            padding: 5px;
        }

        .signature {
            font-family: 'Bookman Old Style', serif;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 50px;
        }

        .signature .name {
            text-align: right;
        }

        .signature-logo {
            width: 100px; /* Adjust as needed */
        }

        .cut-line {
            border-top: 1px dashed #000;
            margin-top: 50px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="logo">
        <img src="{{ asset('assets/img/kop_pps.png') }}" alt="Logo PEKA">
    </div>

    <p class="header"><strong>BUKTI PENDAFTARAN PEKA 2024</strong></p>

    <table class="header">
        <tr>
            <td>No. Pendaftaran</td>
            <td>: {{ $pendaftar->id }}</td>
        </tr>
        <tr>
            <td>Nama lengkap</td>
            <td>: {{ $pendaftar->nama }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: {{ $pendaftar->alamat }}</td>
        </tr>
        <tr>
            <td>Asal Sekolah</td>
            <td>: {{ $pendaftar->sekolah }}</td>
        </tr>
        <tr>
            <td>No HP</td>
            <td>: {{ $pendaftar->no_hp }}</td>
        </tr>
        <tr>
            <td>Program Studi</td>
            <td>: {{ $pendaftar->prodi }}</td>
        </tr>
        <tr>
            <td>Pembayaran</td>
            <td>: LUNAS / BELUM LUNAS </td>
        </tr>
    </table>

    <div class="signature">
        <img src="{{ asset('assets/img/frame.png') }}" alt="Logo PEKA" class="signature-logo">
        <div class="name">
            <div>Anjani, {{ \Carbon\Carbon::now()->format('d F Y') }}</div>
            <div>Panitia yang Menerima,<br><br><br><br><br>………………………………</div>
        </div>
    </div>

    <div class="cut-line"></div>

    <p class="header"><strong>BUKTI PENDAFTARAN PEKA 2024</strong></p>

    <table class="header">
        <tr>
            <td>No. Pendaftaran</td>
            <td>: {{ $pendaftar->id }}</td>
        </tr>
        <tr>
            <td>Nama lengkap</td>
            <td>: {{ $pendaftar->nama }}</td>
        </tr>
        <tr>
            <td>No HP</td>
            <td>: {{ $pendaftar->no_hp }}</td>
        </tr>
        <tr>
            <td>Pembayaran</td>
            <td>: LUNAS / BELUM LUNAS </td>
        </tr>
    </table>

    <div class="signature">

        <div class="name">
            <div>Anjani, {{ \Carbon\Carbon::now()->format('d F Y') }}</div>
            <div>Panitia yang Menerima,<br><br><br><br><br>………………………………</div>
        </div>
    </div>

    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
