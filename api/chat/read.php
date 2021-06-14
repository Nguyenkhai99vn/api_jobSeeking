<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once('../../config/db.php');
    include_once('../../model/chat.php');

    $db = new db();
    $connect = $db->connect();

    $chat = new chat($connect);
    $read = $chat->read();

    $num = $read->rowCount();

    if($num>0){
        $chat_array = [];
        $chat_array['chat'] = [];
        while($row = $read->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $chat_item = array(
                'ID_Chat'=> $ID_Chat,
                'ID_Recruiter'=> $ID_Recruiter,
                'ID_Applicants' => $ID_Applicants,
                'PathFile' => $PathFile
            );
            array_push($chat_array['chat'],$chat_item);
        }
        echo json_encode($chat_array);
    }


?>