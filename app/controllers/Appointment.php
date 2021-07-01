<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-with');

// require_once 'Models/crenaux.php';
require_once 'C:\\xampp\\htdocs\RDV-Cabinet-Médical\app\Models\crenaux.php';
class creneaux{
    public static function read(){


$crenaux = new crenaux();
$data = $crenaux->getCreneaux();
$data_arr = array();
$data_arr['slots'] = array();

foreach($data as $row){
    extract($row);
    $data_item =array(
        'id'=>$id,
        'date'=>$date,
        'time'=>$Time,
        'reference'=>$reference
        // 'end_time' =>$end_time,
        // 'reference' =>$reference


    );

    array_push($data_arr['slots'],$data_item);
}
echo json_encode($data_arr,JSON_PRETTY_PRINT);
    }
    public static function singleread(){
        $data = file_get_contents("php://input");
        $data = json_decode($data);

        $time = new crenaux();
        $date = $data->date;
        $timeDispo=$time->timeDispo($date);
        
        echo json_encode($timeDispo,JSON_PRETTY_PRINT);
           
        }
            

public static  function create(){
        $crenaux = new crenaux();
$data = file_get_contents("php://input");
$data = json_decode($data);
$date = $data->date;
$time = $data->time;
$reference = $data->reference;
if($crenaux->addCrenaux($date,$time,$reference)){
    print_r(json_encode(["message"=>"ajout avec succes"]));
}else{

    print_r(json_encode(["error"=>"error"]));

}
}
public static  function update(){
    $crenaux = new crenaux();
$data = file_get_contents("php://input");
$data = json_decode($data);
$id = $_GET['id'];
$date = $data->date;
$time = $data->time;
// $end_time = $data->end_time;

if($crenaux->updateCrenaux($id,$date, $time)){
    print_r(json_encode(["message"=>"modification avec succes"]));
}else{

    print_r(json_encode(["error"=>"error"]));

}
}

public static  function delete(){
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
}

}
