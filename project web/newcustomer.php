<?php
include_once("dbconnect.php");
$number = $_GET['number'];
$name = $_GET['name'];

// if (isset($_COOKIE["email"])){
//   echo "Value is: " . $_COOKIE["email"];
// }

if (isset($_GET['customerid'])) {
  $customerid = $_GET['customerid'];
  $customername = $_GET['customername'];
  $day = $_GET['day'];
  $no_room = $_GET['no_room'];
  $number=$_GET['number'];
  try {
    $sql = "INSERT INTO customers(customerid, customername,day,no_room,number)
    VALUES ('$customerid', '$customername', '$day','$no_room','$number')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script> alert('Insert Success')</script>";
    echo "<script> window.location.replace('mainpage.php?number=".$number."&name=".$name."') </script>;";

  } catch(PDOException $e) {
    echo "<script> alert('Insert Error')</script>";
    //echo "<script> window.location.replace('register.html') </script>;";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <style>
body{
  background-image: url(https://p4.wallpaperbetter.com/wallpaper/623/23/811/hotel-balcony-porch-window-wallpaper-preview.jpg);
  background-color: cover;
}
    .center {
        margin: auto;
        width: 40%;
        border: 3px solid black;
        background-color:yellow;
        padding: 30px;
        opacity: 0.8;
        font-weight: bold;
        color:black;
    }
    .button{
      background-color:red;
      border: none;
      color:white;
      padding: 3px 2px;
      text-align:center;
      text-decoration:none;
      display: inline-block;
      font-size: 16px;
      margin:4px 2px;
      cursor:pointer;
    }
</style>
</head>
<div class='center'>
<h2 align="center">WELCCOME TO INSERT DETAIL PAGE</h2>
<h2 align='center'><?php echo $name?>-<?php echo $number;?></h2>
</div>
<body>
<br><br>><div class="center">
    <h2 align="center">INSERT NEW CUSTOMERS DETAIL</h2>
    <div class="center">
    <form action="newcustomer.php" method="get" align="center" onsubmit="return confirm('Insert New Customer Detail?');">
        <input type="hidden" id="name" name="name" value="<?php echo $name;?>"><br>
        <input type="hidden" id="number" name="number" value="<?php echo $number;?>"><br>
        <label for="Customer ID">Customer ID:</label><br>
        <input type="text" id="customerid" name="customerid" value="" required><br>
        <label for="email">Customer Name:</label><br>
        <input type="text" id="customername" name="customername" value="" required><br>
        <label for="number">Day stay:</label><br>
        <input type="text" id="day" name="day" value="" required><br>
        <label for="password">No Room</label><br>
        <input type="text" id="no_room" name="no_room" value="" required><br><br>
        <button class="button">
        <input type="submit" value="Submit" class="button"></button>
    </form>
  </div>
    <p align="center"><a href="mainpage.php?number=<?php echo $number.'&name='.$name?>"><input type="submit" value="Cancel" class="button"></a></p>
    </div><br><br><br><br><br><br>
</body>

</html>