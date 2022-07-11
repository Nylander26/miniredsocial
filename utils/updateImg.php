<?php
  
  function uploadImgUser ($fileArray,$idSession,$task){

    $file = $fileArray['name'];
    $type = explode("/", $fileArray['type'])[1];

     //print_r($idSession);
    //Se verifica que se esta enviando la imagen
    if (!$file) {
        return json_encode(array ( 'message' => "No image sent or invalid format"));
    }

    if ($type !== "jpeg" && $type !== "png" && $type !== "jpg" ) {
        return json_encode(array ( 'message' => "The extension is not allowed.jpeg, jpg or png type only"));
    }

    if ($task == 'register') {
        $pathFile = file_exists("../imgUsers/$idSession");
        $pathFileProfile = file_exists("../imgUsers/$idSession/profile");

        if (!$pathFile) {
            mkdir("../imgUsers/$idSession");    
            mkdir("../imgUsers/$idSession/profile");                
        } 

        if (move_uploaded_file($fileArray['tmp_name'], "../imgUsers/$idSession/profile/profile.$type")) {
                        
            return json_encode(array ( 'urlProfile' => "../imgUsers/$idSession/profile/profile.$type"));
            
        }  

    }

    
  

  };

   

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
$body = file_get_contents('php://input');
$data = json_decode($body, true);

  function getImgPosts ($idSession) {

    // $urlStr = str_replace('\\', '/', dirname(__FILE__,2));

    $pathFilePost = file_exists(dirname(__FILE__,2)."/imgUsers/$idSession/posts");
    $imgPosts = [];
    
    if (!$pathFilePost) {
        return json_encode('El Usuario no tiene ningun post');
    }

    $thefolder = dirname(__FILE__,2)."/imgUsers/$idSession/posts";

    if ($handler = opendir($thefolder)) {
    while (false !== ($file = readdir($handler))) {
            $dataImg = $file; 
            //$img = explode("/", $dataImg);
            if ($dataImg !== "." && $dataImg !== "..") {
                $imgPosts[] = (object) [ 'url' => "../imgUsers/$idSession/posts/$dataImg"];
            }          
           
    }
    closedir($handler);
    }

    

    // if (file_exists(dirname(__FILE__,2)."/json/postsUsers/$idSession.json")) {
    //     $contenidoJson = file_get_contents(dirname(__FILE__,2)."/json/postsUsers/$idSession.json");
    //     $contenidoJson = json_decode($contenidoJson, true);
    //     $data = $contenidoJson;
    // }

    
    // fopen(dirname(__FILE__,2)."/json/postsUsers/$idSession.json","a"); 
    
    $data = $imgPosts;
    $json = stripslashes(json_encode($data));
    
    // file_put_contents(dirname(__FILE__,2)."/json/postsUsers/$idSession.json", $json);
    /*if(is_file('data.json'))
    {
        $contenidoJson = file_get_contents('data.json');
        $contenidoJson = json_decode($contenidoJson, true);
        $data = $contenidoJson;
    }*/
    // print_r(dirname(__FILE__,2)."/json/postsUsers/$idSession.json". PHP_EOL);
    return($json);
  }   

?>
