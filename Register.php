<?php  
require 'config.php';
if (isset($_POST['btnSubmit'])) {
  //$connect = mysqli_connect("localhost","root","") or die ("Unable to connect to MySQL Sever.");
  //require 'config.php';

  $fname = $_POST['fname'];
  $user = $fname;
  $lname = $_POST['lname'];
  $gender = $_POST['gender'];
  //$address=$_POST['address']; 
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $test = "select email from register";
  $allUsers = $connect->query($test);
  $flag = 0;
  while ($test = $allUsers->fetch_assoc()) {
    if ($test['email'] == $_POST['email']) $flag = 1;
  }
  if ($flag) {
    header("Location:login.html");
    echo '<script language="javascript">';
    echo 'alert("Email Already exists!!")';
    echo '</script>';
  } else {
    $connect->query("INSERT INTO `register`(`id`, `fname`, `lname`, `gender`, `address`, `email`, `contact`, `password`)
                VALUES (NULL,'$fname','$lname','$gender','random','$email','$contact','$password')");
    $id = "select id from register where email = '" . $_POST['email'] . "' and password = '" . $_POST['password'] . "' ;";
    //session_start();
    $_SESSION['email'] = $email;
    $_SESSION['pwd']   = $password;
    $_SESSION['user']  = $fname;
    header("Location:login.html");
    echo '<script language="javascript">';
    echo 'alert("User Registered Successfully!")';
    echo '</script>';
    // header("Location:login.html");
  }
  $connect->close();  // close Connection

}
?>