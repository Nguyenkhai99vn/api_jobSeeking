<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods:DELETE');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once('../../config/db.php');
    include_once('../../model/recruitment.php');

    $db = new db();
    $connect = $db->connect();

    $recruitment = new recruitment($connect);

    $data = json_decode(file_get_contents("php://input"));

    $recruitment->ID_Recruitment = $data->ID_Recruitment;


    if($recruitment->delete()){
        echo json_encode(array('message', 'recruitment deleted'));
    }else{
        echo json_encode(array('message', 'recruitment not deleted'));

    }
?>