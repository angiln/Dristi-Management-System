<?php
 include'Adminheader.php';
 SESSION_START();
$price=1000;
include 'connection.php';
$sql = "SELECT * FROM booking";
$result = $conn -> query ($sql);
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
  <h5>All Orders</h5>
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
    
</body>
</html>