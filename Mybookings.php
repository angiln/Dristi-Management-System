<?php
 include'Finalheader.php';
 SESSION_START();
$price=1200;
include 'connection.php';
$sql = "SELECT * FROM cricsalbooking";
$result = $conn -> query ($sql);
$query = "SELECT * FROM booking";
$result2 = $conn -> query ($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/pending_orders.css">

</head>
<body>

<div class="container pendingbody">
  <h5>Cricsal</h5>
<table class="table">
  <thead>
    <tr>

      <th scope="col">User</th>
      <th scope="col">Bookday</th>
      <th scope="col">Shift</th>
      <th scope="col">Contact</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
  <?php
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              ?>
    <tr>

      <td><?php echo $row["user"] ?></td>
      <td><?php echo $row["bookday"] ?></td>
      <td><?php echo $row["shift"] ?></td>
      <td><?php echo $row["contact"] ?></td>
      <td><?php echo $price ?></td>
     
    </tr>
    <?php 
    }
        } 
        else 
            echo "0 results";
        ?>
  </tbody>
</table>

</div>
<div class="container pendingbody">
  <h5>Futsal</h5>
<table class="table">
  <thead>
    <tr>

      <th scope="col">User</th>
      <th scope="col">Bookday</th>
      <th scope="col">Shift</th>
      <th scope="col">Contact</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
  <?php
          if (mysqli_num_rows($result2) > 0) {
            // output data of each row
            while($row2= mysqli_fetch_assoc($result2)) {
              ?>
    <tr>

      <td><?php echo $row2["user"] ?></td>
      <td><?php echo $row2["bookday"] ?></td>
      <td><?php echo $row2["shift"] ?></td>
      <td><?php echo $row2["contact"] ?></td>
      <td><?php echo $price ?></td>
     
    </tr>
    <?php 
    }
        } 
        else 
            echo "0 results";
        ?>
  </tbody>
</table>
</div>
    
</body>
</html>