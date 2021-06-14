<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods:DELETE');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once('../../config/db.php');
    include_once('../../model/account.php');

    $db = new db();
    $connect = $db->connect();

    $account = new account($connect);

    $data = json_decode(file_get_contents("php://input"));

    $account->Email = $data->Email;


    if($account->delete()){
        echo json_encode(array('message', 'account deleted'));
    }else{
        echo json_encode(array('message', 'account not deleted'));

    }
?>