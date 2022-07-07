<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red Social</title>
    <style>
        form
        {
            width: 300px;
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <div id='inicio'>
        <h2>Inicio de sesión</h2>
        <form method='POST' enctype='multipart/form-data' action='cuarta.php'>
            <input type="text" name='nombre' placeholder='Nombre'>
            <input type='text' name='username' placeholder='Nombre de usuario'>
            <input type='email' name='email' placeholder='Email'>
            <input type='file' name='fotoPerfil' accept="image/*" >
            <input type='password' name='password' placeholder='Contraseña'>
            <button type='submit'>Iniciar sesión</button>
        </form>
    </div>
</body>
</html>