<!-- resources/views/categories/pdf.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Categorías</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #444;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #ddd;
        }
        .footer {
            margin-top: 30px;
            font-size: 10px;
            text-align: right;
            color: #666;
        }
    </style>
</head>
<body>
    <h2>Listado de Categorías</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Creado Por (User ID)</th>
                <th>Creado En</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $cat)
                <tr>
                    <td>{{ $cat->id }}</td>
                    <td>{{ $cat->name }}</td>
                    <td>{{ $cat->description ?? '-' }}</td>
                    <td>{{ $cat->created_by }}</td>
                    <td>{{ $cat->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Generado el {{ $now->format('d/m/Y H:i:s') }}
    </div>
</body>
</html>
