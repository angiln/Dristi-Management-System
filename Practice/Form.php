<?php
 // Initialize $Suggestion

// if(isset($_POST['btn'])){
//     $Username=$_POST['Username'];
//     $trimmedText = trim($Username, " ");
//     $Number=$_POST['Number'];
//     $Email=$_POST['Email'];
//     $Fullname=$_POST['Fullname'];
//     $length = 2; // Desired length of the unique identifier
//     $randomBytes = random_bytes($length);
//     $uniqueId = bin2hex($randomBytes);
//     $Suggest=$trimmedText.$uniqueId;
//     $Suggestion =" ".$Suggest;
   
//     if(isset($_POST['Username'])){
       
//         if(strlen($trimmedText)<5){
//             $nameErr="Very short username";
            
//         }
//         else{
//             $nameErr="Successful";
//             $Username=$_POST['Username'];
//         }
      
//     }
//     elseif(!isset($_POST['Username'])){
//         $nameErr=" Please fill up the name";
        
//     }
//     if(isset($_POST['Number'])){
//         if (preg_match('/^9\d{9}$/', $Number)) {
//             echo "Valid phone number";
//         } else {
//             echo "Invalid phone number";
//         }
//     }
    
    
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style> 
      .formcontainer{
        margin-top:100px;
        margin-left:200px;
        background:whitesmoke;
        color:black;
        border:1px solid green;
        border-radius:29px;
        width:500px;
      }
      form{
        padding:100px;
      }
      input[type="text"], input[type="number"], input[type="text"]{
        margin:10px;
        height:20px;
        
      }
      /* input[type="text"]{
        margin:10px;
      } */
    </style>

</head>
<body>
    <div class="formcontainer">
        <div class="f">
        <form method="POST" action="send_email.php">
            Username:
            <input type="text" name="name" placeholder="Jd" >
            
            Email:<input style="margin-left:35px;" type="email" name="email" placeholder="Jhon@Doe.com"><br>
            Phone:<input style="margin-left:35px;" type="number" name="number" placeholder="Jhon Doe"><br>
            FullName:<input type="text" name="message" placeholder="Jhon Doe"><br>
            <input type="Submit" name="btn">
            </form>
        </div>
    </div>
   
</body>
</html>
