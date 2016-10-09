<?php 
    
    require_once 'dbcon.php';
    
    // Kigger hvilken side den er på og tager en given 'cid'
    $cid = $_GET['cid'];
    
    //Her select'er jeg client informationer
    $sql = "SELECT client_name, client_adress, client_contact_name, client_contact_phone
    FROM client
    WHERE client_id = ?";

    $stmt = $link->prepare($sql);
    $stmt->bind_param("i", $cid);
    $stmt->execute();
    $stmt->bind_result($client_name, $client_adress, $client_contact_name, $client_contact_phone);
    $stmt->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Update client</title>
</head>

<body>
    <nav>
        <a href="clients.php">View clients</a>    
    </nav>
    <h1>Update client</h1>
    
    <form action="client_update_script.php" method="post">
            <input type="hidden" name="client_id" value="<?= $cid ?>">
            <input type="text" placeholder="Company name" value="<?= $client_name ?>" name="client_name" required><br>
            <input type="text" placeholder="Adress"  value="<?= $client_adress ?>" name="address"><br>
            <input type="text" placeholder="Contact name"  value="<?= $client_contact_name ?>" name="contact_name" required><br>
            <input type="text"  placeholder="Contact phone" value="<?= $client_contact_phone ?>" name="contact_phone" required><br>
            <input type="submit" value="Update" name="sumbitReg">
         
     </form>
    
    
</body>
</html>
