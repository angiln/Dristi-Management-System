<?php
include "connection.php";
?>


<!DOCTYPE html>
<html>
<head>
    <title>Fashion</title>
    <meta charset="UTF-8">
    <meta name="description" content="test">
    <meta name="keywords" content="HTML, CSS, BOOTSTRAP">
    <meta name="author" content="Anik">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">

    <style>
      body {
        color: skyblue;
        margin: 0;
        padding: 0;
      }

      .navbar {
        background-color:Skyblue;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        height: 100vh;
        position: fixed;
        top: 0;
        left: -200px;
        transition: left 0.3s;
        z-index: 9999;
        width: 200px;
        color:skyblue;
      }

      .navbar.show {
        left: 0;
      }

      .navbar-brand {
        font-family: 'Raleway', sans-serif;
        font-weight: 900;
        color: white;
        padding: 15px;
        display: block;
        margin-top:-100px;
      }

      .navbar-nav {
        padding-top: 20px;
        color:White;
        margin-top:-300px;
      }

      .navbar-nav .nav-item .nav-link {
        color:white;
        padding: 10px 15px;
        display: block;
        transition: background-color 0.3s;
      }

      .navbar-nav .nav-item .nav-link:hover,
      .navbar-nav .nav-item .nav-link:focus {
        color: #007bff;
        background-color: rgba(0, 123, 255, 0.1);
      }

      .navbar-toggler {
        position: absolute;
        top: 20px;
        left: 20px;
        padding: 5px;
        cursor: pointer;
        z-index: 9999;
      }

      .navbar-toggler .icon-bar {
        display: block;
        width: 25px;
        height: 3px;
        margin-bottom: 5px;
        background-color: #333;
        transition: background-color 0.3s;
      }

      .navbar-toggler .icon-bar:last-child {
        margin-bottom: 0;
      }

      .navbar-toggler:hover .icon-bar {
        background-color: #007bff;
      }

      @media (max-width: 767px) {
        .navbar-nav .nav-item .nav-link {
          padding: 10px;
        }
      }
    </style>
</head>

<body>

<div class="navbar-toggler" onclick="toggleNavbar(this)">
    <div class="icon-bar"></div>
    <div class="icon-bar"></div>
    <div class="icon-bar"></div>
</div>

<nav class="navbar" id="navbar">
    <a class="navbar-brand" href="Admin.php">THIRD EYE</a>

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="Admin.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pending_orders.php">Order Status</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Addproducts.php">Add Products</a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="Addpfproduct.php">Add Prescription Products</a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" href="Allproducts.php">All Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Deliver.php">Delivering</a>
        </li>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Customers.php">Customers</a>
        </li>

        <!-- <li class="nav-item">
            <a class="nav-link" href="Deliveredorders.php">Delivered Orders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pending_orders.php">Pending Orders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Users.php">Users</a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" href="Logout.php">Logout</a>
        </li>
    </ul>
</nav>

<!-- Existing HTML code -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>
  function toggleNavbar(toggler) {
    const navbar = document.getElementById('navbar');
    navbar.classList.toggle('show');
    toggler.classList.toggle('change');
  }

  document.addEventListener('click', function(event) {
    const navbar = document.getElementById('navbar');
    const toggler = document.querySelector('.navbar-toggler');

    if (!navbar.contains(event.target) && !toggler.contains(event.target)) {
      navbar.classList.remove('show');
      toggler.classList.remove('change');
    }
  });
</script>

</body>
</html>
