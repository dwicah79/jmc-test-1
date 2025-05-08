<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Provinsi</title>
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
        <h1>Laporan Data Provinsi</h1>
        <p>Dicetak pada: {{ now()->format('d F Y H:i:s') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Provinsi</th>
                <th>Jumlah Kabupaten</th>
                <th>Total Penduduk</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($provinces as $province)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $province->name }}</td>
                    <td>{{ $province->regencies_count }}</td>
                    <td>{{ number_format($province->regencies_sum_population, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
