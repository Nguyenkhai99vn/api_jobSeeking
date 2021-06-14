<?php
class account{
    private $conn;

    //account properties
    public $Email;
    public $Pass;
    public $Sta;

    //connect db

    public function __construct($db){
        $this ->conn = $db;

    }

    // read data
    public function read(){
        $query = "SELECT * FROM account ORDER BY Email DESC";
        
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }

    public function show(){
        $query = "SELECT * FROM account WHERE Email=? LIMIT 1";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->Email);
        
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $this->Email = $row['Email'];
        $this->Pass = $row['Pass'];
        $this->Sta = $row['Sta'];

        return $stmt;
    }

    public function create(){
        $query = "INSERT INTO account SET Email=:Email ,Pass=:Pass ,Sta=:Sta ";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->Email = htmlspecialchars(strip_tags($this->Email));
        $this->Pass = htmlspecialchars(strip_tags($this->Pass));
        $this->Sta = htmlspecialchars(strip_tags($this->Sta));

        $stmt->bindParam(':Email',$this->Email);
        $stmt->bindParam(':Pass',$this->Pass);
        $stmt->bindParam(':Sta',$this->Sta);

        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }

    public function update(){
        $query = "UPDATE account SET Email=:Email ,Pass=:Pass ,Sta=:Sta WHERE Email=:Email";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->Email = htmlspecialchars(strip_tags($this->Email));
        $this->Pass = htmlspecialchars(strip_tags($this->Pass));
        $this->Sta = htmlspecialchars(strip_tags($this->Sta));

        $stmt->bindParam(':Email',$this->Email);
        $stmt->bindParam(':Pass',$this->Pass);
        $stmt->bindParam(':Sta',$this->Sta);

        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }

    public function delete(){
        $query = "DELETE FROM account WHERE Email=:Email";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->Email = htmlspecialchars(strip_tags($this->Email));

        $stmt->bindParam(':Email',$this->Email);
        
        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }
}
?>