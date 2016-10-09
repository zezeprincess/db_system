<?php 

    require_once 'dbcon.php'; // forbindele til database

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Sign up client</title>
</head>

<body>
    <nav>
        <a href="clients.php">View clients</a>    
    </nav>
    <h1>Sign up new client</h1>
    
    <!-- Formen bliver sendt ved hjælp af super globalen POST -->
    <form action="client_new.php" method="post">
        
            <input type="text" placeholder="Company name" name="client_name" required><br>
            <input type="text" placeholder="Address" name="address"><br>
            <input type="text" placeholder="Contact name" name="contact_name" required><br>
            <input type="text" placeholder="Contact phone" name="contact_phone" required><br>
            <select name="zipcode" value="Zipcode">
                <?php
                    /* Nedenstående bruges til at hente zipcode i databasen med et SELECT statement og udskrives med et While loop. 
                    */
                    $sql = 'SELECT zipcode, city FROM zipcode';
                    $stmt = $link->prepare($sql);
                    $stmt->execute();
                    $stmt->bind_result($zipcode, $cityname);
                    
                    while ($stmt->fetch()){
                        echo '<option value="'.$zipcode.'">'.$zipcode.'</option>';
                    }
                ?>
                
            </select><br>
            
            
            <input type="submit" name="sumbitReg">
         
         
     </form>
    
    
</body>
</html>
