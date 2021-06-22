<?php 
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-with');
include_once '../../Models/crenaux.php';


$crenaux = new crenaux();
$data = file_get_contents("php://input");
$data = json_decode($data);
$date = $data->date;
$time = $data->time;
// $reference = $data->reference;
if($crenaux->addCrenaux($date,$time)){
    print_r(json_encode(["message"=>"ajout avec succes"]));
}else{
   
    print_r(json_encode(["error"=>"error"]));

}
