<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: white;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }
        .header {
            display: flex;
            justify-content: space-between;
            width: 100%;
            align-items: center;
            margin-bottom: 20px;
        }
        .header h2 {
            color: #f0b90b;
            margin: 0;
        }
        .header button {
            background-color: #f0b90b;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }
        .header button:hover {
            background-color: #d89f0a;
        }
        h3 {
            color: #f0b90b;
            margin-top: 30px;
        }
        .form-container {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 600px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        input[type="file"] {
            background-color: #333;
            color: white;
            padding: 12px;
            border-radius: 5px;
            border: 1px solid #444;
        }
        button {
            background-color: #f0b90b;
            border: none;
            padding: 12px;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #d89f0a;
        }
        table {
            margin-top: 30px;
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #444;
        }
        th {
            background-color: #1e1e1e;
        }
        td a {
            color: #f0b90b;
            text-decoration: none;
        }
        td a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header con el botón de cerrar sesión -->
        <div class="header">
            <h2>Bienvenido al Dashboard</h2>

            <!-- Formulario de Cerrar sesión con CSRF -->
            <form action="/auth/logout" method="POST">
                <?= csrf_field(); ?>  <!-- Token CSRF -->
                <button type="submit">Cerrar sesión</button>
            </form>
        </div>

        <!-- Formulario de subir una imagen -->
        <div class="form-container">
            <h3>Subir una imagen</h3>
            <form action="/dashboard/uploadImage" method="POST" enctype="multipart/form-data">
                <input type="file" name="image" required>
                <button type="submit">Subir</button>
            </form>
        </div>

        <!-- Tabla de imágenes subidas -->
        <div class="form-container">
            <h3>Imágenes</h3>
            <table>
                <tr>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
                <?php foreach ($images as $image): ?>
                    <tr>
                        <td><img src="/uploads/images/<?= $image['filename'] ?>" alt="Imagen" width="100"></td>
                        <td><a href="/dashboard/deleteImage/<?= $image['id'] ?>">Eliminar</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <!-- Formulario de descarga de usuarios -->
        <div class="form-container">
            <h3>Descargar Usuarios en PDF</h3>
            <form action="/dashboard/downloadUsers" method="POST">
                <button type="submit">Descargar PDF</button>
            </form>
        </div>
    </div>
</body>
</html>
