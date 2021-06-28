<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once('../../config/db.php');
    include_once('../../model/recruitment.php');

    $db = new db();
    $connect = $db->connect();

    $recruitment = new recruitment($connect);
    $read = $recruitment->read();

    $num = $read->rowCount();

    if($num>0){
        $recruitment_array = [];
        $recruitment_array['recruitment'] = [];
        while($row = $read->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $recruitment_item = array(
                'ID_Recruitment'=> $ID_Recruitment,
                'ID_Recruiter'=> $ID_Recruiter,
                'ID_Job' => $ID_Job,
                'ID_Style' => $ID_Style,
                'Title' => $Title,
                'Descrip' => $Descrip,
                'Interest' => $Interest,
                'Request' => $Request,
                'Salary' => $Salary
            );
            array_push($recruitment_array['recruitment'],$recruitment_item);
        }
        echo json_encode($recruitment_array);
    }


?>