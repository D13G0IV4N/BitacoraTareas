<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Detalle de Prioridad</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 20px;
        }
        h1 {
            color: #333;
            border-bottom: 2px solid #444;
            padding-bottom: 5px;
        }
        .priority-info {
            margin-top: 20px;
        }
        .priority-info dt {
            font-weight: bold;
            margin-top: 10px;
        }
        .color-box {
            display: inline-block;
            width: 20px;
            height: 20px;
            vertical-align: middle;
            border: 1px solid #ccc;
            margin-left: 10px;
        }
        .footer {
            margin-top: 40px;
            font-size: 12px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Detalle de Prioridad</h1>

    <dl class="priority-info">
        <dt>ID:</dt>
        <dd>{{ $priority->id }}</dd>

        <dt>Nombre:</dt>
        <dd>{{ $priority->name }}</dd>

        <dt>Nivel:</dt>
        <dd>{{ $priority->level }}</dd>

        <dt>Color:</dt>
        <dd>
            {{ $priority->color }}
            <span class="color-box" style="background-color: {{ $priority->color }}"></span>
        </dd>

        <dt>Creado:</dt>
        <dd>{{ $priority->created_at->format('d/m/Y H:i') }}</dd>

        <dt>Actualizado:</dt>
        <dd>{{ $priority->updated_at->format('d/m/Y H:i') }}</dd>
    </dl>

    <div class="footer">
        PDF generado el {{ $now->format('d/m/Y H:i:s') }}
    </div>
</body>
</html>
