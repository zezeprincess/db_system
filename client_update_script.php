<?php 
    
    require_once 'dbcon.php'; // forbindele til database
    
    $cid = $_POST['client_id'];
    $cli_name = $_POST['client_name'];
    $cli_adress = $_POST['address'];
    $clicontact_name = $_POST['contact_name'];
    $clicontact_phone = $_POST['contact_phone'];
    
    // opdaterer client
    $sql = "UPDATE client SET client_name = ?, client_adress = ?, client_contact_name = ?, client_contact_phone = ? 
    WHERE client_id = ?";
    
    $stmt = $link->prepare($sql);
    $stmt->bind_param('ssssi', $cli_name, $cli_adress, $clicontact_name, $clicontact_phone, $cid);
    $stmt->execute();
    
    
    if ($stmt->errno) {
        echo "FAILURE!!! " . $stmt->error();
    }
    else {
        echo 'Updated '.$stmt->affected_rows.' rows';
    }
    
    header('Location: client_update.php')
?>