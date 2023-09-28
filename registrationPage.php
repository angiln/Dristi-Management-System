<?php
 $nameerr = $contacterr = "";
 $firstnameErr = $lastnameErr =$confirmpasswordErr= $emailErr = $contactErr = $usernameErr = $passwordErr = $addressErr = " ";
 $fname=$lname=$email=$contact=$address=$username=$password=$confirmpassword=" ";
  //   if(isset($_POST['contact'])){

    
  //   $phoneNumber=$_POST['contact'];
  //   $pattern = "/^\+977-98/"; // Change "+123" to the desired starting pattern
    
  //   if (preg_match($pattern, $phoneNumber)) {
  //       echo "Phone number starts with the desired pattern.";
  //   } else {
  //       echo "Phone number does not start with the desired pattern.";
  //   } 
  // }  


if (isset($_POST['btnSubmit'])) {
  $connect = mysqli_connect("localhost","root","") or die ("Unable to connect to MySQL Sever.");
  require 'config.php';
  // var_dump($connect);

  $fname = $_POST['firstname'];
  $username=$_POST['username'];
  $lname = $_POST['lastname'];
  $address=$_POST['address'];
//   $gender = $_POST['gender'];
  //$address=$_POST['address']; 
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $password = $_POST['password'];
  if(empty($_POST['firstname'])){
    $firstnameErr="Please enter firstname ";
   }
    elseif(preg_match('/[a-zA-Z]+$/u', $fname)) 
 {
    $fname=$_POST['firstname'];
    $firstnameErr="";
 }
 else {
  $firstnameErr="Please enter only alphabets !";
}
 if(empty($_POST['lastname'])){
  $lastnameErr="Please enter lastname";
 }
 elseif(preg_match('/[a-zA-Z]+$/u', $lname)) {
  $lname = $_POST['lastname'];
  $lastnameErr="";
 }
 else {
  $lastnameErr="Please enter only alphabets";
  }
 if(empty($_POST['email'])){
  $emailErr="Please enter Email";
 }
 elseif(preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
  $email = $_POST['email'];
  $emailErr="";
 }
 else {
  $lastnameErr="Please enter only alphabets";
  }
 if(empty($_POST['contact'])){
  $contactErr="Please enter contact no";
 }
 elseif(preg_match('/^9[78][0-9]+$/', $contact)) {
  $contact = $_POST['contact'];
  $contactErr="";
 }
 else {
  $contactErr="Please enter valid contact";
  }
 if(empty($_POST['address'])){
  $addressErr="Please enter address";
 }
 elseif(preg_match('/^[a-zA-Z0-9\s\.,#-]+$/', $address)) {
  $address= $_POST['address'];
  $addressErr="";
 }
 else {
  $addressErr="Please enter valid address";
  }
  if (empty($_POST['username'])) {
    $usernameErr = "Please enter username";
} elseif (strlen($_POST['username']) > 10) {
    $usernameErr = "Username cannot be more than 10 characters";
} elseif (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=])(?=.*[a-zA-Z\d@#$%^&+=]).{8,}$/', $_POST['username'])) {
    $username = $_POST['username'];
    $usernameErr = "";
} else {
    $usernameErr = "Please enter valid username";
}

if (empty($_POST['password'])) {
    $passwordErr = "Please enter password";
} elseif (strlen($_POST['password']) > 10) {
    $passwordErr = "Password cannot be more than 10 characters";
} elseif (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&+=])(?=.*[a-zA-Z\d@#$%^&+=]).{8,}$/', $_POST['password'])) {
    if ($username == $_POST['password']) {
        $passwordErr = "Username and password can't be the same";
    } else {
        $password = $_POST['password'];
        $passwordErr = "";
    }
} else {
    $passwordErr = "Please enter a valid password";
}


   

    if(!$firstnameErr && !$lastnameErr && !$emailErr && !$contactErr && !$usernameErr && !$passwordErr && !$addressErr ){
      $connect->query("INSERT INTO `registeruser`(`id`, `FirstName`, `LastName`, `Email`, `ContactNumber`, `Address`, `Username`, `Password`) 
      VALUES  (NULL,'$fname','$lname','$email','$contact','$address','$username','$password')");
      $id = "select id from register where email = '" . $_POST['email'] . "' and password = '" . $_POST['password'] . "' ;";
      session_start();
      $_SESSION['email'] = $email;
      $_SESSION['pwd']   = $password;
      $_SESSION['user']  = $fname;
      header("Location:loginpage.html");
      echo '<script language="javascript">';
      echo 'alert("User Registered Successfully!")';
      echo '</script>';
      // header("Location:login.html");
      // echo '<script>alert("Perfect No errors!");</script>';
    }
    else{
      echo '<script>alert("error!");</script>';
    }
   }

 
 
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Registration Page</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
      }
      .container {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        margin: 50px auto;
        max-width: 500px;
        padding: 30px;
      }
      h2 {
        margin-top: 0;
      }
      label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
      }
      input[type="text"],
      input[type="email"],
      input[type="password"],
      input[type="tel"],
      textarea {
        border-radius: 3px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        margin-bottom: 20px;
        padding: 10px;
        width: 100%;
      }
      input[type="submit"] {
        background-color: #4caf50;
        border: none;
        border-radius: 3px;
        color: #fff;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        padding: 10px;
        width: 100%;
      }
      input[type="submit"]:hover {
        background-color: #3e8e41;
      }
      .error {
        color: red;
        font-weight: bold;
        margin-top: 5px;
      }
    </style>
    <!-- <script>
      function validatePassword() {
        const password = document.getElementById("password").value;
        const regex = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,}$/;
        if (!regex.test(password)) {
          document.getElementById("password-error").textContent =
            "Password must have at least 8 characters including 1 capital letter, 1 number, and 1 special character.";
          return false;
        } else {
          document.getElementById("password-error").textContent = "";
          return true;
        }
      }
    </script> -->
 
  </head>
  <body>
    <?php include 'Connection.php';?>
    <div class="container">
      <h2>Registration</h2>
      <form action="<?php $_SERVER['PHP_SELF']?>" method="post" >
      <!-- <form action="" method="post" onsubmit="return validatePassword()"> -->
        <!-- <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required> -->
        <label for="firstname">First Name: <span style="color:red;"><?php echo $firstnameErr; ?></span></label>
        <input type="text" id="firstname" name="firstname" placeholder="Ram" >
        <label for="lastname">LastName:<span style="color:red;"><?php echo $lastnameErr; ?></span></label>
        <input type="text" id="lastname" name="lastname" required>
        <label for="email">Email:<span style="color:red;"><?php echo $emailErr; ?></span></label>
        <input type="email" id="email" name="email" required>
        <label for="contact">Contact No:<span style="color:red;"><?php echo $contactErr; ?></span></label>
        <input type="tel" id="contact" name="contact" placeholder="+977-98xxxxxxxx" required>
        <label for="address">Address:<span style="color:red;"><?php echo $addressErr; ?></span></label>
        <textarea id="address" name="address" required></textarea>
        <label for="username">Username:<span style="color:red;"><?php echo $usernameErr; ?></span></label>
        <input type="text" id="username" name="username" placeholder="Abcd123" required>

        <label for="password">Password:<span style="color:red;"><?php echo $passwordErr; ?></span></label>
          <input type="password" id="password" name="password" >  <span id="toggle-button" class="toggle-btn" onclick="togglePasswordVisibility()">Visible</span>
        <p id="password-error" class="error"></p>
        <button type="submit" class="btn btn-primary btn-user btn-block" name="btnSubmit">Register Account</button>
      </form>
      <script>
         function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var toggleButton = document.getElementById("toggle-button");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleButton.innerText = "Hidden";
            } else {
                passwordInput.type = "password";
                toggleButton.innerText = "Visible";
            }
        }
        </script>
    </div>
  </body>
</html>
