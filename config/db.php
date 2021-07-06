<?php
class db{

    private $servername = "remotemysql.com";
    private $username = "QXdKkTak6C";
    private $password = "JveZTqi5ya";
    private $db = "QXdKkTak6C";

    private $conn ;
    public function connect(){
        $this->conn = null;
        try {
        $this->conn = new PDO("mysql:host=".$this ->servername.";port=3306;dbname=".$this->db."", $this->username, $this->password);
        // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        } 
        return $this->conn;
    }   

}
?>
