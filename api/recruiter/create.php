<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once('../../config/db.php');
    include_once('../../model/recruiter.php');

    $db = new db();
    $connect = $db->connect();

    $recruiter = new recruiter($connect);

    $data = json_decode(file_get_contents("php://input"));
    $recruiter->ID_Recruiter = $data->ID_Recruiter;
    $recruiter->RName = $data->RName;
    $recruiter->Email = $data->Email;
    $recruiter->PhoneNumber = $data->PhoneNumber;
    $recruiter->Locat = $data->Locat;
    $recruiter->Assess = $data->Assess;
    $recruiter->Avatar = $data->Avatar;
    $recruiter->Cover = $data->Cover;

    if($recruiter->create()){
        echo json_encode(array('message', 'recruiter create'));
    }else{
        echo json_encode(array('message', 'recruiter not create'));

    }
?>