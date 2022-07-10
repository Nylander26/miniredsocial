<?php 

require('../utils/validateUsers.php');

$res = file_get_contents("php://input");
$data = json_decode($res, true);

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    print_r(validateUsers($data));
}

print_r($_SERVER['REQUEST_METHOD']);
echo $data['name'];
?>