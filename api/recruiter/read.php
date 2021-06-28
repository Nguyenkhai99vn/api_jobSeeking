<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once('../../config/db.php');
    include_once('../../model/recruiter.php');

    $db = new db();
    $connect = $db->connect();

    $recruiter = new recruiter($connect);
    $read = $recruiter->read();

    $num = $read->rowCount();

    if($num>0){
        $recruiter_array = [];
        $recruiter_array['recruiter'] = [];
        while($row = $read->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $recruiter_item = array(
                'ID_Recruiter'=> $ID_Recruiter,
                'RName'=> $RName,
                'Email'=> $Email,
                'PhoneNumber' => $PhoneNumber,
                'Locat' => $Locat,
                'Assess' => $Assess,
                'Avatar' => $Avatar,
                'Cover' => $Cover
            );
            array_push($recruiter_array['recruiter'],$recruiter_item);
        }
        echo json_encode($recruiter_array);
    }


?>