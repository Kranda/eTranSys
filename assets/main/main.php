<?php 
session_start();
require('connector.php');
class mainDB {
    public $pdo;
    public $db;
    function __construct($db) {
        $this->db = $db;
        $connect = new connect($this->db);
        $this->pdo = $connect->conn->pdo;
    }

}

