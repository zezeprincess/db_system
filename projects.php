<?php

    require_once 'dbcon.php';

    $cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT) or die('missing parameter');
    

    $clientname = "SELECT client_name FROM client WHERE client_id = ?";

    $clistmt = $link->prepare($clientname);
    $clistmt->bind_param("i", $cid);
    $clistmt->execute();
    $clistmt->bind_result($client_name);
    $clistmt->fetch();
    $clistmt->close();
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Projects</title>
</head>

<body>
    <nav>
        <a href="project_register.php?cid=<?= $cid ?>">Create project</a>
        <a class="no-link" href="#">|</a> 
        <a href="client_update.php?cid=<?= $cid ?>">Update client</a> 
        <a class="no-link" href="#">|</a>
        <a onclick="return confirm('are you sure?')" href="client_delete.php?cid=<?= $cid ?>">Delete client</a>  
          
    </nav>
    <script>
    </script>
    
    
    <h1>Projects for <?= $client_name ?></h1>
    <ul>
        <?php 
            
            $stmt = $link->prepare("SELECT project_id, project_name, project_description, project_startdate, project_enddate, other_project_details
            FROM project
            WHERE client_client_id = $cid");
        
            $stmt->execute();
            $stmt->bind_result($pid, $pname, $pdesc, $pstart, $pend, $opdetails);
            
            while($stmt->fetch()){
                //echo '<h1>Projects for '.$cname.'</h1>';
                echo '<li>'.$pname.'</li>'.PHP_EOL;
            }
        $stmt->close();
        ?>
        
        
    </ul>
</body>
</html>
