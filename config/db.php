<?php
class db{

    private $servername = "sql4.freesqldatabase.com";
    private $username = "sql4421894";
    private $password = "qBgAkf2yKt";
    private $db = "sql4421894";

    private $conn ;
    public function connect(){
        $this->conn = null;
        try {
        $this->conn = new PDO("mysql:host=".$this ->servername.";port=3306;dbname=".$this->db."", $this->username, $this->password);
        // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
        } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        } 
        return $this->conn;
    }   

}
?>
