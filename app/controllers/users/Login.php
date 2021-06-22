<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-with');

include_once '../../models/users.php';

$users = new users();

$data = file_get_contents("php://input");
$data = json_decode($data);
$email = $data->email;
$password = $data->password;

if($users->user($email,$password)){
    print_r(json_encode(["message"=>"submitted"]));

}else{
   
    echo json_encode(["error"=>"error"]);

}

// $data_arr = array();
// $data_arr['users'] = array();


   
   

// echo json_encode($data_arr,JSON_PRETTY_PRINT);


