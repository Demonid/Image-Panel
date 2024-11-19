<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
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
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        h2 {
            color: #f0b90b;
        }
        form {
            background-color: #1e1e1e;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            width: 300px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        input {
            background-color: #333;
            color: white;
            padding: 12px;
            border-radius: 5px;
            border: 1px solid #444;
        }
        input:focus {
            border-color: #f0b90b;
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
        .footer {
            color: #888;
            margin-top: 15px;
        }
        .footer a {
            color: #f0b90b;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registro</h2>

        <form action="/auth/registerUser" method="POST">
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Registrar</button>
        </form>

        <p class="footer">¿Ya tienes cuenta? <a href="/">Iniciar sesión</a></p>
    </div>
</body>
</html>
