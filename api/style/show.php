<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once('../../config/db.php');
    include_once('../../model/style.php');

    $db = new db();
    $connect = $db->connect();

    $style = new style($connect);
    $style->ID_Style = isset($_GET['ID_Style']) ? $_GET['ID_Style'] : die();

    $style->show();

    $style_item = array(
        'ID_Style'=> $style->ID_Style,
        'SName'=> $style->SName
    );

    print_r(json_encode($style_item));
?>