<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once('../../config/db.php');
    include_once('../../model/account.php');

    $db = new db();
    $connect = $db->connect();

    $account = new account($connect);
    $account->Email = isset($_GET['email']) ? $_GET['email'] : die();

    $account->show();

    $account_item = array(
        'email'=> $account->Email,
        'pass'=> $account->Pass,
        'sta' => $account->Sta
    );

    print_r(json_encode($account_item));
?>