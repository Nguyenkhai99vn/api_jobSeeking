<?php
class applicants{
    private $conn;

    //account properties
    public $ID_Applicants;
    public $Email;
    public $FirstName;
    public $LastName;
    public $Gender;
    public $PhoneNumber;
    public $DateOfBirth;
    public $Locat;
    public $Assess;
    public $CV;
    public $Avatar;
    public $Cover;
    public $ID_Work;
    public $ID_Qualifications;
    public $ID_Rank;

    //connect db

    public function __construct($db){
        $this ->conn = $db;

    }

    // read data
    public function read(){
        $query = "SELECT * FROM applicants ORDER BY ID_Applicants DESC";
        
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }

    public function show(){
        $query = "SELECT * FROM applicants WHERE ID_Applicants=? LIMIT 1";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->ID_Applicants);
        
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $this->ID_Applicants = $row['ID_Applicants'];
        $this->Email = $row['Email'];
        $this->FirstName = $row['FirstName'];
        $this->LastName = $row['LastName'];
        $this->Gender = $row['Gender'];
        $this->PhoneNumber = $row['PhoneNumber'];
        $this->DateOfBirth = $row['DateOfBirth'];
        $this->Locat = $row['Locat'];
        $this->Assess = $row['Assess'];
        $this->CV = $row['CV'];
        $this->Avatar = $row['Avatar'];
        $this->Cover = $row['Cover'];
        $this->ID_Work = $row['ID_Work'];
        $this->ID_Qualifications = $row['ID_Qualifications'];
        $this->ID_Rank = $row['ID_Rank'];

        return $stmt;
    }

    public function create(){
        $query = "INSERT INTO applicants SET ID_Applicants=:ID_Applicants ,Email=:Email 
                        ,FirstName=:FirstName ,LastName=:LastName ,Gender=:Gender 
                        ,PhoneNumber=:PhoneNumber ,DateOfBirth=:DateOfBirth ,Locat=:Locat 
                        ,Assess=:Assess ,CV=:CV ,Avatar=:Avatar ,Cover=:Cover,ID_Work=:ID_Work 
                        ,ID_Qualifications=:ID_Qualifications ,ID_Rank=:ID_Rank";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->ID_Applicants = htmlspecialchars(strip_tags($this->ID_Applicants));
        $this->Email = htmlspecialchars(strip_tags($this->Email));
        $this->FirstName = htmlspecialchars(strip_tags($this->FirstName));
        $this->LastName = htmlspecialchars(strip_tags($this->LastName));
        $this->Gender = htmlspecialchars(strip_tags($this->Gender));
        $this->PhoneNumber = htmlspecialchars(strip_tags($this->PhoneNumber));
        $this->DateOfBirth = htmlspecialchars(strip_tags($this->DateOfBirth));
        $this->Locat = htmlspecialchars(strip_tags($this->Locat));
        $this->Assess = htmlspecialchars(strip_tags($this->Assess));
        $this->CV = htmlspecialchars(strip_tags($this->CV));
        $this->Avatar = htmlspecialchars(strip_tags($this->Avatar));
        $this->Cover = htmlspecialchars(strip_tags($this->Cover));
        $this->ID_Work = htmlspecialchars(strip_tags($this->ID_Work));
        $this->ID_Qualifications = htmlspecialchars(strip_tags($this->ID_Qualifications));
        $this->ID_Rank = htmlspecialchars(strip_tags($this->ID_Rank));

        $stmt->bindParam(':ID_Applicants',$this->ID_Applicants);
        $stmt->bindParam(':Email',$this->Email);
        $stmt->bindParam(':FirstName',$this->FirstName);
        $stmt->bindParam(':LastName',$this->LastName);
        $stmt->bindParam(':Gender',$this->Gender);
        $stmt->bindParam(':PhoneNumber',$this->PhoneNumber);
        $stmt->bindParam(':DateOfBirth',$this->DateOfBirth);
        $stmt->bindParam(':Locat',$this->Locat);
        $stmt->bindParam(':Assess',$this->Assess);
        $stmt->bindParam(':CV',$this->CV);
        $stmt->bindParam(':Avatar',$this->Avatar);
        $stmt->bindParam(':Cover',$this->Cover);
        $stmt->bindParam(':ID_Work',$this->ID_Work);
        $stmt->bindParam(':ID_Qualifications',$this->ID_Qualifications);
        $stmt->bindParam(':ID_Rank',$this->ID_Rank);

        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }

    public function update(){
        $query = "UPDATE applicants SET  ID_Applicants=:ID_Applicants ,Email=:Email 
        ,FirstName=:FirstName ,LastName=:LastName ,Gender=:Gender 
        ,PhoneNumber=:PhoneNumber ,DateOfBirth=:DateOfBirth ,Locat=:Locat 
        ,Assess=:Assess ,CV=:CV ,Avatar=:Avatar ,Cover=:Cover,ID_Work=:ID_Work
        ,ID_Qualifications=:ID_Qualifications ,ID_Rank=:ID_Rank WHERE ID_Applicants=:ID_Applicants";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->ID_Applicants = htmlspecialchars(strip_tags($this->ID_Applicants));
        $this->Email = htmlspecialchars(strip_tags($this->Email));
        $this->FirstName = htmlspecialchars(strip_tags($this->FirstName));
        $this->LastName = htmlspecialchars(strip_tags($this->LastName));
        $this->Gender = htmlspecialchars(strip_tags($this->Gender));
        $this->PhoneNumber = htmlspecialchars(strip_tags($this->PhoneNumber));
        $this->DateOfBirth = htmlspecialchars(strip_tags($this->DateOfBirth));
        $this->Locat = htmlspecialchars(strip_tags($this->Locat));
        $this->Assess = htmlspecialchars(strip_tags($this->Assess));
        $this->CV = htmlspecialchars(strip_tags($this->CV));
        $this->Avatar = htmlspecialchars(strip_tags($this->Avatar));
        $this->Cover = htmlspecialchars(strip_tags($this->Cover));
        $this->ID_Work = htmlspecialchars(strip_tags($this->ID_Work));
        $this->ID_Qualifications = htmlspecialchars(strip_tags($this->ID_Qualifications));
        $this->ID_Rank = htmlspecialchars(strip_tags($this->ID_Rank));

        $stmt->bindParam(':ID_Applicants',$this->ID_Applicants);
        $stmt->bindParam(':Email',$this->Email);
        $stmt->bindParam(':FirstName',$this->FirstName);
        $stmt->bindParam(':LastName',$this->LastName);
        $stmt->bindParam(':Gender',$this->Gender);
        $stmt->bindParam(':PhoneNumber',$this->PhoneNumber);
        $stmt->bindParam(':DateOfBirth',$this->DateOfBirth);
        $stmt->bindParam(':Locat',$this->Locat);
        $stmt->bindParam(':Assess',$this->Assess);
        $stmt->bindParam(':CV',$this->CV);
        $stmt->bindParam(':Avatar',$this->Avatar);
        $stmt->bindParam(':Cover',$this->Cover);
        $stmt->bindParam(':ID_Work',$this->ID_Work);
        $stmt->bindParam(':ID_Qualifications',$this->ID_Qualifications);
        $stmt->bindParam(':ID_Rank',$this->ID_Rank);

        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }

    public function delete(){
        $query = "DELETE FROM applicants WHERE ID_Applicants=:ID_Applicants";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->ID_Applicants = htmlspecialchars(strip_tags($this->ID_Applicants));

        $stmt->bindParam(':ID_Applicants',$this->ID_Applicants);
        
        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }
}
?>