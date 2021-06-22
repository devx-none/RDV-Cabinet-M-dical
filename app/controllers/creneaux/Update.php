<?php 
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-with');

include_once '../../Models/crenaux.php';

$crenaux = new crenaux();
$data = file_get_contents("php://input");
$data = json_decode($data);
$id = $data->id;
$date = $data->date;
$start_time = $data->start_time;
$end_time = $data->end_time;

if($crenaux->updateCrenaux($id,$date, $start_time, $end_time)){
    print_r(json_encode(["message"=>"modification avec succes"]));
}else{
   
    print_r(json_encode(["error"=>"error"]));

}
