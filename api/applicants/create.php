<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once('../../config/db.php');
    include_once('../../model/applicants.php');

    $db = new db();
    $connect = $db->connect();

    $applicants = new applicants($connect);

    $data = json_decode(file_get_contents("php://input"));
    $applicants->ID_Applicants = $data->ID_Applicants;
    $applicants->Email = $data->Email;
    $applicants->FirstName = $data->FirstName;
    $applicants->LastName = $data->LastName;
    $applicants->Gender = $data->Gender;
    $applicants->PhoneNumber = $data->PhoneNumber;
    $applicants->DateOfBirth = $data->DateOfBirth;
    $applicants->Locat = $data->Locat;
    $applicants->Assess = $data->Assess;
    $applicants->CV = $data->CV;
    $applicants->ID_Work = $data->ID_Work;
    $applicants->ID_Qualifications = $data->ID_Qualifications;
    $applicants->ID_Rank = $data->ID_Rank;

    if($applicants->create()){
        echo json_encode(array('message', 'applicants create'));
    }else{
        echo json_encode(array('message', 'applicants not create'));

    }
?>