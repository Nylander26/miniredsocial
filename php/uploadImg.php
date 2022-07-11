<?php 
session_start();

require('../utils/updateImg.php');

$img = $_FILES['profile'];

//print_r($_FILES);
//print_r(uploadImgUser($img));
 echo uploadImgUser($img, session_id(), "register");
//echo json_encode(array('mensaje' => $img));

?>