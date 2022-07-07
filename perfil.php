<?php
    session_start();
    if(isset($_POST))
    {
        $nombre = $_POST['nombre'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $fechaNac = $_POST['fechaNac'];
        $password = $_POST['password'];
    }
    if(isset($_FILES))
    {
        
    }
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
    print_r(stripslashes(json_encode($data)));
    $json = json_encode($data);

    file_put_contents('data.json', $json);
    echo "<script src='prueba.js'></script>";
?>

