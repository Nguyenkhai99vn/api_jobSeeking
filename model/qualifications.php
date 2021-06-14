<?php
class qualifications{
    private $conn;

    //account properties
    public $ID_Qualifications;
    public $QName;

    //connect db

    public function __construct($db){
        $this ->conn = $db;

    }

    // read data
    public function read(){
        $query = "SELECT * FROM qualifications ORDER BY ID_Qualifications DESC";
        
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }

    public function show(){
        $query = "SELECT * FROM qualifications WHERE ID_Qualifications=? LIMIT 1";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->ID_Qualifications);
        
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $this->ID_Qualifications = $row['ID_Qualifications'];
        $this->QName = $row['QName'];

        return $stmt;
    }

    public function create(){
        $query = "INSERT INTO qualifications SET ID_Qualifications=:ID_Qualifications ,QName=:QName ";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->ID_Qualifications = htmlspecialchars(strip_tags($this->ID_Qualifications));
        $this->QName = htmlspecialchars(strip_tags($this->QName));

        $stmt->bindParam(':ID_Qualifications',$this->ID_Qualifications);
        $stmt->bindParam(':QName',$this->QName);

        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }

    public function update(){
        $query = "UPDATE qualifications SET ID_Qualifications=:ID_Qualifications ,QName=:QName WHERE ID_Qualifications=:ID_Qualifications";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->ID_Qualifications = htmlspecialchars(strip_tags($this->ID_Qualifications));
        $this->QName = htmlspecialchars(strip_tags($this->QName));

        $stmt->bindParam(':ID_Qualifications',$this->ID_Qualifications);
        $stmt->bindParam(':QName',$this->QName);

        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }

    public function delete(){
        $query = "DELETE FROM qualifications WHERE ID_Qualifications=:ID_Qualifications";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->ID_Qualifications = htmlspecialchars(strip_tags($this->ID_Qualifications));

        $stmt->bindParam(':ID_Qualifications',$this->ID_Qualifications);
        
        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }
}
?>