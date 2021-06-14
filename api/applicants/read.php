<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once('../../config/db.php');
    include_once('../../model/applicants.php');

    $db = new db();
    $connect = $db->connect();

    $applicants = new applicants($connect);
    $read = $applicants->read();

    $num = $read->rowCount();

    if($num>0){
        $applicants_array = [];
        $applicants_array['applicants'] = [];
        while($row = $read->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $applicants_item = array(
                'ID_Applicants'=> $ID_Applicants,
                'Email'=> $Email,
                'FirstName' => $FirstName,
                'LastName' => $LastName,
                'Gender' => $Gender,
                'PhoneNumber' => $PhoneNumber,
                'DateOfBirth' => $DateOfBirth,
                'Locat' => $Locat,
                'Assess' => $Assess,
                'CV' => $CV,
                'ID_Work' => $ID_Work,
                'ID_Qualifications' => $ID_Qualifications,
                'ID_Rank' => $ID_Rank
            );
            array_push($applicants_array['applicants'],$applicants_item);
        }
        echo json_encode($applicants_array);
    }


?>