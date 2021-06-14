<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once('../../config/db.php');
    include_once('../../model/chat.php');

    $db = new db();
    $connect = $db->connect();

    $chat = new chat($connect);
    $chat->ID_Chat = isset($_GET['ID_Chat']) ? $_GET['ID_Chat'] : die();

    $chat->show();

    $chat_item = array(
        'ID_Chat'=> $chat->ID_Chat,
        'ID_Recruiter'=> $chat->ID_Recruiter,
        'ID_Applicants' => $chat->ID_Applicants,
        'PathFile' => $chat->PathFile
    );

    print_r(json_encode($chat_item));
?>