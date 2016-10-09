<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Clients</title>
</head>

<body>
    <nav>
        <a href="client_register.php">Create new client</a>    
    </nav>
    <h1>Clients</h1>
    
    <table>
        <tr>
            <th>Company</th>
            <th>Project</th>
            <th>Start date</th>
            <th>End date</th>
            <th>Description</th>
            
        </tr>
        <?php 
        
  
        require_once 'dbcon.php'; // forbindelse til databasen
        
        // SQL SELECT statement bruges til at vælge/"selecte" data fra databasen 
        $sql = 'SELECT c.client_id, c.client_name, p.project_name, p.Project_Startdate, p.Project_Enddate, p.Project_Description	 
                FROM client c
                JOIN project p
                ON c.client_id=p.Client_Client_ID  
                ORDER BY c.client_name';
                
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($cid , $cname, $pname, $pstart, $pslut, $pdescrip);
        
        /* Resultaterne skrives ud i en tabel med et while loop, som kører så længe konditionerne er true/rigtige.   */
        while($stmt->fetch()){
            echo
            '<tr>
            <td><a href="projects.php?cid='.$cid.'">'.$cname.'</a></td>
            <td>'.$pname.'</td>
            <td>'.$pstart.'</td>
            <td>'.$pslut.'</td>
            <td>'.$pdescrip.'</td>
            
            </tr>'.PHP_EOL;
        }
        
        ?>
    </table>
    
</body>
</html>
