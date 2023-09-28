<?php
SESSION_START();
 include'Adminheader.php';
 
$price=1000;
include 'connection.php';
$sql = "SELECT * FROM registeruser";
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

      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Contact Number</th>
      <th scope="col">Address</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
    </tr>
  </thead>
  <tbody>
  <?php
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              ?>
    <tr>

      <td><?php echo $row["FirstName"] ?></td>
      <td><?php echo $row["LastName"] ?></td>
      <td><?php echo $row["Email"] ?></td>
      <td><?php echo $row["ContactNumber"] ?></td>
      <!--  --><td><?php echo "tobeset" ?></td>
      <td><?php echo $row["Username"] ?></td>
      <td><?php echo $row["Password"] ?></td>
     
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