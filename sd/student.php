<?php
class Student{
// database
   private $db;

// Table
   private $db_table ="student";

// Columns
public $name;
public $regid;
public $class;
public $sec;
public $mobileno; 
public $anotherno;
public $email;
public $password;

// Database

public function __construct($db){
    $this->db = $db;
}
//create
public function createStudent()
 {
   $this->name=htmlspecialchars(strip_tags($this->name));
   $this->regid=htmlspecialchars(strip_tags($this->regid));
   $this->class=htmlspecialchars(strip_tags($this->class));
   $this->sec=htmlspecialchars(strip_tags($this->sec));
   $this->mobileno=htmlspecialchars(strip_tags($this->mobileno));
   $this->anotherno=htmlspecialchars(strip_tags($this->anotherno));
   $this->email=htmlspecialchars(strip_tags($this->email));
   $this->password=htmlspecialchars(strip_tags($this->password));
     
  
      $sqlQuery = "INSERT INTO ". $this->db_table ." 
        SET name = '".$this->name."',
        regid    = '".$this->regid."',
        class    = '".$this->class."',
        sec      = '".$this->sec."',
        mobileno = '".$this->mobileno."',
        anotherno= '".$this->anotherno."',
        email    = '".$this->email."',
        password = '".$this->password."'";
       
    $this->db->query($sqlQuery);
    if($this->db->affected_rows > 0)
    { 
    return true;
    }
  
 }   
 // GET ALL
 public function getStudent(){
   $sqlQuery = "SELECT regid, name,class,sec,mobileno,anotherno,password,email FROM " . $this->db_table . "";
   $this->result = $this->db->query($sqlQuery);
   return $this->result;
}
//get Single user by regid
public function getSingleStudent(){
   $sqlQuery = "SELECT regid,name, password FROM
   ". $this->db_table ." WHERE regid = '".$this->regid."'";
   try{
      $record = $this->db->query($sqlQuery);
      $dataRow = $record->fetch_assoc();
   if($dataRow['regid'] != null) {
      $this->regid=$dataRow['regid'];
      $this->password = $dataRow['password'];
      $this->name = $dataRow['name'];
   } else {
      $this->regid = null;
      $this->password = null;
      $this->status = false;
   }
}
   catch(Exception $e) {
      $this->regid = null;
      $this->password = null;
      $this->status = false;
   }
}

function deleteStudent(){
   $sqlQuery = "DELETE FROM " . $this->db_table. " WHERE regid = '".$this->regid."'";
   $this->db->query($sqlQuery);
   if($this->db->affected_rows > 0) //affected_rows  it returns the a affected row count
   {
   return true;
   }
   return false;
   }

function singleStudent() {
   $sqlQuery = "SELECT * FROM ".$this->db_table." WHERE regid = '".$this->regid."'";
   $record = $this->db->query($sqlQuery);
   $dataRow = $record->fetch_assoc();
   $this->regid = $dataRow['regid'];
   $this->name = $dataRow['name'];
   $this->email = $dataRow['email'];
   $this->password = $dataRow['password'];
   $this->class = $dataRow['class'];
   $this->sec = $dataRow['sec'];
   $this->mobileno = $dataRow['mobileno'];
   $this->anotherno = $dataRow['anotherno'];
}

function updateStudent() {
   $this->name=htmlspecialchars(strip_tags($this->name));
   $this->regid=htmlspecialchars(strip_tags($this->regid));
   $this->class=htmlspecialchars(strip_tags($this->class));
   $this->sec=htmlspecialchars(strip_tags($this->sec));
   $this->mobileno=htmlspecialchars(strip_tags($this->mobileno));
   $this->anotherno=htmlspecialchars(strip_tags($this->anotherno));
   $this->email=htmlspecialchars(strip_tags($this->email));
   $this->password=htmlspecialchars(strip_tags($this->password));
   
   $sqlQuery = "UPDATE ". $this->db_table ." SET name = '".$this->name."',
   regid    = '".$this->regid."',
   class    = '".$this->class."',
   sec      = '".$this->sec."',
   mobileno = '".$this->mobileno."',
   anotherno= '".$this->anotherno."',
   email    = '".$this->email."',
   password = '".$this->password."'
   WHERE regid = '".$this->regid."'";
   
   $this->db->query($sqlQuery);
   if($this->db->affected_rows > 0){
   return true;
   }
   return false;
   }
}
?>

