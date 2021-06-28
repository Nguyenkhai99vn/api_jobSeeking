<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once('../../config/db.php');
    include_once('../../model/applicants.php');

    $db = new db();
    $connect = $db->connect();

    $applicants = new applicants($connect);
    $applicants->ID_Applicants = isset($_GET['ID_Applicants']) ? $_GET['ID_Applicants'] : die();

    $applicants->show();

    $applicants_item = array(
        'ID_Applicants'=> $applicants->ID_Applicants,
        'Email'=> $applicants->Email,
        'FirstName' => $applicants->FirstName,
        'LastName' => $applicants->LastName,
        'Gender' => $applicants->Gender,
        'PhoneNumber' => $applicants->PhoneNumber,
        'DateOfBirth' => $applicants->DateOfBirth,
        'Locat' => $applicants->Locat,
        'Assess' => $applicants->Assess,
        'CV' => $applicants->CV,
        'Avatar' => $applicants->Avatar,
        'Cover' => $applicants->Cover,
        'ID_Work' => $applicants->ID_Work,
        'ID_Qualifications' => $applicants->ID_Qualifications,
        'ID_Rank' => $applicants->ID_Rank
    );

    print_r(json_encode($applicants_item));
?>