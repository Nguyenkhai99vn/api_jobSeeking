<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once('../../config/db.php');
    include_once('../../model/recruitment.php');

    $db = new db();
    $connect = $db->connect();

    $recruitment = new recruitment($connect);
    $recruitment->ID_Recruitment = isset($_GET['ID_Recruitment']) ? $_GET['ID_Recruitment'] : die();

    $recruitment->show();

    $recruitment_item = array(
        'ID_Recruitment'=> $recruitment->ID_Recruitment,
        'ID_Recruiter'=> $recruitment->ID_Recruiter,
        'ID_Job' => $recruitment->ID_Job,
        'ID_Style' => $recruitment->ID_Style,
        'Title' => $recruitment->Title,
        'Content' => $recruitment->Content,
        'Salary' => $recruitment->Salary
    );

    print_r(json_encode($recruitment_item));
?>