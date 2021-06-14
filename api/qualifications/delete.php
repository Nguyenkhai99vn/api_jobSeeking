<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods:DELETE');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once('../../config/db.php');
    include_once('../../model/qualifications.php');

    $db = new db();
    $connect = $db->connect();

    $qualifications = new qualifications($connect);

    $data = json_decode(file_get_contents("php://input"));

    $qualifications->ID_Qualifications = $data->ID_Qualifications;

    if($qualifications->delete()){
        echo json_encode(array('message', 'qualifications deleted'));
    }else{
        echo json_encode(array('message', 'qualifications not deleted'));

    }
?>