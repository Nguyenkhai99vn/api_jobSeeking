<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods:PUT');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once('../../config/db.php');
    include_once('../../model/account.php');

    $db = new db();
    $connect = $db->connect();

    $account = new account($connect);

    $data = json_decode(file_get_contents("php://input"));
    $account->Email = $data->Email;
    $account->Pass = $data->Pass;
    $account->Sta = $data->Sta;

    if($account->update()){
        echo json_encode(array('message', 'account updated'));
    }else{
        echo json_encode(array('message', 'account not updated'));

    }
?>