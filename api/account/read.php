<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once('../../config/db.php');
    include_once('../../model/account.php');

    $db = new db();
    $connect = $db->connect();

    $account = new account($connect);
    $read = $account->read();

    $num = $read->rowCount();

    if($num>0){
        $account_array = [];
        $account_array['account'] = [];
        while($row = $read->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $account_item = array(
                'email'=> $Email,
                'pass'=> $Pass,
                'sta' => $Sta
            );
            array_push($account_array['account'],$account_item);
        }
        echo json_encode($account_array);
    }


?>