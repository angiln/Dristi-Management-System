<?php
SESSION_START(); 
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
 include 'Adminheader.php';
 include 'connection.php';

 $sql = "SELECT * FROM product";
 $result = $conn -> query ($sql);

 if(isset($_POST['update_update_btn'])){
  $name = $_POST['update_name'];
  $catagory = $_POST['update_catagory'];
  $quantity = $_POST['update_quantity'];
  $price = $_POST['update_Price'];
  $update_id = $_POST['update_id'];
  $update_quantity_query = mysqli_query($conn, "UPDATE `product` SET quantity = '$quantity' , name='$name' , category='$catagory' ,price='$price'  WHERE id = '$update_id'");
  if($update_quantity_query){
     header('location:Allproducts.php');
  };
};

 if(isset($_GET['remove'])){
  $remove_id = $_GET['remove'];
  // mysqli_query($conn, "DELETE FROM `product` WHERE id = '$remove_id'");
  // header('location:Allproducts.php');
  $delete_query = mysqli_query($conn, "DELETE FROM `product` WHERE id = '$remove_id'");
    
  if ($delete_query) {
      // If deletion is successful, redirect to Allproducts.php
      header('Location:Allproducts.php');
      exit();
  } else {
      // If deletion fails, display an error message or handle it accordingly
      echo "Error deleting item: " . mysqli_error($conn);
  }
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="css/pending_orders.css"> -->
    <style>
    .pendingbody {
            margin-top: 0px;
        }

        table {
            width: 90%;
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
            margin-left: 150px; /* Adjust the value to bring the table slightly to the left */
        }

        h5 {
            margin-bottom: 20px;
        }
</style>
</head>
<body>

<div class="container pendingbody">
  <h5>All Product</h5>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Catagory</th>

      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
     
      <th scope="col">   </th>
    </tr>
  </thead>
  <tbody>
  <?php
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              ?>
    <tr>
      <td><img src="Images/<?php echo $row['imgname']; ?>" style="width:50px;"></td>
     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="update_id"  value="<?php echo  $row['id']; ?>" >
        <td><input type="text" name="update_name"  value="<?php echo $row['name']; ?>" ></td>
        <td><input type="text" name="update_catagory"  value="<?php echo $row['category']; ?>" ></td>

        <td><input type="number" name="update_quantity"  value="<?php echo $row['quantity']; ?>" ></td>
        <td> <input type="number" name="update_Price" value="<?php echo $row['price']; ?>" ></td>
        <td> <input type="submit" value="update" name="update_update_btn">
      </form></td>
      <td><a href="Allproducts.php?remove=<?php echo $row['id']; ?>">remove</a></td>
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