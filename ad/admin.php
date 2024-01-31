<?php
class Admin{
// database
   private $db;

// Table
   private $db_table = "admin";

// Columns
public $name;
public $regid;
public $password;
public $conpass;
public $designation;

// Database
public function __construct($db){
    $this->db = $db;
}
//create
public function createAdmin()
 {
   $this->name=htmlspecialchars(strip_tags($this->name));
   $this->regid=htmlspecialchars(strip_tags($this->regid));
   $this->password=htmlspecialchars(strip_tags($this->password));
   $this->conpass=htmlspecialchars(strip_tags($this->conpass));
   $this->designation=htmlspecialchars(strip_tags($this->designation));
  
  if($this->password==$this->conpass)
   {
      $sqlQuery = "INSERT INTO ". $this->db_table ." 
        SET name    = '".$this->name."',
        regid       = '".$this->regid."',
        password    = '".$this->password."',
        designation = '".$this->designation."'";
       
    try {
      $this->db->query($sqlQuery);
      if($this->db->affected_rows > 0)
      { 
         return true;
      } else {
         return false;
      }
    }
    catch(Exception $e) {
      return false;
    }
   }
 }   

 // GET ALL
public function getAdmin(){
   $sqlQuery = "SELECT regid, name,password,designation FROM " . $this->db_table . "";
   $this->result = $this->db->query($sqlQuery);
   return $this->result;
}
//get Single user by regid
public function getSingleAdmin(){
    $sqlQuery = "SELECT regid, name,password, designation FROM
    ". $this->db_table ." WHERE regid = '".$this->regid."'";
    try{
      $record = $this->db->query($sqlQuery);
      $dataRow = $record->fetch_assoc();
   if($dataRow != null) {
      $this->regid=$dataRow['regid'];
      $this->password = $dataRow['password'];
      $this->name = $dataRow['name'];
      $this->designation = $dataRow['designation'];
   } else {
      $this->regid = null;
      $this->password = null;
   }
} catch(Exception $e) {
   $this->regid = null;
   $this->password = null;
}
    /* $record = $this->db->query($sqlQuery);
    if($record->fetch_assoc()) {
      $dataRow = $record->fetch_assoc();       //Associative array(key->value)
      $this->name = $dataRow['name'];
      $this->password = $dataRow['password'];
      $this->designation = $dataRow['designation'];
    } else {
      return false;
    } */
    
}
//Update
public function updateAdmin(){
   $this->regid=htmlspecialchars(strip_tags($this->regid));
   $this->name=htmlspecialchars(strip_tags($this->name));
   $this->password=htmlspecialchars(strip_tags($this->password));
   $this->designation=htmlspecialchars(strip_tags($this->designation));
   
   $sqlQuery = "UPDATE ". $this->db_table ." SET name = '".$this->name."',
   designation = '".$this->designation."',
   password = '".$this->password."'
   WHERE regid = '".$this->regid."'";
   
   $this->db->query($sqlQuery);
   if($this->db->affected_rows > 0){
   return true;
   }
   return false;
   }

   //delete

   function deleteAdmin(){
      $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE regid = ".$this->regid;
      $this->db->query($sqlQuery);
      if($this->db->affected_rows > 0) //affected_rows  it returns the a affected row count
      {
      return true;
      }
      return false;
      }
   
}
?>