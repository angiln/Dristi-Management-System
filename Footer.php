<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
      margin: 0;
      padding: 0;
      
    }
    .container{
        display:grid;
        grid-template-columns:300px 500px 400px;
        /* margin:30px; */
    }

    .footer {
      background-color:white;
      color:Skyblue;
      padding: 40px 20px;
      text-align: center;
      font-family: Arial, sans-serif;
      width:1355px;
      margin-left:-200px;
    }


    .footer a {
      color: #fff;
      text-decoration: none;
    }

    .footer a:hover {
      text-decoration: underline;
    }

    .footer .about-us {
      margin-bottom: 20px;
    }

    .footer .contact-info {
      margin-bottom: 20px;
    }

    .footer .map-container {
      display: flex;
      justify-content: center;
    }

    .footer .map {
      width: 300px;
      height: 300px;
    }

    .footer .social-icons {
      margin-top: 20px;
    }

    .footer .social-icons a {
      display: inline-block;
      margin-right: 10px;
      color: #fff;
      font-size: 18px;
    }

    .footer .social-icons a:hover {
      color: #ccc;
    }
    .about-us img{
        height:100px;
        width:100px;
        background:skyblue;
    }
    .map-container{
      margin-right:-10px;
    }
    </style>
</head>
<body>
<hr style="width:1455px; margin-left:-300px; ">

<footer class="footer">
  <div class="container">
    <div class="about-us">
      <h4>About Us</h4>
      <p>THIRDEYE</p>
      <p>Prescription Frames</p>
      <p>Sunglasses</p>
      <img src="mainlogo.gif">
    </div>
    <div class="map-container" style="margin-left:40px;">
      <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d313.60288736685953!2d85.31471564248388!3d27.72975133796723!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19219e5c6a35%3A0xf7b2cbfc484defd7!2sThird%20eye%20I%20care%20clinic!5e0!3m2!1sen!2snp!4v1688026464065!5m2!1sen!2snp" width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
    <div class="contact-info" style="margin-left:100px;">
      <h4>Contact Us</h4>
      <p>Location:Kathmandu, Nepal</p>
      <p>Email: thirdeyeshop@gmail.com</p>
      <p>Phone: +977 0111111</p>
    </div>
   
   
  </div>
  <div class="social-icons" style="margin-left:00px;">
      <a href="#" target="_blank">Facebook</a>
      <a href="#" target="_blank">Twitter</a>
      <a href="#" target="_blank">Instagram</a>
    </div>
    <p style="margin-top:-10px">@All Rights Reserved With THIRDEYE EyeWears</p>
</footer>

</body>
</html>
