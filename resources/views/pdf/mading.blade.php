<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pdf</title>
    
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 2rem 0;
        }

        .header {
            margin-bottom: 1.5rem;
            text-align: center;
            padding: 1rem;
            color: black;
            border-radius: 0.5rem;
        }

        .header h1 {
            font-size: 2rem;
            font-weight: bold;
            margin: 0;
        }

        .table-container {
            display: flex;
            justify-content: center;
            width: 100%;
            margin-top: 2rem;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .table thead {
            background-color: #343a40;
            color: white;
        }

        .table th, .table td {
            padding: 1rem;
            text-align: left;
        }

        .table th {
            font-size: 1rem;
            text-transform: uppercase;
        }

        .table tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        .table tbody tr:nth-child(even) {
            background-color: #e9ecef;
        }

        .table tbody tr:hover {
            background-color: #dee2e6;
        }

        .table th, .table td {
            border-bottom: 1px solid #dee2e6;
        }

        .table th:last-child, .table td:last-child {
            border-right: 0;
        }

        .table th:first-child, .table td:first-child {
            border-left: 0;
        }

        .table tbody tr:last-child td {
            border-bottom: 0;
        }

        .table tbody td {
            font-size: 0.875rem;
            color: #495057;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Mading Nepal</h1>
        </div>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Judul</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Konten</th>
                        <th scope="col">Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mading as $informasi)
                        <tr>
                            <th scope="row">{{ $informasi->judul }}</th>
                            <th scope="row">{{ $informasi->slug }}</th>
                            <td>{!! $informasi->konten !!}</td>
                            <td>{{ $informasi->kategori }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
