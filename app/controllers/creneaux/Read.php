<?php 
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-with');

include_once '../../Models/crenaux.php';

$crenaux = new crenaux();
$data = $crenaux->getCreaneaux();
$data_arr = array();
$data_arr['slots'] = array();

foreach($data as $row){
    extract($row);
    $data_item =array(
        'id'=>$id,
        'date'=>$date,
        'time'=>$Time
        // 'end_time' =>$end_time,
        // 'reference' =>$reference
        
       
    );
   
    array_push($data_arr['slots'],$data_item);
}
echo json_encode($data_arr,JSON_PRETTY_PRINT);

