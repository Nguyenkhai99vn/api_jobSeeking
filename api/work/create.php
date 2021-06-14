<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once('../../config/db.php');
    include_once('../../model/work.php');

    $db = new db();
    $connect = $db->connect();

    $work = new work($connect);

    $data = json_decode(file_get_contents("php://input"));
    $work->ID_Work = $data->ID_Work;
    $work->WName = $data->WName;

    if($work->create()){
        echo json_encode(array('message', 'work create'));
    }else{
        echo json_encode(array('message', 'work not create'));

    }
?>