<?php
   include 'Finalheader.php';
   ?>
   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Locator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-wrap: no-wrap;
            justify-content: space-between;
        }

        .card {
            width: calc(33.33% -);
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 10px;
            
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card img {
            max-width: 100%;
            border-radius: 10px;
        }

        .card h2 {
            margin-top: 10px;
            font-size: 18px;
        }

        .card p {
            text-align: center;
            margin: 10px 0;
            font-size: 14px;
        }

        .card .location {
            font-weight: bold;
        }

        .card .contact {
            color: #555;
        }
        .card:not(:last-child) {
    margin-right: 200px;
}
header {
    background-color:skyblue;
    color: white;
    text-align: center;
    padding: 20px 0;
}

h1 {
    margin: 0;
    
}

main {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

.faq {
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 10px;
    background-color:white;
}

h2.question {
    margin-top: 0;
    color:skyblue;
    cursor: pointer; /* Add cursor pointer for questions */
}

p.answer {
    color:skyblue;
    display: none; /* Hide answers by default */
}

footer {
    text-align: center;
    padding: 10px;
    background-color: #333;
    color: white;
}
    </style>
</head>
<body>
    <div class="container">
 
        <a href="https://goo.gl/maps/W8nDeX4Mgpf2uPty5" >

        <div class="card">
            <img src="Store2.jpg" alt="Branch 2">
            <h2>Branch 2</h2>
            <p class="location">Location: Samakhusi</p>
             
        </div>
    </a>
    <a href="https://goo.gl/maps/W8nDeX4Mgpf2uPty5" >
        <div class="card">
            <img src="Store1.jpg" alt="Branch 1">
            <h2>Branch 1</h2>
            <p class="location">Location:Baneshor</p>
            <h2>Opening Soon</h2>
           
        </div>
</a>
        <a href="https://goo.gl/maps/6T3gMk6vCPDSBX7LA" ><div class="card">
            <img src="Store3.jpg" alt="Branch 3">
            <h2>Branch 3</h2>
            <p class="location">Location:Tripureshor</p>
           
        </div> </a><br>

</div>
   <div class="faqqq">
   <header>
        <h1>Frequently Asked Questions</h1>
    </header>
    <main>
        <section class="faq">
            <h2 class="question">* 1. How do I choose the right frame size for my eyeglasses? </h2>
            <p class="answer">Answer 1: Selecting the right frame size is essential for comfort and style. You can find your frame size by checking the measurements on the inside of your current eyeglasses or by using our virtual try-on tool. Additionally, our customer support team is available to assist you in choosing the perfect frame size based on your face shape and preferences.</p>
        </section>
        <section class="faq">
            <h2 class="question">* 2. Can I order prescription lenses with my eyeglass frames?</h2>
            <p class="answer">Answer 2:Yes, we offer prescription lens options for most of our eyeglass frames. During the ordering process, you can enter your prescription details, including sphere, cylinder, and axis values, as well as pupillary distance (PD). If you need assistance with your prescription or lens selection, our optometrists and customer support team are here to help.</p>
        </section>
        <section class="faq">
            <h2 class="question">* 3. What is the return and exchange policy for eyewear purchases?</h2>
            <p class="answer">Answer 3: We have a hassle-free return and exchange policy. If you are not completely satisfied with your eyewear, you can return them within 30 days for a full refund or exchange. The eyeglasses must be in their original condition with tags and packaging. Please visit our Returns and Exchanges page for more details and instructions on initiating a return.</p>
        </section>
    </main>
    <footer>
        &copy; <?php echo date("Y"); ?> Your Website Name
    </footer>
    <script src="script.js"></script>
   </div>
</body>
</html>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const questions = document.querySelectorAll(".question");

    questions.forEach((question) => {
        question.addEventListener("click", function () {
            const answer = this.nextElementSibling; // Get the next element (answer)

            if (answer.style.display === "block") {
                answer.style.display = "none"; // Hide the answer
            } else {
                answer.style.display = "block"; // Show the answer
            }
        });
    });
});

    </script>