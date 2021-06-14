<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once('../../config/db.php');
    include_once('../../model/job.php');

    $db = new db();
    $connect = $db->connect();

    $job = new job($connect);
    $read = $job->read();

    $num = $read->rowCount();

    if($num>0){
        $job_array = [];
        $job_array['job'] = [];
        while($row = $read->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $job_item = array(
                'ID_Job'=> $ID_Job,
                'JName'=> $JName
            );
            array_push($job_array['job'],$job_item);
        }
        echo json_encode($job_array);
    }


?>