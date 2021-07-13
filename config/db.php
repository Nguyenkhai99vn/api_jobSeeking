<?php
class db{

    private $servername = "mysql-38338-0.cloudclusters.net";
    private $username = "admin";
    private $password = "0jHQURMq";
    private $db = "jobseeking";

    private $conn ;
    public function connect(){
        $this->conn = null;
        try {
        $this->conn = new PDO("mysql:host=".$this ->servername.";port=38338;dbname=".$this->db."", $this->username, $this->password);
        // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        } 
        return $this->conn;
    }   

}
?>
