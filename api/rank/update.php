<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods:PUT');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once('../../config/db.php');
    include_once('../../model/rank.php');

    $db = new db();
    $connect = $db->connect();

    $rank = new rank($connect);

    $data = json_decode(file_get_contents("php://input"));
    $rank->ID_Rank = $data->ID_Rank;
    $rank->RName = $data->RName;

    if($rank->update()){
        echo json_encode(array('message', 'rank updated'));
    }else{
        echo json_encode(array('message', 'rank not updated'));

    }
?>