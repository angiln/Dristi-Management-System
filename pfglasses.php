<?php
ob_start();
error_reporting(E_ALL & ~E_NOTICE);
  
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
//  if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!==true){
//     header("Location:loginpage.html");
//     exit;
//    }

 $sql = "SELECT * FROM product WHERE Power='YES'";
 $result = $conn -> query ($sql);

 
 if(isset($_POST['add_to_cart'])){
   
       
// if(isset($_SESSION['auth']))
// {
//    if($_SESSION['auth']!=1)
//    {
//        header("location:loginpage.php");
//    }
// }
// else
// {
//    header("location:login.php");
// }
if($user=="Guest"){
  echo '<script>alert("Please Login First!");</script>';
   }
   else{
  $user_id=$_SESSION['user'];;
  $product_name = $_POST['product_name'];
  
  $product_price = $_POST['product_price'];
  $product_id = $_POST['product_id'];
  $product_quantity = 1;
  $power= $_POST['power'];
   

  $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE productid = '$product_name'  && userid='$user_id'");

  if(mysqli_num_rows($select_cart) > 0){
    echo $message[] = 'product already added to cart';

  }else{
     $insert_product = mysqli_query($conn, "INSERT INTO `cart`(userid, productid, name, quantity, price,Power) 
     VALUES('$user_id', '$product_id', '$product_name', '$product_quantity', '$product_price','$power')");
  //  echo $message[] = 'product added to cart succesfully'.$product_name;
  echo "<script>alert('Added to cart');</script>";

  echo "<script>
      setTimeout(function() {
          window.location.href = 'pfglasses.php';
      }, 2000); // 2000 milliseconds (2 seconds)
  </script>";
  }
  
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    h4 img{
      height:120px;
      width:100px;
      border-radius:90px;
    margin-left:600px;
    }
  body {
      font-family: Arial, sans-serif;
      background-color: #F0F8FF;
    }

    .topsell-head {
      text-align: center;
      margin-bottom: 30px;
    }

    .topsell-head h4 {
      font-size: 24px;
      color: #333;
      margin: 0;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 15px;
    }

    .row {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .card {
      width: 180px;
      height: 320px;
      margin: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease-in-out;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .image {
      height: 60%;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    .image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .caption {
      padding: 10px;
      text-align: center;
    }

    .caption h6 {
      margin: 0;
      font-size: 16px;
      color:black;
      
    }

    .caption span {
      display: block;
      font-size: 14px;
      color: red;
      margin-top: 5px;
    }

    .btn {
      display: block;
      width: 80%;
      margin: 0 auto;
      margin-top: 10px;
      padding: 10px;
      border: none;
      border-radius: 20px;
      font-weight: bold;
      text-transform: uppercase;
      color: #fff;
      background-color:skyblue;
      cursor: pointer;
      transition: background-color 0.3s ease-in-out;
    }

    .btn:hover {
      background-color: #0056b3;
    }

    .row h4 {
      margin: 0;
      padding: 10px;
      text-align: center;
      font-size: 24px;
      color: #fff;
      background-color: #007bff;
      border-radius: 10px;
      animation: myAnimation 2s linear infinite alternate;
    }

    @keyframes myAnimation {
      0% {
        background-color:skyblue;
        width:200px;
        border-radius:30px;
        color:white;
      }
      50% {
        background-color:skyblue;
        width:200px;
        color:whitesmoke;
      }
      100% {
        background-color:skyblue;
        width:200px;
        border-radius:30px;
        color:white;
      }
    }
    h2{
      margin-left:550px;
      color:skyblue;
    }

    /* h4 {
      border:1px solid green;
      background:white;
      height:40px;
    } */
  </style>
    </style>
</head>
<body>
  
</body>
</html>
  
      
    </div>
    
  <div class="col-md-6">
    
      <img src="" class="img-fluid">
 
  </div>

  </div>
</div>
</div>

<!--banner end-->


<!---top sell start---->

<section>
 
        <h2>Welcome Here !!</h2>
           <h4><img src="storepageicon2.gif"></h4> 

  <div class="container">
  <div class="row">
  <?php
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              $product_name=$row['name'];
              ?>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="card">
              <div class="image">
                <img src="<?php echo $row['imgname']; ?>">
              </div>
              <div>
              <div class="caption">
                <h6><?php echo $row["name"] ?></h6> 
                <span><?php echo  "RS.".$row["price"] ?></span> 
                <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>"> 
                <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">     
                <input type="hidden" name="power" value="<?php echo $row['Power']; ?>">   
                         
              
              </div>
              <input type="submit" class="btn btn btn-primary" value="add to cart" name="add_to_cart">
              </div>
             
            </div>
            </form>
            <?php 
            }
    }
        
        else 
            echo "0 results";
            ob_end_flush();
        ?>

            
          </div>
  </div>
</section>



