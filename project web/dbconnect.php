<?php
//connect to db
$servername = "localhost";
$username = "root";
$passworddb = "";
$dbname = "datahotel";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $passworddb);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>