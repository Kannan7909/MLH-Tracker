<?php
include("app.php");
class DatabaseConnection
{
    protected $conn;
    public function __construct(){
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        if($this->conn->connect_error){
            die("<h1>Database connection failed");   
        }
    }
}


?>