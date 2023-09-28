<?php
   include 'Finalheader.php';
   session_start(); // Make sure to start the session at the beginning of your script

// Check if the "user" key is set in the session
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    // The "user" key is not set, handle accordingly
    $user = "Guest"; // Default value for non-logged in users
}
//    if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!==true){
//     header("Location:loginpage.html");
//    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THIRDEYE</title>
    <style>
       .aboutus h2{
        font:20px arial sanserif;
       }
       .Banner{
        width: 1350px;
        height: 550px;
        overflow: hidden;
        position: relative;
        margin-left:-120px;
       }
       .slide {
    width: 100%;
    height: 100%;
    background-size: cover;
    background-repeat: no-repeat;
    animation:noanimation 5s infinite;
    position: absolute;
    display:grid;
    grid-template-columns:600px 500px;
     }

     .slide:nth-child(1) {
    background-image: url(background1.jpg);
    animation-delay: 0s;
}
.rightslide img{
    height:500px;
    width:600px;
    margin-top:30px;
    margin-left:100px;
 
}
.leftslide{
    display:grid;
    grid-template-rows:400px 300px;
}

.maintxt{
    margin-left:100px;
    margin-top:100px;
    font:49px arial sanserif;
}
.better{
    color:green;
}
.tex{
    font:20px arial sanseri;
    color:black;
}
.leftslide h5{
    font:15px arial sanserif;
}
 .servicesbox{
    display:grid;
    grid-template-columns:300px 300px 300px;
    margin-left:150px;

 } 
 .servicebox img{
   ;
    
 }
 /* .service3 img{
    height:350px;
    width:340px;
 } */
 .services1 img{
    height:340px;
    width:370px;
 }
       /* .sliding-banner {
    width: 100%;
    height: 500px;
    overflow: hidden;
    position: relative;
}

.slide {
    width: 100%;
    height: 100%;
    background-size: cover;
    background-repeat: no-repeat;
    animation: slideAnimation 5s infinite;
    position: absolute;
}

.slide:nth-child(1) {
    background-image: url(banner1.jpg);
    animation-delay: 0s;
}

.slide:nth-child(2) {
    background-image: url(banner2.jpg);
    animation-delay: 0s;
}

.slide:nth-child(3) {
    background-image: url(banner3.jpg);
    animation-delay: 1s;
}

@keyframes slideAnimation {
    0% { left: 0; }
    20% { left: 0; }
    25% { left: -100%; }
    45% { left: -100%; }
    50% { left: -200%; }
    70% { left: -200%; }
    75% { left: -300%; }
    95% { left: -300%; }
    100% { left: -400%; }
}
.aboutus{
    border:1px solid whitesmoke;
    background-color:whitesmoke;
    color:Olive;
    font-weight:bold;
    margin-left:65px;
    width:1100px;
} */
.lower-than-banner{
        margin-top:100px;
        margin-left:100px;
     }
     .services-container{
        display:grid;
        grid-template-columns:400px 400px 400px;
        margin:100px;
     }     
     #eyecheck,#lotsofglass,#adhola{
        height:300px;
        width:300px;
     }
     .frme{
       
   
     

     }
     .check-box{
        width:300px;
        height:390px;
        border:1px solid skyblue;
        background:white;
        box-shadow: inset 0 -3em 3em rgba(0, 0, 0, 0.1), 0 0 0 2px rgb(255, 255, 255),
         0.3em 0.3em 1em rgba(0, 0, 0, 0.3);
     }
     .glass-box{
        width:300px;
        height:390px;
        border:1px solid skyblue;
        background:white;
        box-shadow: inset 0 -3em 3em rgba(0, 0, 0, 0.1), 0 0 0 2px rgb(255, 255, 255),
         0.3em 0.3em 1em rgba(0, 0, 0, 0.3);
     }
     .not-known-yet{
        width:300px;
        height:390px;
        border:1px solid skyblue;
        background:white;
        box-shadow: inset 0 -3em 3em rgba(0, 0, 0, 0.1), 0 0 0 2px rgb(255, 255, 255),
         0.3em 0.3em 1em rgba(0, 0, 0, 0.3);
     }
     #adhola-text{
        margin-left:90px;
        margin-top:30px;
        color:black;
     }
.frme:hover{
       width:300px; 
        height:390px;
        border:1px solid green;
        background:white;
        box-shadow: inset 0 -3em 9em white, 0 0 0 2px #87CEEB,
         0.3em 0.3em 1em rgba(0, 0, 0, 0.3);
     }
    .services-box{
        margin-left:40px;
        margin-top:80px;
        display:grid;
        grid-template-columns:500px 400px;
    }
     h1{
        margin-left:500px;
       
        font: 60px Arial, sans-serif;
        text-shadow:  #C5E8B7 1px 0 10px;
     } 
     #pic-services{
        height:300px;
        width:300px;
        margin-top:-200px;
        box-shadow: inset 0 -3em 9em white, 0 0 0 2px #87CEEB,
         0.3em 0.3em 1em rgba(0, 0, 0, 0.3);
     }   
     .pic-right{
        margin-left:700px;
       
        
    }  
    .text-left p{
        margin-top:10px;
    }
    .text-left{
        border:1px solid white;
        background:white;
        height:230px;
        width:500px;
        margin-top:50px;
        margin-left:100px;
        box-shadow: inset 0 -3em 9em white, 0 0 0 2px #87CEEB,
         0.3em 0.3em 1em rgba(0, 0, 0, 0.3);
        
    }
    .services2-box{
        margin-left:-800px;
        margin-top:80px;
       
    }
    .text2-left{
   margin-top:50px;
   margin-left:89px;
   width:500px;
   height:240px;
   border:1px solid skyblue;
   background:white;
   box-shadow: inset 0 -3em 9em white, 0 0 0 2px #87CEEB,
         0.3em 0.3em 1em rgba(0, 0, 0, 0.3);

    }
    .pic2-right{
    margin-top:-35px;
    margin-left:710px;
    box-shadow: inset 0 -3em 9em white, 0 0 0 2px #87CEEB,
         0.3em 0.3em 1em rgba(0, 0, 0, 0.3);
    }
    .upperfooter img{
        width:1320px;
        height:300px;
        margin-left:-120px;
        margin-top:100px;
    }

        </style>
</head>
<body>
<div class="container">
    <div class="Banner">
       <div class="slide">
        <div class="leftslide">
             <div class="maintxt"><p>More Real <br>Vision For <b>better</b> Life</p>
            <p class="tex">New Season ! New Expressions !</p>
            <h5 class="simpletxt">Welcome to our web store !! We have various sunglasses as well as prescription frames to comfort your eyes .</h5>
        </div>
             <div class="secondmaintxt"></div>

        </div>
        <div class="rightslide"><img src="banner.jpg"></div>
       </div>
    </div>

    </div>
    </div>
          <div class="lower-than-banner">
            <h1>Our Services </h1><br>
              <div class="services-container">   
                   <div class="check-box frme"> 
                    <img src="eyewall.jpg" id="eyecheck"><p id="adhola-text"><b>Various Frames</b></p>
                   </div>
                   <div class="not-known-yet frme">
                    <img src="board.jpg" id="adhola"> <p id="adhola-text"><b>EYE CHECKING</b></div>
                   <div class="glass-box frme"> 
                    <img src="sunglasses.jpg" id="lotsofglass"><hr><p id="adhola-text"><b>Sunglasses</b></p>
                   </div>
             </div>
             <div class="services-box">
                <div class="text-left">  
                       <h3> Eye checking</h3>
                       <p>It includes your  complete ocular health check-up, your ability to see at far and near, need for eyeglasses to correct refractive errors, structural and functional integrity of the front and back part of your eyes by our expert Optometrist and Ophthalmologist .It also includes the screening of  risk of Diabetic retinopathy for Diabetes patients and risk of Glaucoma.We take pride in offering an extensive range of eyeglasses that cater to diverse tastes and preferences. </p>
                <div>
                <div class="pic-right"> 
                    <img src="eyewall.jpg" id="pic-services" style="margin-top:-250px;">
                
                <div>

             </div>
             <div class="services2-box" >
              <div class="text2-left">  
                       <h3> Eye Glasses</h3>
                       <p> Whether you're searching for classic designs, modern trends, or unique frames, we have it all. Our collection encompasses various of shapes, colors, materials, and sizes, ensuring that you'll find  perfect pair that complements your individual style and personality. With our commitment to quality and customer satisfaction, we strive to provide an exceptional shopping experience for all eyewear enthusiasts. Explore our vast selection today and discover the eyeglasses that will not only enhance your vision but also elevate your fashion game.<div>
                <div class="pic2-right"> 
                    <img src="board.jpg" id="pic-services" style="margin-top:-250px;">
                
                <div> </div>
         </div>
         
   
   </div>
       <div class="upperfooter">
        <img src="probabblebanner.png">
       </div><br><br>
   <?php include "Footer.php"  ?>
</body>
</html>

