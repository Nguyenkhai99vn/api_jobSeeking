<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once('../../config/db.php');
    include_once('../../model/job.php');

    $db = new db();
    $connect = $db->connect();

    $job = new job($connect);
    $job->ID_Job = isset($_GET['ID_Job']) ? $_GET['ID_Job'] : die();

    $job->show();

    $job_item = array(
        'ID_Job'=> $job->ID_Job,
        'JName'=> $job->JName
    );

    print_r(json_encode($job_item));
?>