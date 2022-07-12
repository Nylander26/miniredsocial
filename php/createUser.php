<?php
session_start();
$body = file_get_contents('php://input');
$data = json_decode($body, true);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo userValidation($data);
}


function userValidation($infoUser){
    $name = $infoUser['name'];
    $username = $infoUser['username'];
    $email = $infoUser['email'];
    $fechaNac = $infoUser['birthday'];
    $password = $infoUser['password'];
    $passChek = $infoUser['passwordCheck'];
    $register = false;

    if (!empty($name) && !empty($username) && !empty($email) && !empty($fechaNac) && !empty($password)){

        if ($password !== $passChek){
            return json_encode(array ( 'message' => "Las contraseñas no coinciden"));
            $password = null;
        } 
    
        $jsonData = [];
        if(is_file('..\json\data.json')){
            $contenidoJson = file_get_contents('..\json\data.json');
            $contenidoJson = json_decode($contenidoJson, true);
            $jsonData = $contenidoJson;
        }
        if (isset($jsonData)){
            for ($i = 0; $i < count($jsonData); $i++) {
                if (($jsonData[$i]["username"]) == $username) {
                    return json_encode(array ( 'message' => "El nombre de usuario ya existe"));
                }
        
                if (($jsonData[$i]["email"]) == $email) {
                    return json_encode(array ( 'message' => "El email ya esta registrado."));
                }
            }
        }
            
        if(isset($password)){
            $miArray = (Object) [
                'id' => session_id(),
                'nombre' => $name,
                'username' => $username,
                'email' => $email,
                'fechaNac' => $fechaNac,
                'password' => $password
            ];
        } else {
            return json_encode(array ( 'message' =>"No se ha podido completar el registro"));
        }
        
        if(!isset($passError) && !isset($userError) && !isset($mailError)){
            $jsonData[] = $miArray;
            $json = json_encode($jsonData);
            file_put_contents('..\json\data.json', $json);
            $register = true;
            return json_encode(array ('id' => session_id(),
            'nombre' => $name,
            'username' => $username,
            'email' => $email,
            'fechaNac' => $fechaNac,
            'password' => $password));
        }
        return $register;
    } else {
        return json_encode(array ( 'message' => "No se ha podido completar el registro"));
    }
    
}

?>