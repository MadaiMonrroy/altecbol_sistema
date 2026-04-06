<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo contacto</title>
</head>
<body style="font-family: Arial, sans-serif; color: #1e293b;">
    <h2>Nuevo mensaje desde el formulario de contacto</h2>

    <p><strong>Nombre:</strong> {{ $datos['nombre'] ?? '-' }}</p>
    <p><strong>Empresa:</strong> {{ $datos['empresa'] ?? '-' }}</p>
    <p><strong>Correo:</strong> {{ $datos['email'] ?? '-' }}</p>
    <p><strong>Teléfono:</strong> {{ $datos['telefono'] ?? '-' }}</p>
    <p><strong>Tipo de consulta:</strong> {{ $datos['tipo_consulta'] ?? '-' }}</p>

    <p><strong>Mensaje:</strong></p>
    <div style="white-space: pre-line; border: 1px solid #cbd5e1; padding: 12px; border-radius: 8px;">
        {{ $datos['mensaje'] ?? '-' }}
    </div>
</body>
</html>