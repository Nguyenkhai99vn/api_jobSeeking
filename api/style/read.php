<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once('../../config/db.php');
    include_once('../../model/style.php');

    $db = new db();
    $connect = $db->connect();

    $style = new style($connect);
    $read = $style->read();

    $num = $read->rowCount();

    if($num>0){
        $style_array = [];
        $style_array['style'] = [];
        while($row = $read->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $style_item = array(
                'ID_Style'=> $ID_Style,
                'SName'=> $SName
            );
            array_push($style_array['style'],$style_item);
        }
        echo json_encode($style_array);
    }


?>