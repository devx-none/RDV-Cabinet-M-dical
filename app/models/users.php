<?php 
// require_once '../../../Database/database.php';
require_once 'C:\\xampp\\htdocs\RDV-Cabinet-Médical\app\database\database.php';


class users{
  
    static public function addUser($nom,$prenom,$age,$email,$password){
        
        $stmt = database::connect()->prepare("INSERT INTO users VALUES ( UUID(),:nom,:prenom,:age,:email,:password)");
        $stmt->bindParam(':nom',$nom);
        $stmt->bindParam(':prenom',$prenom);
        $stmt->bindParam(':age',$age);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$password);
        if($stmt->execute()){
            return true;
        }else{
          return false;
        }
    }

    
    static public function user($email,$password){
        
        $stmt = database::connect()->prepare("SELECT reference FROM users where email=:email and password=:password");
        $stmt ->bindParam(':email',$email);
        $stmt ->bindParam(':password',$password);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }

    


}
