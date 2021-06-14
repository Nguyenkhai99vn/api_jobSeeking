<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once('../../config/db.php');
    include_once('../../model/rank.php');

    $db = new db();
    $connect = $db->connect();

    $rank = new rank($connect);
    $rank->ID_Rank = isset($_GET['ID_Rank']) ? $_GET['ID_Rank'] : die();

    $rank->show();

    $rank_item = array(
        'ID_Rank'=> $rank->ID_Rank,
        'RName'=> $rank->RName
    );

    print_r(json_encode($rank_item));
?>