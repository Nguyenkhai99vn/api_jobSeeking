<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods:DELETE');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once('../../config/db.php');
    include_once('../../model/chat.php');

    $db = new db();
    $connect = $db->connect();

    $chat = new chat($connect);

    $data = json_decode(file_get_contents("php://input"));

    $chat->ID_Chat = $data->ID_Chat;


    if($chat->delete()){
        echo json_encode(array('message', 'chat deleted'));
    }else{
        echo json_encode(array('message', 'chat not deleted'));

    }
?>