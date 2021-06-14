<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once('../../config/db.php');
    include_once('../../model/qualifications.php');

    $db = new db();
    $connect = $db->connect();

    $qualifications = new qualifications($connect);
    $qualifications->ID_Qualifications = isset($_GET['ID_Qualifications']) ? $_GET['ID_Qualifications'] : die();

    $qualifications->show();

    $qualifications_item = array(
        'ID_Qualifications'=> $qualifications->ID_Qualifications,
        'QName'=> $qualifications->QName
    );

    print_r(json_encode($qualifications_item));
?>