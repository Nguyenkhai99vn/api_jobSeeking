<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once('../../config/db.php');
    include_once('../../model/chat.php');

    $db = new db();
    $connect = $db->connect();

    $chat = new chat($connect);

    $data = json_decode(file_get_contents("php://input"));
    $chat->ID_Chat = $data->ID_Chat;
    $chat->ID_Recruiter = $data->ID_Recruiter;
    $chat->ID_Applicants = $data->ID_Applicants;
    $chat->PathFile = $data->PathFile;


    if($chat->create()){
        echo json_encode(array('message', 'chat create'));
    }else{
        echo json_encode(array('message', 'chat not create'));

    }
?>