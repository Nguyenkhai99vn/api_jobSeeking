<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once('../../config/db.php');
    include_once('../../model/rank.php');

    $db = new db();
    $connect = $db->connect();

    $rank = new rank($connect);
    $read = $rank->read();

    $num = $read->rowCount();

    if($num>0){
        $rank_array = [];
        $rank_array['rank'] = [];
        while($row = $read->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $rank_item = array(
                'ID_Rank'=> $ID_Rank,
                'RName'=> $RName
            );
            array_push($rank_array['rank'],$rank_item);
        }
        echo json_encode($rank_array);
    }


?>