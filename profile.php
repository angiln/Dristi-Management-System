<?php
   include 'Finalheader.php';
   include 'connection.php'; 
   session_start(); // Make sure to start the session at the beginning of your script

// Check if the "user" key is set in the session
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    // The "user" key is not set, handle accordingly
    $user = "Guest"; // Default value for non-logged in users
}
//    if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!==true){
//     header("Location:loginpage.html");
//    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        container {
            max-width: 800px;
            margin: 20px auto; /* Added margin to center the content */
            padding: 20px;
            background-color: white; /* Added a white background for the content */
            border: 1px solid #87CEEB;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        h1 {
            color: skyblue;
            text-align: center; /* Centered the heading */
            margin-bottom: 20px; /* Added margin to separate heading from table */
        }

        /* Table Styles */
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            text-align: center;
            padding: 10px;
        }

        .table th {
            background-color: #87CEEB;
            color: white;
        }

        .table td {
            background-color: #F0F8FF;
        }

        /* Responsive Table Styles */
        @media (max-width: 768px) {
            .table {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <h1>Hello <?php
         echo $user;
       ?>   </h1>

       <?php 
       $ssql="SELECT * FROM `orders` WHERE userid='$user'";
       $ressult=$conn -> query ($ssql); ?>
        <br><br><br><br><br><br><br><br><br><br><br><br><table class="table">
  <thead>
    <tr>
    <th scope="col">S.N</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Txid</th>
      <th scope="col">Total Product</th>
      <th scope="col">Total Price</th>
      <th scope="col">Status</th>
      <th scope="col">Status</th>
       
      
    </tr>
  </thead>
  <tbody>
  <?php
  $rowcount=1;
          if (mysqli_num_rows($ressult) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($ressult)) {
              
              ?>
    <tr>
      <td>
       <?php  echo $rowcount++;
      ?></td>
      <td><?php echo $row["name"] ?></td>
      <td><?php echo $row["address"] ?></td>
      <td><?php echo $row["phone"] ?></td>
    
      <td><?php echo $row["txid"] ?></td>
      <td><?php echo $row["totalproduct"] ?></td>
      <td><?php echo $row["totalprice"] ?></td>
      <td><?php echo $row["status"] ?></td>
      <td><?php echo $row["Deliverydate"] ?></td>

       
    </tr>
    <?php 
    }
        } 
        else 
            echo "0 results";
            ob_end_flush();
        ?>
        
  </tbody>
</table>
       
       
     
</body>
</html>