<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Listado de Prioridades</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; margin: 20px; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #444; padding: 8px; text-align: left; }
        th { background-color: #ddd; }
        .footer { margin-top: 30px; font-size: 10px; text-align: right; color: #666; }
        .color-box {
            display: inline-block;
            width: 20px; height: 20px;
            border: 1px solid #333;
            vertical-align: middle;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <h2>Listado de Prioridades</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Nivel</th>
                <th>Color</th>
                <th>Creado En</th>
            </tr>
        </thead>
        <tbody>
            @foreach($priorities as $priority)
            <tr>
                <td>{{ $priority->id }}</td>
                <td>{{ $priority->name }}</td>
                <td>{{ $priority->level }}</td>
                <td>
                    <span class="color-box" style="background-color: {{ $priority->color }};"></span>
                    {{ $priority->color }}
                </td>
                <td>{{ $priority->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Generado el {{ $now->format('d/m/Y H:i:s') }}
    </div>
</body>
</html>
