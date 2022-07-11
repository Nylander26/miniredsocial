<?php
$body = file_get_contents('php://input');
$data = json_decode($body, true);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   echo json_encode(array ( 'message' => "Email ya existe" ));
}

function userValidation($infoUser){
    $name = $infoUser['name'];
    $name = $infoUser['name'];
    print_r($name);
}

?>