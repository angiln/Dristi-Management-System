<?php  
error_reporting(E_ALL & ~E_NOTICE);
session_start();
session_start(); // Make sure to start the session at the beginning of your script

// Check if the "user" key is set in the session
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    // The "user" key is not set, handle accordingly
    $user = "Guest"; // Default value for non-logged in users
}
// echo $user;
   ?>
<!DOCTYPE html>
<html>
<head>
	<title>Fashion</title>
	<meta charset="UTF-8">
    <meta name="description" content="test">
    <meta name="keywords" content="HTML, CSS, BOOTSTRAP">
    <meta name="author" content="Bipul">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet">
    <!--font-family: 'Raleway', sans-serif;-->
    <link rel="favicon" type="text/css" href="#favicon">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <style >
     .navbar {
        background-color: #f2f2f2;
        padding: 15px 0;
        height:60px;
      }

      .navbar-brand {
        color: skyblue;
        font-size: 23px;
        font-family: 'Raleway', sans-serif;
        font-weight: bold;
        margin-right: 20px;
      
      }

      .navbar-nav .nav-link {
        color: white;
        font-weight: bold;
        margin:10px;
      }

      .navbar-nav .nav-link:hover {
        color: white;
        background-color:skyblue;
        border: 1px solid whitesmoke;
        border-radius: 20px;
      }

      .navbar-toggler {
        border: none;
        outline: none;
      }

      .navbar-toggler-icon {
        background-color: #007bff;
        width: 24px;
        height: 2px;
      }

      .navbar-toggler-icon:before,
      .navbar-toggler-icon:after {
        background-color: #007bff;
        content: "";
        display: block;
        width: 24px;
        height: 2px;
      }

      .logo b {
        /* color: skyblue;
        font: 23px arial sans-serif;
        margin-left:100px;
        .logo b { */
        color: skyblue;
        font-size: 30px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 0;
        display: inline-block;
      /* } */
      }
      #navbarSupportedContent{
        margin-left:290px;
      }
    </style>

</head>

<body>
  
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="logo">
      
     <a href="Home.php"> <b>THIRD EYE</b></div></a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            
              <li class="nav-item">
          
                <a class="nav-link" href="Home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Glasses.php">Store</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pfglasses.php">Prescription Frames</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="booktime.php">Book Time</a>
              </li> -->
              <!-- <li class="nav-item">
                <a class="nav-link" href="Mybookings.php">My Bookings</a>
              </li> -->
              <?php  if($user=="Guest"){  ?>
                <li class="nav-item">
                <a class="nav-link" href=""></a>
              </li> <?php }  
              else{ ?>
              <li class="nav-item">
                <a class="nav-link" href="Cart.php">Cart</a>
              </li>
               <?php }
              ?>
              <li class="nav-item">
              <a class="nav-link" href="StoreLocator.php">Store Locator</a>
              </li>
            </ul>
            <!-- <form class="form-inline"  action="search(1).php" method="post">
              
        <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="name">
        <button class="btn btn-outline-dark" type="submit" style="margin-left:px;margin-right:7px;"><img src="search.png"></button>
        </form> -->
               
        <?php  if($user=="Guest"){  ?>
          <a href="Loginpage.html">Login</a> 
          
           <?php }  
              else{ ?>
              <a href="Logout.php">Logout</a> 
              &nbsp;&nbsp;
              <a href="profile.php">Profile</a>  
               <?php }
              ?>
         
        
     </div>
   </div>


</nav>

</body>
</html>