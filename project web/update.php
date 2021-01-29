<?php
include_once("dbconnect.php");
$number = $_GET['number'];
$name = $_GET['name'];
$customerid = $_GET['customerid'];
$customername = $_GET['customername'];
$day = $_GET['day'];
$no_room = $_GET['no_room'];

if (isset($_GET['operation'])) {
    try {
        $sqlupdate = "UPDATE customers SET customername = '$customername', day = '$day', no_room = '$no_room' WHERE number = '$number' AND customerid = '$customerid'";
        $conn->exec($sqlupdate);
        echo "<script> alert('Update Success')</script>";
        echo "<script> window.location.replace('mainpage.php?number=".$number."&name=".$name."') </script>;";
      } 
      catch(PDOException $e) {
        echo "<script> alert('Update Error')</script>";
      }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <style>
body{
  background-image: url(https://p4.wallpaperbetter.com/wallpaper/623/23/811/hotel-balcony-porch-window-wallpaper-preview.jpg);
  background-color:cover;
}
    .center {
        margin: auto;
        width: 40%;
        border: 5px solid black;
        background-color:rgb(255, 255, 0);
        padding: 30px;
        opacity: 0.8;
        font-weight: bold;
        color:black;
    }
    
</style>
</head>
<body>
<br><br><br><br><br><br><br><br><br><div class="center">
<p>
<h2 align='center'><?php echo $name?></h2>
</p>

   <h3 align="center">UPDATE DETAIL CUSTOMER <?php echo $customerid?> </h3>
  <div class="center">
    <form action="update.php" method="get" align="center" onsubmit="return confirm('Update?');">
        <input type="hidden" id="name" name="name" value="<?php echo $name;?>"><br>
        <input type="hidden" id="number" name="number" value="<?php echo $number;?>"><br>
        <input type="hidden" id="customerid" name="customerid" value="<?php echo $customerid;?>" required><br>
        <input type="hidden" id="operation" name="operation" value="update"><br>
        <label for="email">Customer Name:</label><br>
        <input type="text" id="customername" name="customername" value="<?php echo $customername;?>" required><br>
        <label for="Day">Day of stay:</label><br>
        <input type="text" id="day" name="day" value="<?php echo $day;?>" required><br>
        <label for="No Room">No Room</label><br>
        <input type="text" id="no_room" name="no_room" value="<?php echo $no_room;?>" required><br><br>
        <input type="submit" value="Update">
    </form>
  </div>
    <p align="center"><a href="mainpage.php?number=<?php echo $number.'&name='.$name?>"><input type="submit" value="Cancel" class="button"></a></p>
  </div>
</body>

</html>