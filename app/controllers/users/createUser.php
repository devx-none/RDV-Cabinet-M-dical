<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-with');

include_once '../../Models/users.php';

$users = new users();
$data = file_get_contents("php://input");
$data = json_decode($data);
$nom = $data->nom;
$prenom = $data->prenom;
$age = $data->age;
$email = $data->email;
$password = $data->password;

if($users->addUser($nom,$prenom,$age,$email,$password)){
    print_r(json_encode(["message"=>"ajout avec succes"]));
}else{
   
    print_r(json_encode(["error"=>"error"]));

}