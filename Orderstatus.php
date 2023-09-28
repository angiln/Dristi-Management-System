<?php
 
 SESSION_START();
 ob_start();
 include'Adminheader.php';

//  if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!==true){
//     header("Location:loginpage.html");
//    }
include  'connection.php';
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
            border-left: 1px solid #ddd;
            border-right: 1px solid #ddd;
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
      </style>

</head>
<body>

<div class="container pendingbody">
  <h5>Order Status</h5>
<table class="table">
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
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $rowcount=1;
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              
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
      <td><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="update_id"  value="<?php echo  $row['id']; ?>" >
        <div>
                                <select name="update_status" class="form-control">
                                <option><?php echo $row['status']; ?></option>
                                    
                                    <option value="Confirmed">Confirmed</option>
                                  <option value="Cancel">Cancel</option>
                                  <option value="Delivered">Delivered</option>
                                </select>
                            </div>
        <input type="submit" value="update" name="update_update_btn">
      </form></td>
      <td><a href="pending_orders.php?remove=<?php echo $row['id']; ?>">remove</a></td>
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