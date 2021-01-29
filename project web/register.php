<?php
include_once("dbconnect.php");

//if (isset($_COOKIE["timer"])){

//get data first
$name = $_POST['name'];
$email = $_POST['email']; 
$number = $_POST['number'];
$password = sha1($_POST['password']);

        try {
            $sql = "INSERT INTO staff(name, email, password, number)
            VALUES ('$name', '$email', '$password','$number')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "<script> alert('Registration Success')</script>";
            echo "<script> window.location.replace('index.html') </script>;";
        } catch(PDOException $e) {
            echo "<script> alert('Registration Error')</script>";
            echo "<script> window.location.replace('register.html') </script>;";
        }
        $conn = null;

//}else{
//  echo "<script> alert('Timer expired!!!')</script>";
//  echo "<script> window.location.replace('index.html') </script>;";
//}
?>