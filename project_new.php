<?php 

    require_once 'dbcon.php';
    
    

    $projectname = filter_input(INPUT_POST, 'project_name') or die('missing parameter');
    $pdescrip = filter_input(INPUT_POST, 'pdescrip') or die('missing parameter');
    $project_start = filter_input(INPUT_POST, 'project_start') or die('missing parameter');
    $project_end = $_POST['project_end'];
    $opdetails = $_POST['opdetails'];
    $cid = $_POST['client_id'];
    

    $sql = 'INSERT INTO project (client_client_id, project_name, project_description, project_startdate, project_enddate, other_project_details)
            VALUES (?, ?, ?, ?, ?, ?)';

    $stmt = $link->prepare($sql);
    $stmt->bind_param('isssss', $cid, $projectname, $pdescrip, $project_start, $project_end, $opdetails);
    $stmt->execute();
    echo '<h1>Client registered succesfully</h1>';

    header("Location: clients.php");
    exit();

?>