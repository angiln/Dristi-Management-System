<?php
session_start();
include 'connection.php'; 
$transactionid=$_GET['TransactionID'];
$sql="SELECT * FROM orders WHERE txid='$transactionid'";
$result = $conn -> query ($sql);
$row = mysqli_fetch_assoc($result);
echo $row['name'];


?>
<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        /* Define your CSS styles for the invoice here */
        body {
            font-family: Arial, sans-serif;
        }
        .invoice {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-table th, .invoice-table td {
            border: 1px solid #ccc;
            padding: 10px;
        }
        .invoice-total {
            margin-top: 20px;
            text-align: right;
        }
        <style>
        /* Define your CSS styles for the invoice here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .invoice {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border: 1px solid #ccc;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-header h1 {
            color: #007bff;
            font-size: 32px;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
        .invoice-details p {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .invoice-table th, .invoice-table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        .invoice-table th {
            background-color: #f5f5f5;
        }
        .invoice-total {
            margin-top: 20px;
            text-align: right;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            margin-left:200px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #0056b3;
        }
        .invoice-artifact {
            position: absolute;
            width: 100px;
            height: 100px;
            background-color: #f5f5f5;
            opacity: 0.2;
            border-radius: 50%;
            transform: rotate(45deg);
        }
        .artifact-1 {
            top: 50px;
            left: 50px;
        }
        .artifact-2 {
            top: 200px;
            left: 200px;
        }
        .artifact-3 {
            top: 300px;
            left: 400px;
        }
    </style>
    </style>
</head>
<body>
    <div class="invoice">
        <div class="invoice-header">
            <h1>ThirdEYE</h1>
        </div>
        <div class="invoice-details">
            <p><strong>Name:</strong><?php echo $row['name'] ;  ?></p>
            <p><strong>Address:</strong> <?php  echo $row['address'];  ?></p>
            <p><strong>Phone:</strong> <?php  echo $row['phone'];  ?></p>
            <p><strong>Transaction ID:</strong> <?php  echo $row['txid'];  ?></p>
        </div>
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> <?php  echo $row['totalproduct'];  ?></td>
                    <td> <?php  echo $row['totalprice'];  ?></td>
                </tr>
            </tbody>
        </table>
        <div class="invoice-total">
            <p><strong>Total Price:</strong><?php  echo $row['totalprice'];  ?> </p>
        </div>
        <br>
        <br>
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Left Details</th>
                    <th>Right Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="color:red;"> <?php  echo "SPH=".$row['rightsph']."  "."CYL=".$row['rightcyl']."     "."AXIX=".$row['rightaxix']; ?></td>
                    <td style="color:red;"> <?php  echo "SPH=".$row['leftsph']."  "."CYL=".$row['leftcyl']."     "."AXIX=".$row['leftaxis'];?></td>
                </tr>
            </tbody>
        </table>
    </div>
   <a href="pending_orders.php">Go back</a>
</body>
</html>
<?php  

?>
