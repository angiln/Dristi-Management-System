<?php
error_reporting(E_ALL);

SESSION_START();

 include 'Adminheader.php';
 include 'connection.php';
 $result=null;
 $id=1;
if (isset($_POST['submit'])) 
{
    $name=$_POST['name'];
    $catagory=$_POST['category'];
    $description=$_POST['description'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];
    $filename = $_FILES["uploadfile"]["name"];
    $power=$_POST['power'];
    $id=12;
    $iid=$id+1;


    $insertSql = "INSERT INTO `product`(`id`, `name`, `category`, `description`, `quantity`, `price`, `imgname`,`Power`)
     VALUES ( $iid,'$name', '$catagory', '$description',$quantity, $price, '$filename','$power')";

    if ($conn -> query ($insertSql)) 
    {
        $result="<h2>*******Data insert success*******</h2>";
        $tempname = $_FILES["uploadfile"]["tmp_name"];   
        $folder = "".$filename;

        move_uploaded_file($tempname, $folder);
    }
    else
    {
     die($conn -> error);
 }

} 
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
            margin-top:-600px;
        }


        .container:hover {
            background-color: whitesmoke;
        }

        h4, label {
            transition: color 0.3s;
        }

        .container:hover h4, .container:hover label {
            color: skyblue;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #4CAF50;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <h4 class="animate__animated animate__fadeInDown">Add Product</h4>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" class="animate__animated animate__fadeIn">
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName">
            </div>
            <div class="mb-3">
                <label for="exampleInputType" class="form-label">Category</label>
                <input type="text" name="category" class="form-control" id="exampleInputType">
            </div>
            <div class="mb-3">
                <label for="exampleInputDescription" class="form-label">Description</label>
                <input type="text" name="description" class="form-control" id="exampleInputDescription">
            </div>
            <div class="mb-3">
                <label for="exampleInputQuantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" id="exampleInputQuantity">
            </div>
            <div class="mb-3">
                <label for="exampleInputPrice" class="form-label">Price</label>
                <input type="number" name="price" class="form-control" id="exampleInputPrice">
            </div>
            <div class="mb-3">
                <label for="exampleInputPower" class="form-label">Power Can Be added (YES // NO )</label>
                <input type="text" name="power" class="form-control" id="exampleInputPower">
            </div>
            <div class="mb-3">
                <label for="uploadfile" class="form-label">Image</label>
                <input type="file" name="uploadfile" class="form-control-file" id="uploadfile">
            </div>
            <button type="submit" name="submit" class="btn btn-primary animate__animated animate__fadeInUp">Submit</button>
        </form>
    </div>
  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.querySelector('.container');
            const elementsToChange = container.querySelectorAll('h4, label');

            container.addEventListener('mouseenter', function () {
                elementsToChange.forEach(function (element) {
                    element.style.color = 'skyblue';
                });
                container.style.backgroundColor = 'whitesmoke';
            });

            container.addEventListener('mouseleave', function () {
                elementsToChange.forEach(function (element) {
                    element.style.color = '';
                });
                container.style.backgroundColor = '';
            });
        });
    </script>
</body>
</html>
