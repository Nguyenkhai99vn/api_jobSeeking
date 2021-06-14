<?php
class work{
    private $conn;

    //account properties
    public $ID_Work;
    public $WName;

    //connect db

    public function __construct($db){
        $this ->conn = $db;

    }

    // read data
    public function read(){
        $query = "SELECT * FROM work ORDER BY ID_Work DESC";
        
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }

    public function show(){
        $query = "SELECT * FROM work WHERE ID_Work=? LIMIT 1";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->ID_Work);
        
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $this->ID_Work = $row['ID_Work'];
        $this->WName = $row['WName'];

        return $stmt;
    }

    public function create(){
        $query = "INSERT INTO work SET ID_Work=:ID_Work ,WName=:WName ";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->ID_Work = htmlspecialchars(strip_tags($this->ID_Work));
        $this->WName = htmlspecialchars(strip_tags($this->WName));

        $stmt->bindParam(':ID_Work',$this->ID_Work);
        $stmt->bindParam(':WName',$this->WName);

        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }

    public function update(){
        $query = "UPDATE work SET ID_Work=:ID_Work ,WName=:WName WHERE ID_Work=:ID_Work";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->ID_Work = htmlspecialchars(strip_tags($this->ID_Work));
        $this->WName = htmlspecialchars(strip_tags($this->WName));

        $stmt->bindParam(':ID_Work',$this->ID_Work);
        $stmt->bindParam(':WName',$this->WName);

        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }

    public function delete(){
        $query = "DELETE FROM work WHERE ID_Work=:ID_Work";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->ID_Work = htmlspecialchars(strip_tags($this->ID_Work));

        $stmt->bindParam(':ID_Work',$this->ID_Work);
        
        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }
}
?>