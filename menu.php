<?php
echo $id= $_GET['myid'];
echo $name=$_GET['name'];
echo $price=$_GET['price'];
echo $quantity=$_GET['quantity'];
echo $calorie=$_GET['calorie'];

$servername = "localhost:801";
$username ="root";
$password= "";
$dbname="menu";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO user (myid,name, price, quantity, calorie)
    VALUES ('$id','$name','$price','$quantity','$calorie)";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
  } catch(PDOException $e) {
    echo $sql ."<br>". $e->getMessage();
  }
  
  $conn = null;
?>
