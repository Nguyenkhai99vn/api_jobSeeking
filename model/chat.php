<?php
class chat{
    private $conn;

    //account properties
    public $ID_Chat;
    public $ID_Recruiter;
    public $ID_Applicants;
    public $PathFile;

    //connect db

    public function __construct($db){
        $this ->conn = $db;

    }

    // read data
    public function read(){
        $query = "SELECT * FROM chat ORDER BY ID_Chat DESC";
        
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }

    public function show(){
        $query = "SELECT * FROM chat WHERE ID_Chat=? LIMIT 1";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->ID_Chat);
        
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $this->ID_Chat = $row['ID_Chat'];
        $this->ID_Recruiter = $row['ID_Recruiter'];
        $this->ID_Applicants = $row['ID_Applicants'];
        $this->PathFile = $row['PathFile'];


        return $stmt;
    }

    public function create(){
        $query = "INSERT INTO chat SET ID_Chat=:ID_Chat ,ID_Recruiter=:ID_Recruiter ,ID_Applicants=:ID_Applicants ,PathFile=:PathFile ";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->ID_Chat = htmlspecialchars(strip_tags($this->ID_Chat));
        $this->ID_Recruiter = htmlspecialchars(strip_tags($this->ID_Recruiter));
        $this->ID_Applicants = htmlspecialchars(strip_tags($this->ID_Applicants));
        $this->PathFile = htmlspecialchars(strip_tags($this->PathFile));

        $stmt->bindParam(':ID_Chat',$this->ID_Chat);
        $stmt->bindParam(':ID_Recruiter',$this->ID_Recruiter);
        $stmt->bindParam(':ID_Applicants',$this->ID_Applicants);
        $stmt->bindParam(':PathFile',$this->PathFile);

        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }

    public function update(){
        $query = "UPDATE chat SET ID_Chat=:ID_Chat ,ID_Recruiter=:ID_Recruiter ,ID_Applicants=:ID_Applicants ,PathFile=:PathFile WHERE ID_Chat=:ID_Chat";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->ID_Chat = htmlspecialchars(strip_tags($this->ID_Chat));
        $this->ID_Recruiter = htmlspecialchars(strip_tags($this->ID_Recruiter));
        $this->ID_Applicants = htmlspecialchars(strip_tags($this->ID_Applicants));
        $this->PathFile = htmlspecialchars(strip_tags($this->PathFile));

        $stmt->bindParam(':ID_Chat',$this->ID_Chat);
        $stmt->bindParam(':ID_Recruiter',$this->ID_Recruiter);
        $stmt->bindParam(':ID_Applicants',$this->ID_Applicants);
        $stmt->bindParam(':PathFile',$this->PathFile);

        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }

    public function delete(){
        $query = "DELETE FROM chat WHERE ID_Chat=:ID_Chat";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->ID_Chat = htmlspecialchars(strip_tags($this->ID_Chat));

        $stmt->bindParam(':ID_Chat',$this->ID_Chat);
        
        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }
}
?>