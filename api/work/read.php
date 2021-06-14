<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once('../../config/db.php');
    include_once('../../model/work.php');

    $db = new db();
    $connect = $db->connect();

    $work = new work($connect);
    $read = $work->read();

    $num = $read->rowCount();

    if($num>0){
        $work_array = [];
        $work_array['work'] = [];
        while($row = $read->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $work_item = array(
                'ID_Work'=> $ID_Work,
                'WName'=> $WName
            );
            array_push($work_array['work'],$work_item);
        }
        echo json_encode($work_array);
    }


?>