<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST["registro"])){
        include('../php/perfil.php');
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/register.css">
    <title>Red Social</title>
    <script src='prueba.js'></script>
</head>
    <body>
        <form method='POST' enctype='multipart/form-data'>
            <div class="boxIMG">
                <img class="imgSZ" src="../img/logo.png">
                <div>
                    <p>Red Social te ayuda a comunicarte y compartir con las personas que forman parte de tu vida.</p>
                </div>
            </div>
            <div class="boxFirst">
                <div class="boxInput">
                    <input type="hidden" name="registro" value="true" required>
                    <input type="text" name='nombre' placeholder='Nombre' required value="<?php if(isset($_POST["nombre"])) echo $_POST["nombre"]?>">
                    <input type='text' name='username' placeholder='Nombre de usuario' required value="<?php if(isset($_POST["username"])) echo $_POST["username"]?>">
                    <span><?php if (isset($userError)) echo $userError?></span>
                    <input type='email' name='email' placeholder='Email' required value="<?php if(isset($_POST["email"])) echo $_POST["email"]?>">
                    <span><?php if(isset($mailError)) echo $mailError?></span>
                    <input type='date' name='fechaNac' placeholder='Fecha de nacimiento' required value="<?php if(isset($_POST["fechaNac"])) echo $_POST["fechaNac"]?>">
                    <input type='password' id="password" name='password' placeholder='Contraseña' onchange="passCheck()" required>
                    <input type='password' id="passwordCheck" name='passwordCheck' placeholder='Repite tu contraseña' onchange="passCheck()" required>
                    <span><?php if (isset($passError)) echo $passError?></span>
                    <input type='file' name='fotoPerfil' accept="image/*">
                    <span><?php if (isset($error)) echo $error?></span>
                    <button type='submit'>Iniciar sesión</button>
                    <div class="botonRegistro"><a href="pages/inicioSesion.html" class="registerLink">¿Ya estas registrado? <br> Inicia Sesion</a></div>
                </div>
            </div>
        </form>
    </body>
</html>
