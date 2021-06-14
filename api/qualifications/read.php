<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once('../../config/db.php');
    include_once('../../model/qualifications.php');

    $db = new db();
    $connect = $db->connect();

    $qualifications = new qualifications($connect);
    $read = $qualifications->read();

    $num = $read->rowCount();

    if($num>0){
        $qualifications_array = [];
        $qualifications_array['qualifications'] = [];
        while($row = $read->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $qualifications_item = array(
                'ID_Qualifications'=> $ID_Qualifications,
                'QName'=> $QName
            );
            array_push($qualifications_array['qualifications'],$qualifications_item);
        }
        echo json_encode($qualifications_array);
    }


?>