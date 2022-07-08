<?php
  
  session_start();
  $id = session_id();
  

  function uploadImgUser ($fileArray, $idSession, $task){

    if (isset($_POST['dataImg'])) {
        $file = $_FILES['img']['name'];   
        $typeFile = explode(".", $file)[1];
        $message = '';
    
        if (isset($file) && $file != "") {
            //Obtenemos algunos datos necesarios sobre el archivo
            $tipo = $_FILES['img']['type'];
            $tamano = $_FILES['img']['size'];
            $temp = $_FILES['img']['tmp_name'];
            //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
           if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")))) {
              echo '<div><b>Error. La extensión no se permite<br/>
              - Se permiten archivos .gif, .jpg, .png.</b></div>';
           }
           else{             

            if ($task == "register") {

                $pathFile = file_exists(dirname(__FILE__,2)."/imgUsers/$idSession");
                $pathFileProfile = file_exists("../imgUsers/$idSession/profile");
                

                if (!$pathFile) {
                    mkdir(dirname(__FILE__,2)."/imgUsers/$idSession");    
                    mkdir(dirname(__FILE__,2)."/imgUsers/$idSession/profile");                
                } 

                if (!$pathFileProfile && $pathFile) {                    
                    mkdir(dirname(__FILE__,2)."/imgUsers/$idSession/profile");
                } 
    
               if (move_uploaded_file($temp, dirname(__FILE__,2)."/imgUsers/$idSession/profile/profile.$typeFile")) {
                        
                    return print_r(dirname(__FILE__,2)."/imgUsers/$idSession/profile/profile.$typeFile");
                    
                }   

            } elseif ($task == "post") {     

                $pathFile = file_exists(dirname(__FILE__,2)."/imgUsers/$idSession/posts");
                
                

                if (!$pathFile) {
                    mkdir(dirname(__FILE__,2)."/imgUsers/$idSession/posts");   
                             
                } 

                
               if (move_uploaded_file($temp, dirname(__FILE__,2)."/imgUsers/$idSession/posts/$file")) {                      
                
                return dirname(__FILE__,2)."/imgUsers/$idSession/posts/$file";
                
            }

               

               /* if (!$pathFileProfile && $pathFile) {                    
                    mkdir("../imgUsers/$idSession/profile");
                } 
    
               if (move_uploaded_file($temp, "../imgUsers/$idSession/profile/profile.$typeFile")) {
                        
                    return print_r('Se ha subido correctamente la imagen');
                    
                }         */ 
            }
           
           }
           
    
        }
    }

  };
   
  if (isset($_FILES['img'])) {
    uploadImgUser($_FILES['img'], $id, "post");
  }

  function getImgProfile($idSession) {
    
    $pathFile = file_exists(dirname(__FILE__,2)."/imgUsers/$idSession");
    $pathFileUser = file_exists(dirname(__FILE__,2)."/imgUsers/$idSession/profile/profile.png");

    if (!$pathFile) {
        return 'No se encontro ninguna informacion para este usuario';
    }
    
    if (!$pathFileUser) {
        return 'El usuario no tiene ninguna foto de perfil';
    }
   

    return dirname(__FILE__,2)."/imgUsers/$idSession/profile/profile.png";

    

  }

  function getImgPosts ($idSession) {

    $pathFilePost = file_exists(dirname(__FILE__,2)."/imgUsers/$idSession/posts");
    $imgPosts = [];
    
    if (!$pathFilePost) {
        return 'El Usuario no tiene ningun post';
    }

    $thefolder = dirname(__FILE__,2)."/imgUsers/$idSession/posts";

    if ($handler = opendir($thefolder)) {
    while (false !== ($file = readdir($handler))) {
            $dataImg = $file; 
            //$img = explode("/", $dataImg);
            if ($dataImg !== "." && $dataImg !== "..") {
                $imgPosts[] = dirname(__FILE__,2)."/imgUsers/$idSession/posts/$dataImg";
            }          
           
    }
    closedir($handler);
    }

    return $imgPosts;
  }   

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <input name="img" type="file">
        <button name="dataImg" >Enviar</button>
    </form>
</body>
</html>