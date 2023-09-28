<?php   
ob_start();
 include'Adminheader.php';
include 'connection.php'; 
if (isset($_GET['Action']) && $_GET['Action'] === "Delivered") {
    
    // $action = $_GET['Action'];
    echo "<script>";
      echo "alert('Delivered !!');";
      echo "</script>";
    $update_id = $_GET['Status'];

    // if ($action === 'Delivered') {
        $update_quantity_query = mysqli_query($conn, "UPDATE `orders` SET `status` = 'Delivered' WHERE id = '$update_id'");
    // }

    // if ($update_quantity_query) {
    //     header('location: pending_orders.php');
    // }
    // $update_id=$_POST['Status'];
    // $update_quantity_query = mysqli_query($conn, "UPDATE `orders` SET `status` = 'Delivered' WHERE id = '$update_id'");
    // if($update_quantity_query){
    //    header('location:Deliver.php');
    // }
  }
  if (isset($_GET['Action']) && $_GET['Action'] === "Canceled") {
    
    // $action = $_GET['Action'];
    echo "<script>";
      echo "alert('Canceled!!');";
      echo "</script>";
    $update_id = $_GET['Status'];

    // if ($action === 'Delivered') {
        $update_quantity_query = mysqli_query($conn, "UPDATE `orders` SET `status` = 'Canceled BY CUSTOMER' WHERE id = '$update_id'");
    // }
  }
  if (isset($_GET['Action']) && $_GET['Action'] === "Unreacheable") {
    
    // $action = $_GET['Action'];
    echo "<script>";
      echo "alert('Customer is unreacheable!!');";
      echo "</script>";
    $update_id = $_GET['Status'];

    // if ($action === 'Delivered') {
        $update_quantity_query = mysqli_query($conn, "UPDATE `orders` SET `status` = 'Customer is unreacheable' WHERE id = '$update_id'");
    // }
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivered Orders</title>
    <style>
        /* Add your CSS styles here */
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid skyblue;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: skyblue;
            color: white;
        }
    </style>
</head>
<body>
    <?php  
    session_start();

    include 'connection.php';
    $sql = "SELECT * FROM orders WHERE status='Your Product Will Be Delivered Soon'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    ?>
     
    <table>
    <title>Products To Be Delivered</title>
        <thead>
            <tr>
                <th>Customer Name</th>  
                <th>Delivery Address</th>
                <th>Order Date</th>
                <th>Phone Number</th>
                <th>    </th>
                <th>Action</th>
                <th>     </th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><a href="Deliver.php?Action=Delivered&Status=<?php echo $row['id']; ?>">Delivered</a></td>
                <td><a href="Deliver.php?Action=Canceled&Status=<?php echo $row['id']; ?>">Canceled</a></td>
                <td><a href="Deliver.php?Action=Unreacheable&Status=<?php echo $row['id']; ?>">Unreacheable</a></td>

                <!-- <td><a href="Deliver.php?Status=<?php echo $row['id']; ?>">Rejected</a></td> -->

            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php
    } else {
        echo "No delivered orders found.";
    }
    ?>
</body>
</html>
