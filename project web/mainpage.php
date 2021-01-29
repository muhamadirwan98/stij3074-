<br><br><br><br><br><br><div class="center">
<div class="scroll">
<?php
session_start();
include_once("dbconnect.php");
$number = $_GET['number']; 
$name = $_GET['name'];

// if (isset($_COOKIE["email"])){
//   echo "Value is: " . $_COOKIE["email"];
// }
echo "<head><link rel='stylesheet' href='styles.css'><link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\"></head>";

echo "<p>WELCOME TO DETAIL PAGE " . $_SESSION["name"] .".<br></p>";
if (isset($_SESSION["name"])){

//delete operation
if (isset($_COOKIE["timer"])){
    if (isset($_GET['operation'])) {
      $customerid = $_GET['customerid'];
      try {
        $sql = "DELETE FROM customers WHERE number='$number' AND customerid='$customerid'";
        $conn->exec($sql);
        echo "<script> alert('Delete Success')</script>";
      } catch(PDOException $e) {
        echo "<script> alert('Delete Error')</script>";
      }
    }

    try {
        if (isset($_GET['detail'])) {
            $detail = $_GET['detail'];
            $sql = "SELECT * FROM customers WHERE number = '$number' AND customername LIKE '%$detail%' ORDER BY no_room ASC";
        }else{
            $sql = "SELECT * FROM customers WHERE number = '$number' ORDER BY no_room ASC";    
        }
        
        $stmt = $conn->prepare($sql );
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $courses = $stmt->fetchAll(); 
        echo "<p><h1 align='center'>CURRENT HOTEL CUSTOMERS DETAIL TABLE</h1></p>";
        echo "
        <form class=\"example\" action=\"mainpage.php\" style=\"margin:auto;max-width:300px\">
        <input type=\"text\" placeholder=\"Search by Customer name..\" name=\"detail\">
        <input type=\"hidden\" name=\"number\" value=$number>
        <input type=\"hidden\" name=\"name\" value=$name>
        <button type=\"submit\"><i class=\"fa fa-search\"></i></button>
        </form><br>";
        
        echo "<table border='5' align='center'>
        <tr>
          <th>Customer ID</th>
          <th>Customer Name</th>
          <th>Day of Stay</th>
          <th>No Room</th>
          <th>Operation</th>
        </tr>";
        
        foreach($courses as $customers) {
            echo "<tr>";
            echo "<td>".$customers['customerid']."</td>";
            echo "<td>".$customers['customername']."</td>";
            echo "<td>".$customers['day']."</td>";
            echo "<td>".$customers['no_room']."</td>";
            echo "<td><a href='mainpage.php?number=".$number."&name=".$name."&customerid=".$customers['customerid']."&operation=del' onclick= 'return confirm(\"Delete. Are your sure?\");'>Delete</a><br>
             <a href='update.php?number=".$number."&name=".$name."&customerid=".$customers['customerid']."&customername=".$customers['customername'].
            "&day=".$customers['day']."&no_room=".$customers['no_room']." '>Update</a></td>";
            echo "</tr>";
        } 
        echo "</table>";
        echo "<p align='center'><button onclick=\"window.print()\">Print this page</button></p>";
        echo "<p align='center'><a href='newcustomer.php?number=".$number."&name=".$name."'>Insert New Customer Detail</a></p>";
        echo "<p align='center'><a href='index.html'>Log Out</a></p>";

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}else{
  echo "<script> alert('Timer expired!!!')</script>";
  echo "<script> window.location.replace('index.html') </script>;";
}
}else{
  echo "<script> alert('Session Expired!!!')</script>";
  echo "<script> window.location.replace('index.html') </script>;";
}
  $conn = null;
  
?>
</div>
</div>
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
        width: 62%;
        border: 5px solid black;
        background-color:yellow;
        padding: 10px;
        opacity: 0.8;
        font-weight: bold;
        color:black;
    }
    div.scroll{
      margin:4px, 4px; 
                padding:4px; 
                background-color:white; 
                width: 1035px;
                height: 465px; 
                overflow-x: hidden; 
                overflow-y: auto; 
                text-align:justify;
    }
</style>
</head>

<body>

</body>

</html>