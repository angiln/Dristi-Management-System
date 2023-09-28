<?php
session_start();
 include 'Finalheader.php';
 include 'connection.php';
 $rightsph=$rightcyl=$rightaxis=$leftsph=$leftcyl=$leftaxis= "";
 $power = "";
 if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!==true){
    header("Location:loginpage.html");
   }
   $name=$_SESSION['user'];

$que="SELECT * FROM registeruser WHERE Username='$name'";
$res=$conn->query($que);
if(mysqli_num_rows($res)>0){
  while($row = mysqli_fetch_assoc($res)) {
    $number=$row['ContactNumber'];
    $address=$row['address'];


  }

}

if(isset($_POST['order_btn'])){
  $userid = $name;
  $name = $_POST['user_name'];
  $number = $_POST['phonenumber'];
  $address = $_POST['address'];
  $rightsph = isset($_POST['rightsph']) ? $_POST['rightsph'] : "0";
        $rightcyl = isset($_POST['rightcyl']) ? $_POST['rightcyl'] : "0";
        $rightaxis = isset($_POST['rightaxis']) ? $_POST['rightaxis'] : "0";
        $leftsph = isset($_POST['leftsph']) ? $_POST['leftsph'] : "0";
        $leftcyl = isset($_POST['leftcyl']) ? $_POST['leftcyl'] : "0";
        $leftaxis = isset($_POST['leftaxis']) ? $_POST['leftaxis'] : "0";
        $prescriptionimg = isset($_POST['prescriptionimg']) ? $_POST['prescriptionimg'] : "0";
  $mobnumber =$number;
  // $product_name=;
  $txid =uniqid("ThirdEYE",$name);
  /*$price_total = $_POST['total'];*/
  $status="pending";
 
  $price_total = 0;
  $flag = 0;
  $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE userid='$userid'");
  $price_total = 0;
  if(mysqli_num_rows($cart_query) > 0){
     while($product_item = mysqli_fetch_assoc($cart_query)){
      $product_quan=$product_item['quantity'];
        $product_name[] = $product_item['name'] .'Quantity '.''. $product_item['quantity'] .'<br> ';
        $product_price =$product_item['price'] * $product_item['quantity'];
        $price_total=@$price_total+$product_price;
        $sql = "SELECT * FROM product";
        $result = $conn -> query ($sql);
     
        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
            if($row['id']===$product_item['productid'])
            {
              if($product_item['quantity']<$row['quantity']){

             
                $update_id=$row['id'];
                $t=$row['quantity']-$product_item['quantity'];
                $update_quantity_query = mysqli_query($conn, "UPDATE `product` SET quantity = '$t' WHERE id = '$update_id'");
                

                $flag=1;


                

              }
              else
              {
                $flag=0;
              }
            }
          }

        }

     };
     if($flag==1)
     {
       $total_product = implode('-> ',$product_name);
      //  echo $total_product;
      echo "Order Placed Successfully";
      $detail_query = mysqli_query($conn, "INSERT INTO `orders` (userid, name, address, phone, mobnumber, txid, totalproduct, totalprice, status, rightsph, rightcyl, rightaxiX, leftsph, leftcyl, leftaxis, prescriptionimg)
VALUES ('$userid', '$name', '$address', '$number', '$mobnumber', '$txid', '$total_product', '$price_total', '$status', '$rightsph', '$rightcyl', '$rightaxis', '$leftsph', '$leftcyl', '$leftaxis', '$prescriptionimg')") or die($conn->error);

           
             $cart_query1 = mysqli_query($conn, "delete FROM `cart` where userid='$userid'");
           

     }
     else if($flag==0){
      echo "<script>";
      echo "alert('Out of stock !!');";
      echo "</script>";
     }
  };

}



$id=$_SESSION['user'];
 $sql = "SELECT * FROM cart where userid='$id'";
 $result = $conn -> query ($sql);

 if(isset($_POST['update_update_btn'])){
  echo "Updating the order quantity";
  $update_value = $_POST['update_quantity'];
  $update_id = $_POST['update_quantity_id'];
  $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
  if($update_quantity_query){
     echo '<script>window.location.href = "Cart.php";</script>';
     exit;
  };
};

if(isset($_GET['remove'])){
  $remove_id = $_GET['remove'];
  mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
  echo '<script>window.location.href = "Cart.php";</script>';
  exit;
};


?>

<div class="container pendingbody">
  <h5><b>CART</b></h5>
<table class="table" border="1">
  <thead>
    <tr>
      <th scope="col">S.N</th>
      <th scope="col">Particular</th>
      <th scope="col">Amount</th>
      <th scope="col">Remove</th>
      <th scope="col">Quantity</th>
      <th scope="col">Power</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sn=0;
  $total=0;
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              $sn=$sn+1;
              ?>
    <tr>
      <th scope="row"><?php echo $sn   ?></th>
      <td><?php echo $row["name"] ?></td>
  
      <td><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="update_quantity_id"  value="<?php echo  $row['id']; ?>" >
        <input type="number" name="update_quantity" min="1"  value="<?php echo $row['quantity']; ?>" >
        <input type="submit" value="update" name="update_update_btn">
      </form></td> 
      <td ><?php echo $row["price"]*$row["quantity"]  ?></td>
      <?php $total=$total+$row["price"]*$row["quantity"] ;?>
     

      <input type="hidden" name="status" value="pending">   
      <td><a href="cart.php?remove=<?php echo $row['id']; ?>">remove</a></td>
       <td><?php echo $row['Power']; ?></td>
       
    </tr>
   
           
         

    <?php 
     echo '<div class="cartinfo">';
     echo "Remaining: " . $row['quantity'] . "<br>";
     echo '</div>';
     $power=$row['Power'];
     
    }
    // echo "total=" . $row['quantity'];
        } 
        else 
            echo "0 results";
        ?>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

       
      <div class="input-group form-group">
      <input type="hidden" name="total" value="<?php echo $total ?>">
      <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']; ?>">
      <input type="hidden" name="user_name" value="<?php echo $_SESSION['user']; ?>">
      Address: &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; <input type="text" class="form-control" placeholder="<?php echo $_SESSION['address']; ?>" value="<?php echo $_SESSION['address']; ?>" name="address" required><br>
     
    
       </div>
       <div class="input-group form-group">
       Phone Number:&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; <input type="number" class="form-control" placeholder="<?php echo $_SESSION['phonenum']; ?>" value="<?php echo $_SESSION['phonenum']; ?>" name="phonenumber" required>
       </div> 
       <div class="input-group form-group">
        <input type="hidden" class="form-control" placeholder="Nogod/Rocket Number" name="mobnumber">
       </div>
       <div class="input-group form-group">
        <input type="hidden" class="form-control" placeholder="Txid" name="txid">
       </div> 
       <?php 
      if($power=="YES"){ ?>
        Right EYE:  &nbsp;<input type="text" class="powerform" placeholder="SPH" name="rightsph" required>  
        <input type="text" class="powerform" placeholder="cyl" name="rightcyl" required>
        <input type="text" class="powerform" placeholder="Axis" name="rightaxis" required> <br><br>


        Left EYE: &nbsp; &nbsp;<input type="text" class="powerform" placeholder="SPH" name="leftsph" required>  
        <input type="text" class="powerform" placeholder="cyl" name="leftcyl" required>
        <input type="text" class="powerform" placeholder="Axis" name="leftaxis" required> <br><br>
        Prescription: <input type="file" name="prescriptionimg" class="form-control-file" id="uploadfile" required><br><br><?php
       
      }  
       ?>

      <div class="form-group" style=" margin-left:1000px;">
      <input type="submit" class="orderbtn" value="Order Now" name="order_btn">
      
    </div>

    </form>
  </tbody>
</table>
</div>


<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
   /* Reset default margin and padding */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Use a more modern font */
body {
  font-family: Arial, sans-serif;
  background-image: url('background.jpg'); /* Replace 'background.jpg' with the path to your background image */
  background-size: cover;
  background-position: center;
  animation: cartanimation 5s linear infinite alternate;
}

/* Style the order button */
.orderbtn {
  margin: -10px -1000px;
  display: block;
  padding: 10px 20px;
  font-size: 18px;
  background: #FF5722;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

/* Style the table */
.container.pendingbody {
  margin: 20px auto;
  max-width: 800px;
  background: white;
  border: 1px solid #87CEEB;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.table {
  width: 100%;
  border-collapse: collapse;
}

.table th,
.table td {
  text-align: center;
  padding: 10px;
}

.table th {
  background: #87CEEB;
  color: white;
}

.table td {
  background: #F0F8FF;
}

/* Style the input fields */
.input-group {
  margin-bottom: 10px;
}

.form-control {
  width: 100%;
  padding: 10px;
  border: 1px solid #87CEEB;
  border-radius: 5px;
}
.powerform{
  width: 10%;
  padding: 10px;
  border: 1px solid #87CEEB;
  border-radius: 5px;

}

/* Style the remove link */
.table td a {
  color: #FF5722;
  text-decoration: none;
}

/* Add animation to the sale image */
.sale img {
  height: 100px;
  width: 100px;
  margin-top: -600px;
  margin-left: 100px;
  animation: imganim 2s infinite;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
}

@keyframes imganim {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.2);
  }
  100% {
    transform: scale(1);
  }
}

/* Style the left panel image */
.leftpanel img {
  height: 400px;
  width: 400px;
  margin-top: -500px;
  margin-left: 100px;
  box-shadow: inset 0 -3em 9em white, 0 0 0 2px #87CEEB,
    0.3em 0.3em 1em rgba(0, 0, 0, 0.3);
  animation: imganim 2s infinite;
}

/* Animation for the background color */
@keyframes cartanimation {
  0% {
    background-color: whitesmoke;
  }
  50% {
    background-color: #F0F8FF;
  }
  100% {
    background-color: white;
  }
}

/* Style the heading */
.pendingbody h5 {
  color: #87CEEB;
  text-align: center;
  font-size: 24px;
  margin-bottom: 20px;
}

/* Add a hover effect to buttons */
.orderbtn:hover,
.table td a:hover {
  background: #FF795E;
}

/* Additional styles for other elements can be added here */


    </style>
</head>
<body>
<!-- <div class="sale"><img src="buy.gif"></div>
      <div class="leftpanel"><img src="manyglass.jpg"></div> -->
      
</body>
</html>