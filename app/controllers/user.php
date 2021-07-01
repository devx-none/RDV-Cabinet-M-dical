<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-with');

// include_once '../models/users.php';
require_once 'C:\\xampp\\htdocs\RDV-Cabinet-Médical\app\Models\users.php';

class user{
  
    public static function login(){

$users = new users();
$data = file_get_contents("php://input");
$data = json_decode($data);
$email = $data->email;
$password = $data->password;
$reference=$users->user($email,$password);
// $data_arr = array();
// $data_arr['login'] = array();

// foreach($users as $row){
    
//     $reference = $row['reference'];
    // $data_item =array(
    //     'reference'=>$reference,
    // );
   
    // array_push($data_arr['login'],$data_item);
    echo json_encode($reference,JSON_PRETTY_PRINT);


    }
    public static function register(){
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
    }

    }

