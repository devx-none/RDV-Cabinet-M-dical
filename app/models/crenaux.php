<?php
require_once '../../../Database/database.php';

class crenaux{
    static public function addCrenaux($date, $time){
        $stmt = database::connect()->prepare("INSERT INTO crénaux(date,time) VALUES(:date,:time)");
        $stmt ->bindParam(':date',$date);
        $stmt ->bindParam(':time',$time);
        // $stmt ->bindParam(':end_time',$end_time);
        // $stmt ->bindParam(':reference',$reference);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    static function getCreaneaux(){
        $stmt = database::connect()->prepare("SELECT * FROM crénaux");
      $stmt->execute();
      return $stmt->fetchAll();
      $stmt->close();
      $stmt=null;
    }
    static public function updateCrenaux($id,$date, $start_time, $end_time){
        $stmt= database::connect()->prepare("UPDATE crénaux set date=:date,start_time=:start_time,end_time=:end_time where id=:id");
        $stmt ->bindParam(':id',$id);
        $stmt ->bindParam(':date',$date);
        $stmt ->bindParam(':start_time',$start_time);
        $stmt ->bindParam(':end_time',$end_time);
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
}
