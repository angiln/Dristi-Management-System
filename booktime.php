<?php
session_start();
if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!==true){
    header("Location:loginpage.html");
    exit;
   }

$username=$_SESSION['user'];
// echo $email;
include 'connection.php'; 
include 'Finalheader.php';
$connect = mysqli_connect("localhost", "root", "") or die("Unable to connect to MySQL Sever.");
require 'config.php';
$sql="SELECT FirstName FROM registeruser WHERE Username='$username'";
    $result=mysqli_query($connect,$sql);
    $row = $result->fetch_assoc();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header('Location:loginpage.html');
    exit;
   
    }
    

//    Step 4: Display the row data
    if ($row) {
    echo "Hello : " . $row['FirstName'] . "<br>";
    // echo "Name: " . $row['lname'] . "<br>";
    // Display other column values as needed
    } else {
    echo "No rows found.";
    }

// Close the statement and connection


?>

<!DOCTYPE html>
<html>
<head>
	<title> Futsal Book</title>
	<script src="javascript/jvs.js"></script>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Booking Page</title>
    <style>
    #bs-example-navbar-collapse-1 ul li a{
        color:green;
    }
    #bs-example-navbar-collapse-1 ul li a:hover{
        background:green;
        color:white;
        border-radius:20px;
    }
    .active{
    background-color:lightgreen;

}

     </style>

   
	
</head>
<body style=" background:Whitesmoke;">
                 <?php
                    // if(isset($_SESSION['email']))
                    // {  
                    //  if($_SESSION['email'] == 'admin' )
                    //     echo 'admin.php';
                    // else
                    //     echo 'customer.php';
                    // }
                    // else 
                    //   echo 'index.php';

                    ?> 
                  
    </nav>
    <br><br><br>
	<div style="position: relative; color:green;left : 6%; font-size: 20px;">
       
		<form name="booking" action="Futsalbooking.php" method="POST">
    	<p><label>Select Date:</label>
    	<input type = "date" name = "bookdate" style="color:#222;" value="<?php 
    							if(isset($_POST['dSubmit']))
    								echo $_POST['bookdate'];
    							else{
    								$today=time()+13500;
    								echo (date("Y-m-d",$today));
    							}
    								?>" required>
    	<span class="btn-group-sm">
        <script>
         var curr = new Date();
            function myFunction(a)
            {

                // document.getElementById("demo").innerHTML = a * b;
                var dateA = new Date(a);
                var dateB = new Date(curr);
                if(dateA < dateB)
                {
                    alert("Invalid Date please re-enter the date!");
                    document.getElementByName('bookdate').focus();
                }

            }
        </script>
        <input type="submit" class="btn btn-success " value="Check" name="dSubmit" onclick="myFunction(bookdate.value);"></input></span>
    	</p>
		</form>
	</div>
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
<?php



		$connect = mysqli_connect("localhost","root","") or die ("Unable to connect to MySQL Sever.");
		require 'config.php';
		//session_start();
		if(isset($_POST['dSubmit']))
        {
			$bookdate = $_POST['bookdate'];
            //$hr       = $_POST['hr'];
            $timestamp = strtotime($bookdate);
            $x=time();
            //echo $bookdate .' = '. $timestamp;
            //echo '<br>Today = '. time();
            //$timestamp+ = $hr;
            if(($timestamp-$x)<0){
                echo '  <script language="javascript">
                        alert("Sorry you enterd expired date value!!\nPlease select a valid date. \nDate has been reverted to current date! ");
                        window.location.replace("Futsalbooking.php");
                        </script>';
                //$t=time()+13500;
                //$bookdate=date('Y-m-d',$t);

            }
        }
		else
		{
			$t=time()+13500;
			$bookdate=date('Y-m-d',$t);
		}
		
			$deadline=time()-72900;
			$today=time()+13500;
			$bktime = "delete from booking where timecheck < '$deadline' and confirm_key = 1";
			$connect->query($bktime);
			$allshifts = 
			array ('6-7', '7-8', '8-9', '10-11','12-13', '14-15', '16-17', '17-18', '18-19', '19-20');
			//$allshift= array ('A', 'B', 'C', 'D','E', 'F', 'G', 'H', 'I', 'J');
           $flagbook=1000;
			$test = "select shift from booking where bookday='".$bookdate."'";
			$allbookings = $connect->query($test);
			$i=0;
			$testarr = array(); 
			while($test = $allbookings->fetch_assoc())
			{
				$testarr[$i]=$test['shift'];
				$i++;
			}
			$result=array_diff($allshifts, $testarr);

			echo '<div style ="position:relative; top : 20px; left : 5%; margin: 10px; height:90%; width:80%; font-size: 20px;  padding : 3px; color:green;">
				<form name = "shiftselect" action = "Futsalvalidate.php"  method = "POST"> 
					<b>Select your Shift (one at a time) and then press the proceed button. <br>
                    Selected Shifts will be booked for the date &emsp;&emsp;:<u>'.$bookdate.' </u></b><br>

                <table  border="0" cellspacing="40" cellpadding="50" height = "20%"><br><br><br>
								<tr  height= "50px"  class="btn-group-justified">';
			for($i=0;$i<10;$i++)
			{
				if(isset($result[$i])){
					echo '<td style="color:white; font-size:22px;"  align="center" class="btn btn-success">';

					echo '<strong><input  type="radio" name="shift" value='.$result[$i].' required></strong>'.$result[$i];

					echo '</td>';
                    

				}
				else
				{
					echo '<td style="color: red; font-size:20px; align="center" class="btn btn-warning" >';

					echo '<strong><input type="radio" name="shift" disabled></strong>'.$allshifts[$i];

					echo '</td>';
				}
				
			}
			echo '</tr></table>
				  <input type = "hidden" name = "bookdate" value = "'.$bookdate.'"> <br><br>
				  <input type = "submit" style="color:white; font-size:22px;"  align="center" class="btn btn-success" class="btn btn-success" value = "Proceed " name = "proceed">
				  </form>
				  <br>
				<div style="position: relative; font-size:20px; float: right;" >
        			<b>Price:'.$flagbook.'</b><br>
        			<button type="button" class="btn btn-success" style="color: black; font-size:22px;"  align="center" class="btn btn-success">Available
       				<input type="radio" id="radio1" hidden disabled></button>
       				<button type="button" class="btn btn-warning" style="color: black; font-size:22px;"  align="center" class="btn btn-success">Reserved
        			<input type="radio" id="radio2" hidden disabled> </button>               
     			</div>
				<br>
				</div>';	

		    if(isset($_POST['proceed']))
		    {
		    	if(!empty($_SESSION['email']))
				{
		    	$email=$_SESSION['email'];
		    	$bookday=$_POST['bookdate'];
		    	$shift=$_POST['shift'];
		    	$t=time();
		    	$details = "select contact,fname from register where email='".$email."'";
		    	$test = $connect->query($details);
		    	$details=$test->fetch_assoc();
		    	$user=$details['fname'];
		    	$contact=$details['contact'];

		    	$connect->query("INSERT INTO booking (`id`, `user`, `bookday`, `shift`, `contact`, `email`, `timecheck`, `confirm_key`) 
		    									VALUES (NULL, '$user', '$bookday', '$shift', '$contact', '$email', '$t','0');");	
		        $connect->close();
		        }
		     else
		     {
		     	echo '  <script>
					var key= confirm("Login First!");
					
					</script>';
					
		     }    	

		    }	
    
  

		
?>
