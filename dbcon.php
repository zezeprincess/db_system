<?php
const DB_HOST = 'localhost';
const DB_USER = 'patricia_gambula';
const DB_PASS = 'Gambula1';
const DB_NAME = 'patricia_db_system';

$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($link->connect_error) { 
   die('Connect Error ('.$link->connect_errno.') '.$link->connect_error);
} 
$link->set_charset('utf8'); 
?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>