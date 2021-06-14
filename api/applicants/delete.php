<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods:DELETE');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once('../../config/db.php');
    include_once('../../model/applicants.php');

    $db = new db();
    $connect = $db->connect();

    $applicants = new applicants($connect);

    $data = json_decode(file_get_contents("php://input"));

    $applicants->ID_Applicants = $data->ID_Applicants;


    if($applicants->delete()){
        echo json_encode(array('message', 'applicants deleted'));
    }else{
        echo json_encode(array('message', 'applicants not deleted'));

    }
?>