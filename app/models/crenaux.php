<?php
// require_once '../Database/database.php';
require_once 'C:\\xampp\\htdocs\RDV-Cabinet-Médical\app\database\database.php';

class crenaux{
    static public function addCrenaux($date, $time,$reference){
        $stmt = database::connect()->prepare("INSERT INTO crénaux(date,time,reference) VALUES(:date,:time,:reference)");
        $stmt ->bindParam(':date',$date);
        $stmt ->bindParam(':time',$time);
        // $stmt ->bindParam(':end_time',$end_time);
        $stmt ->bindParam(':reference',$reference);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    static function getCreneaux(){
        $stmt = database::connect()->prepare("SELECT * FROM crénaux");
      $stmt->execute();
      return $stmt->fetchAll();
      $stmt->close();
      $stmt=null;
    }
    static public function updateCrenaux($id,$date, $time){
        $stmt= database::connect()->prepare("UPDATE crénaux set date=:date,time=:time where id=:id");
        $stmt ->bindParam(':id',$id);
        $stmt ->bindParam(':date',$date);
        $stmt ->bindParam(':time',$time);
        // $stmt ->bindParam(':end_time',$end_time);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    static public function deleteCrenaux($id){
        $stmt = database::connect()->prepare("DELETE FROM crénaux where id=:id");
        $stmt ->bindParam(':id',$id);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    static public function timeDispo($date){
        
        $stmt = database::connect()->prepare("SELECT Time FROM crénaux where date=:date");
        $stmt ->bindParam(':date',$date);
        
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }
}
