<?php
class style{
    private $conn;

    //account properties
    public $ID_Style;
    public $SName;

    //connect db

    public function __construct($db){
        $this ->conn = $db;

    }

    // read data
    public function read(){
        $query = "SELECT * FROM style ORDER BY ID_Style DESC";
        
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }

    public function show(){
        $query = "SELECT * FROM style WHERE ID_Style=? LIMIT 1";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->ID_Style);
        
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $this->ID_Style = $row['ID_Style'];
        $this->SName = $row['SName'];

        return $stmt;
    }

    public function create(){
        $query = "INSERT INTO style SET ID_Style=:ID_Style ,SName=:SName ";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->ID_Style = htmlspecialchars(strip_tags($this->ID_Style));
        $this->SName = htmlspecialchars(strip_tags($this->SName));

        $stmt->bindParam(':ID_Style',$this->ID_Style);
        $stmt->bindParam(':SName',$this->SName);

        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }

    public function update(){
        $query = "UPDATE style SET ID_Style=:ID_Style ,SName=:SName WHERE ID_Style=:ID_Style";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->ID_Style = htmlspecialchars(strip_tags($this->ID_Style));
        $this->SName = htmlspecialchars(strip_tags($this->SName));

        $stmt->bindParam(':ID_Style',$this->ID_Style);
        $stmt->bindParam(':SName',$this->SName);

        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }

    public function delete(){
        $query = "DELETE FROM style WHERE ID_Style=:ID_Style";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->ID_Style = htmlspecialchars(strip_tags($this->ID_Style));

        $stmt->bindParam(':ID_Style',$this->ID_Style);
        
        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }
}
?>