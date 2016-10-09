<?php 
    
    require_once 'dbcon.php';
    $cid = $_GET['cid'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Create new project</title>
</head>

<body>
    <nav>
        <a href="projects.php">View projects</a>    
    </nav>
    <h1>Create new project</h1>
    
    
        <form action="project_new.php" method="post">
    
                <input type="number" hidden="true" name="client_id" value="<?= $cid ?>">
                <input type="text" placeholder="Project name" name="project_name"><br>
                <input type="text" placeholder="Project description" name="pdescrip"><br>
                <input type="date" placeholder="Project start" name="project_start">
                <input type="date" placeholder="Project end" name="project_end"><br>
                <input type="text" placeholder="Other project details" name="opdetails"><br>
                
                <input type="submit" name="sumbitReg">


         </form>
    
</body>
</html>
