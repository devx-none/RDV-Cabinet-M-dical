<?php 
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-with');

include_once '../../Models/crenaux.php';

$crenaux = new crenaux();
$data = file_get_contents("php://input");
$data = json_decode($data);
// $id = $data->id;
$id = $_GET['id'];
if($crenaux->deleteCrenaux($id)){
    print_r(json_encode(["message"=>"suppression avec succes"]));
}else{
   
    print_r(json_encode(["error"=>"error"]));

}
