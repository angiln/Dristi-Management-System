<?php
  session_start();

 include'Adminheader.php';
include 'connection.php';
// if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!==true){
//     header("Location:loginpage.html");
//    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
   

    <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    .homebody {
      text-align: center;
      margin-bottom: 40px;
    }

    .welcome-message {
      font-size: 24px;
      margin-bottom: 20px;
    }

    .navigation-holder {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      justify-items: center;
      align-items: center;
    }

    .dashboard-card {
      background-color: #fff;
      border-radius: 4px;
      padding: 20px;
      text-align: center;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .dashboard-card::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(255, 255, 255, 0.7);
      transform: translateX(-100%);
      transition: transform 0.3s ease;
    }

    .dashboard-card:hover::before {
      transform: translateX(0);
    }

    .dashboard-card a {
      text-decoration: none;
      color: #333;
    }

    .dashboard-card:hover {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transform: translateY(-5px);
    }

    .dashboard-card h2 {
      font-size: 24px;
      margin-bottom: 10px;
    }

    .dashboard-card p {
      font-size: 16px;
      color: #777;
      margin-bottom: 0;
    }

    .dashboard-card img {
      max-width: 100%;
      height: auto;
      border-radius: 50%;
      margin-bottom: 20px;
      opacity: 0.9;
      transition: opacity 0.3s ease;
    }

    /* .dashboard-card:hover img {
      opacity: 1;
    } */

    /* @keyframes slideIn {
      from {
        transform: translateX(-100%);
      }
      to {
        transform: translateX(0);
      }
    } */

    .dashboard-card:nth-child(odd) {
      animation: slideIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    .dashboard-card:nth-child(even) {
      animation: fadeIn 0.5s ease-in-out;
    }
    img{
        height:100px;
        width:100px;
    }
    </style>
</head>
<body>

<div class="container">
  <div class="homebody">
    <h1>Welcome To The Admin Panel</h1>
    <p class="welcome-message">Hello, Admin!</p>
  </div>

  <div class="navigation-holder">
    <div class="dashboard-card">
      <a href="Users.php">
        <img src="user.gif" alt="Users" />
        <h2>Users</h2>
        <p>Manage Users</p>
      </a>
    </div>

    <div class="dashboard-card">
      <a href="Deliveredorders.php">
        <img src="shipped.png" alt="Delivered Orders" />
        <h2>Delivered Orders</h2>
        <p>Manage Delivered Orders</p>
      </a>
    </div>

    <div class="dashboard-card">
      <a href="pending_orders.php">
        <img src="wip.png" alt="Pending Orders" />
        <h2>Pending Orders</h2>
        <p>Manage Pending Orders</p>
      </a>
    </div>
  </div>
</div>
<script>
  // Retrieve data for the bar graph (example data)
  const labels = ['January', 'February', 'March', 'April', 'May'];
  const data = [10, 20, 15, 25, 30];

  // Create a bar chart
  const ctx = document.getElementById('barChart').getContext('2d');
  const barChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: labels,
      datasets: [{
        label: 'Sales',
        data: data,
        backgroundColor: 'rgba(75, 192, 192, 0.6)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<div class="container">
  <canvas id="barChart"></canvas>
</div>

</body>
</html>
