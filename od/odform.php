<?php
class Od{
// database
   private $db;

// Table
   private $db_table = "od";

// Columns
public $regid;
public $startDate;
public $endDate;
public $title;
public $description;
public $status;

// Database
public function __construct($db){
    $this->db = $db;
}

// GET ALL
public function getOd(){
    $sqlQuery = "SELECT id,regid,startD,endD,title,description,status FROM " . $this->db_table . "";
    $this->result = $this->db->query($sqlQuery);
    return $this->result;
}

public function getSingleStudentOd(){

    $sqlQuery = "SELECT id,regid,startD,endD,title,description,status FROM " . $this->db_table ." where regid = '".$this->regid."'";
    $result = $this->db->query($sqlQuery);
    return $result; 
  
}

public function getDates(){

  $sqlQuery = "SELECT startD,endD FROM " . $this->db_table ." where regid = '".$this->regid."'";
  $result = $this->db->query($sqlQuery);
  return $result; 

}


// create
public function createod()
 {
  
   $this->regid=htmlspecialchars(strip_tags($this->regid));
   $this->startDate=htmlspecialchars(strip_tags($this->startDate));
   $this->endDate=htmlspecialchars(strip_tags($this->endDate));
   $this->title=htmlspecialchars(strip_tags($this->title));
   $this->description=htmlspecialchars(strip_tags($this->description));

   $sqlQuery = "INSERT INTO ". $this->db_table ." 
        SET regid  = '".$this->regid."',
        startD     = '".$this->startDate."',
        endD       = '".$this->endDate."',
        title      = '".$this->title."',
        description= '".$this->description."'";
        try {
            $this->db->query($sqlQuery);
            if($this->db->affected_rows > 0)
            { 
                $sqlQuery = "SELECT status from ".$this->db_table." where regid = '".$this->regid."'";
                $result = $this->db->query($sqlQuery);
                $data = $result->fetch_assoc();
                $this->status = $data['status'];
               return true;
            } else {
               return false;
            }
          }
          catch(Exception $e) {
            return false;
          }
   }

   function deleteOd(){
    $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = '".$this->id."'";
    $this->db->query($sqlQuery);
    if($this->db->affected_rows > 0) //affected_rows  it returns the a affected row count
    {
    return true;
    }
    return false;
    }

    function getOdById() {
        $sqlQuery = "SELECT * FROM ".$this->db_table." WHERE id = ".$this->id;
        $record = $this->db->query($sqlQuery);
        $dataRow = $record->fetch_assoc();
        $this->regid = $dataRow['regid'];
        $this->startDate = $dataRow['startD'];
        $this->endDate = $dataRow['endD'];
        $this->title = $dataRow['title'];
        $this->description = $dataRow['description'];
        $this->status = $dataRow['status'];
        $this->reason = $dataRow['reason'];
    }

    function approveOd() {
      
      $sqlQuery = "UPDATE ". $this->db_table ." SET status = 'accept' WHERE id = '".$this->id."'";
      
      $this->db->query($sqlQuery);
      if($this->db->affected_rows > 0){
        return true;
      }
        return false;
      }

      function denyOd() {
      
        $sqlQuery = "UPDATE ". $this->db_table ." SET status = 'deny' WHERE id = '".$this->id."'";
        
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
          return true;
        }
          return false;
        }

        function updateReason(){
          $sqlQuery = "UPDATE ". $this->db_table ." SET reason = '".$this->reason."'
          WHERE id = ".$this->id;
          
          $this->db->query($sqlQuery);
          if($this->db->affected_rows > 0){
          return true;
          }
          return false;
          }
       
 }   

