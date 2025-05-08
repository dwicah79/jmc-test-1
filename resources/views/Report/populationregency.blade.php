<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Kabupaten</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .footer {
            margin-top: 30px;
            text-align: right;
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Laporan Data Kabupaten</h1>
        @if ($selectedProvince)
            <h2>Provinsi: {{ $selectedProvince->name }}</h2>
        @endif
        <p>Dicetak pada: {{ now()->format('d F Y H:i:s') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kabupaten/Kota</th>
                <th>Provinsi</th>
                <th>Jumlah Penduduk</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($regencies as $regency)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $regency->name }}</td>
                    <td>{{ $regency->province->name }}</td>
                    <td>{{ number_format($regency->population, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data populasi kabupaten.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
