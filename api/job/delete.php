<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods:DELETE');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once('../../config/db.php');
    include_once('../../model/job.php');

    $db = new db();
    $connect = $db->connect();

    $job = new job($connect);

    $data = json_decode(file_get_contents("php://input"));

    $job->ID_Job = $data->ID_Job;


    if($job->delete()){
        echo json_encode(array('message', 'job deleted'));
    }else{
        echo json_encode(array('message', 'job not deleted'));

    }
?>