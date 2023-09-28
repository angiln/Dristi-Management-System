<?php
ob_start();
 SESSION_START();
 include'Adminheader.php';

include 'connection.php';
$sql = "SELECT * FROM orders";
$result = $conn -> query ($sql);

if(isset($_POST['update_update_btn'])){
  $update_value = $_POST['update_status'];
  $update_id = $_POST['update_id'];
  $update_quantity_query = mysqli_query($conn, "UPDATE `orders` SET status = '$update_value' WHERE id = '$update_id'");
  if($update_quantity_query){
     header('location:pending_orders.php');
  };
};
if(isset($_POST['updatedelivery'])){
  $update_date= $_POST['Deliverydate'];
  $update_id = $_POST['update_id'];
  $update_quantity_query = mysqli_query($conn, "UPDATE `orders` SET Deliverydate = '$update_date' WHERE id = '$update_id'");
  if($update_quantity_query){
     header('location:pending_orders.php');
  };
};

if(isset($_GET['remove'])){
  $remove_id = $_GET['remove'];
  mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$remove_id'");
  header('location:pending_orders.php');
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <style> 
    .pendingbody {
            margin-top: 0px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        th {
            background-color:skyblue;
            color: white;
        }

        form {
            display: inline-block;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        h5 {
            margin-bottom: 20px;
        }  
        .container {
    max-width: 800px;
    margin: 0 auto;
    margin-left: 200px; /* Add left margin */
}</style>

</head>
<body>

<div class="container pendingbody">
  <h5>Order Status</h5>
<table class="table" >
  <thead>
    <tr>

      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Send Money Number</th>
      <th scope="col">Txid</th>
      <th scope="col">Total Product</th>
      <th scope="col">Total Price</th>
      <th scope="col">Status</th>
      <th scope="col"> </th>
      <th scope="col">Power Status</th>
      <th scope="col">Delivery Date</th>
        
    </tr>
  </thead>
  <tbody>
  <?php
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              
              ?>
    <tr>

      <td><?php echo $row["name"] ?></td>
      <td><?php echo $row["address"] ?></td>
      <td><?php echo $row["phone"] ?></td>
      <td><?php echo $row["mobnumber"] ?></td>
      <td><?php echo $row["txid"] ?></td>
      <td><?php echo $row["totalproduct"] ?></td>
      <td><?php echo $row["totalprice"] ?></td>
      <td><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="update_id"  value="<?php echo  $row['id']; ?>" >
        <div>
                                <select name="update_status" class="form-control">
                                <option><?php echo $row['status']; ?></option>
                                    <option value="Your Order Has been canceled">Cancel</option>
                                     
                                  <option value="Your Product Will Be Delivered Soon">Send To Deliver</option>
                                </select>
                            </div>
        <input type="submit" value="update" name="update_update_btn">
      </form></td>
      <td><a href="pending_orders.php?remove=<?php echo $row['id']; ?>">remove</a></td>
      <td><a href="Powerdetails.php?TransactionID=<?php echo $row['txid']; ?>">Power Details</a></td>
      <td> 
           <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
           <input type="hidden" name="update_id"  value="<?php echo  $row['id']; ?>" > 
           
            <?php   
             $todayDateString = $row['created_at'];
             $todayDate = new DateTime($todayDateString);
     
             // Calculate the date for three days in the future
             $futureDate = clone $todayDate;
             $futureDate->modify('+3 days');
             
             // Format the dates as strings
             $todayDateString = $todayDate->format('Y-m-d');
             $futureDateString = $futureDate->format('Y-m-d');
            ?>
                               
            <input type="Date" name="Deliverydate" value="<?php  echo $futureDateString; ?>">
                                <input type="submit" value="update" name="updatedelivery">
                                </form></td> 
      
      
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
</div>
    
</body>
</html>