<?php
class rank{
    private $conn;

    //account properties
    public $ID_Rank;
    public $RName;

    //connect db

    public function __construct($db){
        $this ->conn = $db;

    }

    // read data
    public function read(){
        $query = "SELECT * FROM rank ORDER BY ID_Rank DESC";
        
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }

    public function show(){
        $query = "SELECT * FROM rank WHERE ID_Rank=? LIMIT 1";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->ID_Rank);
        
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $this->ID_Rank = $row['ID_Rank'];
        $this->RName = $row['RName'];

        return $stmt;
    }

    public function create(){
        $query = "INSERT INTO rank SET ID_Rank=:ID_Rank ,RName=:RName";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->ID_Rank = htmlspecialchars(strip_tags($this->ID_Rank));
        $this->RName = htmlspecialchars(strip_tags($this->RName));

        $stmt->bindParam(':ID_Rank',$this->ID_Rank);
        $stmt->bindParam(':RName',$this->RName);

        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }

    public function update(){
        $query = "UPDATE rank SET ID_Rank=:ID_Rank ,RName=:RName WHERE ID_Rank=:ID_Rank";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->ID_Rank = htmlspecialchars(strip_tags($this->ID_Rank));
        $this->RName = htmlspecialchars(strip_tags($this->RName));

        $stmt->bindParam(':ID_Rank',$this->ID_Rank);
        $stmt->bindParam(':RName',$this->RName);

        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }

    public function delete(){
        $query = "DELETE FROM rank WHERE ID_Rank=:ID_Rank";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->ID_Rank = htmlspecialchars(strip_tags($this->ID_Rank));

        $stmt->bindParam(':ID_Rank',$this->ID_Rank);
        
        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }
}
?>