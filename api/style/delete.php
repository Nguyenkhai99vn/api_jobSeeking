<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods:DELETE');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once('../../config/db.php');
    include_once('../../model/style.php');

    $db = new db();
    $connect = $db->connect();

    $style = new style($connect);

    $data = json_decode(file_get_contents("php://input"));

    $style->ID_Style = $data->ID_Style;


    if($style->delete()){
        echo json_encode(array('message', 'style deleted'));
    }else{
        echo json_encode(array('message', 'style not deleted'));

    }
?>