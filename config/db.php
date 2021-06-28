<?php
class db{

<<<<<<< HEAD
    private $servername = "sql4.freesqldatabase.com";
    private $username = "sql4421894";
    private $password = "qBgAkf2yKt";
    private $db = "sql4421894";
=======
    private $servername = "ec2-54-158-232-223.compute-1.amazonaws.com";
    private $username = "ohotaacccymjth";
    private $password = "9ac043705e78d8194b5b5653f2e996ce7c8cb16a800783ec65db6f2812a5af17";
    private $db = "dcvug781gegej4";
>>>>>>> fd1e41b204136842752c19a6f43ad8f7fb9c0232
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
