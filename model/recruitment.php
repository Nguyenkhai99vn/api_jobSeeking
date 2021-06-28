<?php
class recruitment{
    private $conn;

    //account properties
    public $ID_Recruitment;
    public $ID_Recruiter;
    public $ID_Job;
    public $ID_Style;
    public $Title;
    public $Descrip;
    public $Interest;
    public $Request;
    public $Salary;
    //connect db

    public function __construct($db){
        $this ->conn = $db;

    }

    // read data
    public function read(){
        $query = "SELECT * FROM recruitment ORDER BY ID_Recruitment DESC";
        
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }

    public function show(){
        $query = "SELECT * FROM recruitment WHERE ID_Recruitment=? LIMIT 1";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->ID_Recruitment);
        
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $this->ID_Recruitment = $row['ID_Recruitment'];
        $this->ID_Recruiter = $row['ID_Recruiter'];
        $this->ID_Job = $row['ID_Job'];
        $this->ID_Style = $row['ID_Style'];
        $this->Title = $row['Title'];
        $this->Descrip = $row['Descrip'];
        $this->Interest = $row['Interest'];
        $this->Request = $row['Request'];
        $this->Salary = $row['Salary'];

        return $stmt;
    }

    public function create(){
        $query = "INSERT INTO recruitment SET ID_Recruitment=:ID_Recruitment ,ID_Recruiter=:ID_Recruiter 
        ,ID_Job=:ID_Job ,ID_Style=:ID_Style ,Title=:Title 
        ,Descrip=:Descrip ,Interest=:Interest ,Request=:Request ,Salary=:Salary";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->ID_Recruitment = htmlspecialchars(strip_tags($this->ID_Recruitment));
        $this->ID_Recruiter = htmlspecialchars(strip_tags($this->ID_Recruiter));
        $this->ID_Job = htmlspecialchars(strip_tags($this->ID_Job));
        $this->ID_Style = htmlspecialchars(strip_tags($this->ID_Style));
        $this->Title = htmlspecialchars(strip_tags($this->Title));
        $this->Descrip = htmlspecialchars(strip_tags($this->Descrip));
        $this->Interest = htmlspecialchars(strip_tags($this->Interest));
        $this->Request = htmlspecialchars(strip_tags($this->Request));
        $this->Salary = htmlspecialchars(strip_tags($this->Salary));

        $stmt->bindParam(':ID_Recruitment',$this->ID_Recruitment);
        $stmt->bindParam(':ID_Recruiter',$this->ID_Recruiter);
        $stmt->bindParam(':ID_Job',$this->ID_Job);
        $stmt->bindParam(':ID_Style',$this->ID_Style);
        $stmt->bindParam(':Title',$this->Title);
        $stmt->bindParam(':Descrip',$this->Descrip);
        $stmt->bindParam(':Interest',$this->Interest);
        $stmt->bindParam(':Request',$this->Request);
        $stmt->bindParam(':Salary',$this->Salary);

        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }

    public function update(){
        $query = "UPDATE recruitment SET ID_Recruitment=:ID_Recruitment ,ID_Recruiter=:ID_Recruiter 
        ,ID_Job=:ID_Job ,ID_Style=:ID_Style ,Title=:Title 
        ,Descrip=:Descrip ,Interest=:Interest ,Request=:Request,Salary=:Salary WHERE ID_Recruitment=:ID_Recruitment";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->ID_Recruitment = htmlspecialchars(strip_tags($this->ID_Recruitment));
        $this->ID_Recruiter = htmlspecialchars(strip_tags($this->ID_Recruiter));
        $this->ID_Job = htmlspecialchars(strip_tags($this->ID_Job));
        $this->ID_Style = htmlspecialchars(strip_tags($this->ID_Style));
        $this->Title = htmlspecialchars(strip_tags($this->Title));
        $this->Descrip = htmlspecialchars(strip_tags($this->Descrip));
        $this->Interest = htmlspecialchars(strip_tags($this->Interest));
        $this->Request = htmlspecialchars(strip_tags($this->Request));
        $this->Salary = htmlspecialchars(strip_tags($this->Salary));

        $stmt->bindParam(':ID_Recruitment',$this->ID_Recruitment);
        $stmt->bindParam(':ID_Recruiter',$this->ID_Recruiter);
        $stmt->bindParam(':ID_Job',$this->ID_Job);
        $stmt->bindParam(':ID_Style',$this->ID_Style);
        $stmt->bindParam(':Title',$this->Title);
        $stmt->bindParam(':Descrip',$this->Descrip);
        $stmt->bindParam(':Interest',$this->Interest);
        $stmt->bindParam(':Request',$this->Request);
        $stmt->bindParam(':Salary',$this->Salary);

        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }

    public function delete(){
        $query = "DELETE FROM recruitment WHERE ID_Recruitment=:ID_Recruitment";
        
        $stmt = $this->conn->prepare($query);

        //clean data : bỏ các kí tự đặc biệt / ko mong muốn

        $this->ID_Recruitment = htmlspecialchars(strip_tags($this->ID_Recruitment));

        $stmt->bindParam(':ID_Recruitment',$this->ID_Recruitment);
        
        if($stmt-> execute()){
            return true ;
        }
        printf("Error %s. \n " ,$stmt->error);
        return false;

    }
}
?>