<?php

class Database {
  
  // Setting environment variables for use in webpage
  
  private $host = "localhost";
	private $user = "suraj";
	private $password = "";
	private $database = "labproject";
	private $conn;
  
  // constructor for class that is called when an object is created
  function __construct() {
    $this->conn = $this->connectDatabase();
  }
  
  // connects to the database using the variables
  function connectDatabase() {
    $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
    return $conn;
  }
  
  
  
  
  
  
  
  
}