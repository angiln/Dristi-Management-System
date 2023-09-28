<?php 
session_start();
// $_SESSION['loggedin']==true;
$connect = mysqli_connect("localhost", "root", "") or die("Unable to connect to MySQL Sever.");
require 'config.php';
  

if (isset($_POST['login'])) {
          if ($_POST['username']=="admin" && $_POST['pwd'] =="admin") {
        //     $adminPageUrl = 'Admin.php'; // Relative path to your Admin.php page
        //    echo '<meta http-equiv="refresh" content="0;url='.$adminPageUrl.'">';
        //  exit();
            // $username=$_POST['username'];
            // echo $username;
            header("Location:Admin.php");
             
          }
       else {

          $pwd = $_POST['pwd'];
          $username=$_POST['username'];

          $test = "SELECT Email,Password,FirstName,Username,address,ContactNumber FROM registeruser ";
          $allUsers = $connect->query($test);
          $flag = 0;
          
        while ($test = $allUsers->fetch_assoc()) {
        if ($test['Username'] == $username && $test['Password'] == $pwd) {
            $flag = 1;
            $_SESSION['address']=$test['address'];
            $_SESSION['phonenum']=$test['ContactNumber'];
            $user = $test['FirstName'];
            $_SESSION['email']  = $email;
              $_SESSION['pwd']    = $pwd;
              $_SESSION['user']   = $user;
              $_SESSION['loggedin']= true;
                      
            
              }
          
        if ($flag == 1) {

              
              Header("Location:Home.php");
             
          } 
         else 
        {
      echo '<script language="javascript">';
      echo 'alert("Invalid Username or Password!!!")';
      echo '</script>';
      sleep(2);
      header("location:loginpage.html");
    }
}}}
else{
  echo "No data";
}
?>