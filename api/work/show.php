<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once('../../config/db.php');
    include_once('../../model/work.php');

    $db = new db();
    $connect = $db->connect();

    $work = new work($connect);
    $work->ID_Work = isset($_GET['ID_Work']) ? $_GET['ID_Work'] : die();

    $work->show();

    $work_item = array(
        'ID_Work'=> $work->ID_Work,
        'WName'=> $work->WName
    );

    print_r(json_encode($work_item));
?>