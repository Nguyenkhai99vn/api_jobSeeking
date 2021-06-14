<?php
class recruiter{
    private $conn;

    //account properties
    public $ID_Recruiter;
    public $RName;
    public $Email;
    public $PhoneNumber;
    public $Locat;
    public $Assess;

    //connect db

    public function __construct($db){
        $this ->conn = $db;

    }

    // read data
    public function read(){
        $query = "SELECT * FROM recruiter ORDER BY ID_Recruiter DESC";
        
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }

    public function show(){
        $query = "SELECT * FROM recruiter WHERE ID_Recruiter=? LIMIT 1";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->ID_Recruiter);
        
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $this->ID_Recruiter = $row['ID_Recruiter'];
        $this->RName = $row['RName'];
        $this->Email = $row['Email'];
        $this->PhoneNumber = $row['PhoneNumber'];
        $this->Locat = $row['Locat'];
        $this->Assess = $row['Assess'];

        return $stmt;
    }

    public function create(){
        $query = "INSERT INTO recruiter SET ID_Recruiter=:ID_Recruiter, RName=:RName 
                        ,Email=:Email ,PhoneNumber=:PhoneNumber 
                        ,Locat=:Locat ,Assess=:Assess ";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->ID_Recruiter = htmlspecialchars(strip_tags($this->ID_Recruiter));
        $this->RName = htmlspecialchars(strip_tags($this->RName));
        $this->Email = htmlspecialchars(strip_tags($this->Email));
        $this->PhoneNumber = htmlspecialchars(strip_tags($this->PhoneNumber));
        $this->Locat = htmlspecialchars(strip_tags($this->Locat));
        $this->Assess = htmlspecialchars(strip_tags($this->Assess));

        $stmt->bindParam(':ID_Recruiter',$this->ID_Recruiter);
        $stmt->bindParam(':RName',$this->RName);
        $stmt->bindParam(':Email',$this->Email);
        $stmt->bindParam(':PhoneNumber',$this->PhoneNumber);
        $stmt->bindParam(':Locat',$this->Locat);
        $stmt->bindParam(':Assess',$this->Assess);

        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }

    public function update(){
        $query = "UPDATE recruiter SET  ID_Recruiter=:ID_Recruiter, RName=:RName 
        ,Email=:Email ,PhoneNumber=:PhoneNumber 
        ,Locat=:Locat ,Assess=:Assess WHERE ID_Recruiter=:ID_Recruiter";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->ID_Recruiter = htmlspecialchars(strip_tags($this->ID_Recruiter));
        $this->RName = htmlspecialchars(strip_tags($this->RName));
        $this->Email = htmlspecialchars(strip_tags($this->Email));
        $this->PhoneNumber = htmlspecialchars(strip_tags($this->PhoneNumber));
        $this->Locat = htmlspecialchars(strip_tags($this->Locat));
        $this->Assess = htmlspecialchars(strip_tags($this->Assess));

        $stmt->bindParam(':ID_Recruiter',$this->ID_Recruiter);
        $stmt->bindParam(':RName',$this->RName);
        $stmt->bindParam(':Email',$this->Email);
        $stmt->bindParam(':PhoneNumber',$this->PhoneNumber);
        $stmt->bindParam(':Locat',$this->Locat);
        $stmt->bindParam(':Assess',$this->Assess);

        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }

    public function delete(){
        $query = "DELETE FROM recruiter WHERE ID_Recruiter=:ID_Recruiter";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->ID_Recruiter = htmlspecialchars(strip_tags($this->ID_Recruiter));

        $stmt->bindParam(':ID_Recruiter',$this->ID_Recruiter);
        
        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }
}
?>