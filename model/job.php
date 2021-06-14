<?php
class job{
    private $conn;

    //account properties
    public $ID_Job;
    public $JName;

    //connect db

    public function __construct($db){
        $this ->conn = $db;

    }

    // read data
    public function read(){
        $query = "SELECT * FROM job ORDER BY ID_Job DESC";
        
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }

    public function show(){
        $query = "SELECT * FROM job WHERE ID_Job=? LIMIT 1";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->ID_Job);
        
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $this->ID_Job = $row['ID_Job'];
        $this->JName = $row['JName'];

        return $stmt;
    }

    public function create(){
        $query = "INSERT INTO job SET ID_Job=:ID_Job ,JName=:JName ";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->ID_Job = htmlspecialchars(strip_tags($this->ID_Job));
        $this->JName = htmlspecialchars(strip_tags($this->JName));

        $stmt->bindParam(':ID_Job',$this->ID_Job);
        $stmt->bindParam(':JName',$this->JName);

        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }

    public function update(){
        $query = "UPDATE job SET ID_Job=:ID_Job ,JName=:JName WHERE ID_Job=:ID_Job";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->ID_Job = htmlspecialchars(strip_tags($this->ID_Job));
        $this->JName = htmlspecialchars(strip_tags($this->JName));

        $stmt->bindParam(':ID_Job',$this->ID_Job);
        $stmt->bindParam(':JName',$this->JName);

        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }

    public function delete(){
        $query = "DELETE FROM job WHERE ID_Job=:ID_Job";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->ID_Job = htmlspecialchars(strip_tags($this->ID_Job));

        $stmt->bindParam(':ID_Job',$this->ID_Job);
        
        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }
}
?>