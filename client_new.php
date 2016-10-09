<?php 

    // Opretter forbindelse til databasen
    require_once 'dbcon.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>New client</title>
</head>

<body>
    <nav>
        <a href="clients.php">View clients</a>    
    </nav>
    
    <?php 
    /* Variabler defineres og hentes ind via POST og filteres ved hjælp af filter_inupt.   Filter_inpt funktionen validerer  usikre variabler som fx bruger inputs. */
    $clientname = filter_input(INPUT_POST, 'client_name') or die('missing parameter');
    $address = filter_input(INPUT_POST, 'address') or die('missing parameter');
    $contactname = filter_input(INPUT_POST, 'contact_name') or die('missing parameter');
    $contactphone = filter_input($_POST, 'contact_phone') or die('missing parameter');
    $zip = filter_input($_POST, 'zipcode') or die('missing parameter');
    
    // Den sendte data indsættes i databasen
    $sql = 'INSERT INTO client (client_name, client_adress, client_contact_name, client_contact_phone, zipcode_zipcode)
            VALUES (?, ?, ?, ?, ?)';

    $stmt = $link->prepare($sql);
    $stmt->bind_param('ssssi', $clientname, $address, $contactname, $contactphone, $zip);
    $stmt->execute();
    echo '<h1>Client registered succesfully</h1>'; // beksked til brugeren om at de har oprettet deres oplysinger i databasen

?>    
  
</body>
</html>


