<?php 
    
    require_once 'dbcon.php';
    
    $cid = $_POST['client_id'];
    
    
    $deleteclient = "DELETE FROM client
    WHERE client_id = ?";
    
    $stmt = $link->prepare($deleteclient);
    $stmt->bind_param('i', $cid);
    $stmt->execute();
    
    
    if ($stmt->errno) {
        echo "FAILURE!!! " . $stmt->error();
    }
    else {
        echo 'Updated '.$stmt->affected_rows.' rows';
    }
    
    header('Location: clients.php')
?>