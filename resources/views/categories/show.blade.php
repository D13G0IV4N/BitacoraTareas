<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Categoría</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; margin: 20px; }
        h1 { text-align: center; }
        .detalle { margin-top: 30px; }
        .campo { margin-bottom: 10px; }
    </style>
</head>
<body>
    <h1>Detalles de Categoría</h1>

    <div class="detalle">
        <div class="campo"><strong>ID:</strong> {{ $category->id }}</div>
        <div class="campo"><strong>Nombre:</strong> {{ $category->name }}</div>
        <div class="campo"><strong>Descripción:</strong> {{ $category->description ?? 'N/A' }}</div>
        <div class="campo"><strong>Creado por (user_id):</strong> {{ $category->created_by }}</div>
        <div class="campo"><strong>Fecha de creación:</strong> {{ $category->created_at->format('d/m/Y H:i') }}</div>
        <div class="campo"><strong>Generado el:</strong> {{ $now->format('d/m/Y H:i') }}</div>
    </div>
</body>
</html>
