<?php 

    function validateUsers($data){
        $name = $data['name'];
        $nameUser = $data['nameUser'];

        print_r($name. $nameUser);
        print_r($data);
    }

?>