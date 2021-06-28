<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once('../../config/db.php');
    include_once('../../model/recruiter.php');

    $db = new db();
    $connect = $db->connect();

    $recruiter = new recruiter($connect);
    $recruiter->ID_Recruiter = isset($_GET['ID_Recruiter']) ? $_GET['ID_Recruiter'] : die();

    $recruiter->show();

    $recruiter_item = array(
        'ID_Recruiter'=> $recruiter->ID_Recruiter,
        'RName'=> $recruiter->RName,
        'Email'=> $recruiter->Email,
        'PhoneNumber' => $recruiter->PhoneNumber,
        'Locat' => $recruiter->Locat,
        'Assess' => $recruiter->Assess,
        'Avatar' => $recruiter->Avatar,
        'Cover' => $recruiter->Cover,
    );

    print_r(json_encode($recruiter_item));
?>