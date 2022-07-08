<?php
    if(isset($_POST['inicio'])) //se ha iniciado sesión
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        //comprobar que el usuario exista
        if(is_file('./json/data.json')) //se coge el contenido del json
        {
            $contenidoJson = file_get_contents('./json/data.json');
            $contenidoJson = json_decode($contenidoJson, true); //lo devuelve en un array asociativo
        }
        else //no hay json, así que todavía no hay ningún usuario registrado
        {
            echo "usuario no registrado";
            die; //aquí se podría por ejemplo redirigir a la página de inicio poniendo un mensaje de error o algo
        }
        //comprobar que la contraseña coincida
        for($i=0; $i<count($contenidoJson); $i++)
        {
            if($contenidoJson[$i]['email'] == $email)
            {
                if($contenidoJson[$i]['password'] == $password) //el usuario y la contraseña están correctas
                {
                    session_id($contenidoJson[$i]['id']);//coger el session ID de ese usuario y se lo asigna a la sesión
                }
            }
        }
        
    }
    elseif(isset($_POST['registro'])) //se ha registrado el usuario
    {
        $nombre = $_POST['nombre'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $fechaNac = $_POST['fechaNac'];
        $password = $_POST['password'];

        $data = [];
        if(is_file('data.json'))
        {
            $contenidoJson = file_get_contents('data.json');
            $contenidoJson = json_decode($contenidoJson, true);
            $data = $contenidoJson;
        }
        $miArray = (Object) ['id' => session_id(),
                                'nombre' => $nombre,
                                'username' => $username,
                                'email' => $email,
                                'fechaNac' => $fechaNac,
                                'password' => $password];

        $data[] = $miArray;
        
        $json = json_encode($data);

        file_put_contents('data.json', $json);

        require('./utils/updateImg.php');
        if(isset($_FILES))
        {
            $foto = $_FILES['fotoPerfil'];
        }
        uploadImgUser($foto, session_id(), 'register');
    }
    session_start();
    //mostrar los otros usuarios
    echo "<ul>";
    for($i=0; $i<count($data); $i++)
    {
        if($data[$i]['email'] != $email) //para que no muestre al usuario activo en la lista de los otros usuarios
        {
            $idUsuario = $data[$i]['id'];
            if(is_dir("./imgUsers/$idUsuario/profile"))
            {
                $ruta = "./imgUsers/$idUsuario/profile/profile.png"; //ruta en la que estará la img de perfil del usuario $i
            }

            echo "<li><img src='$ruta'>"; //se imprime la foto de perfil
            echo "$data[$i]['nombre']"; //se imprime el nombre del usuario
            echo "</li>";
        }
    }
    echo "</ul>";


?>

