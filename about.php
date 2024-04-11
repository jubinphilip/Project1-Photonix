<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <style>
        #imgmain
        {
            width: 100%;
            height: 400px;
        }
        #img1
        {
            width:600px ;
            height: 600px;
        }
        #dimg1
        {
            margin-left: -700px;
            margin-top: 100px;
            width: 40%;
        }
        #dtext
        {
            width: 40%;
            height: 600px;
            margin-top: -600px;
            margin-left: 50%;
        }
        h1
        {
            font-size: 70px;
        }
        h3
        {
            font-size: 50px;
        }
        #mv
        {
            font-size: 25px;
        }
        #dtext1
        {
            margin-left: -700px;
            margin-top: 100px;
            width: 40%;
        }
        #img2
        {
            width:600px ;
            height: 600px;
        }
        #dimg2
        {
            margin-left:700px ;
            margin-top: -450px;
            width: 40%;
        }
        footer
        {
            background-color: yellow;
            height: 150px;
        }
        #icon
        {
            width:30px;
            height: 30px;
            float: right;
            margin-right: 25px; 
            margin-top: -20px;
         }
         #email
         {
            padding-left: 30px;
            padding-top: 30px;
         }
         #ri
         {
            padding-left: 30px;
         }
         #m
         {
            float: right;
            margin-top: -50px;
            margin-right: 60px;
            font-size: large;
         }
        </style>
</head>
<body>
<?php include 'nav.html' ?>
    <img src="Images/11.jpg" id="imgmain">
    <center>
        <h1>About Us</h1>
        <div id="dimg1">
            <img src="Images/8.jpg" alt="" id="img1">
        </div>
        <div id="dtext">
            <h3>Our Mission</h3>
            <p id="mv">We endeavour to achieve our vision by following international standards of quality, right from selection till after sales service. For that we have our Inventory and we make frames of high qualities of diffrent varieties. On the other hand we import fine Raw Materials for making the Product available at their best.
</p>
        </div>
        <div id="dtext1">
            <h3>Our Vision</h3>
            <p id="mv">
            At Photonix, our vision is to redefine the art of preserving memories. We aspire to create a world where each photo frame is a conduit of emotion, seamlessly blending aesthetics and sentimentality. Beyond being an online marketplace, we envision our platform as a curator of joy, offering a diverse range of frames that cater to individual tastes. With a commitment to innovation and quality, we aim to transform the act of framing into an immersive experience. Our goal is not just to sell products but to become a trusted companion, helping people weave the tapestry of their lives with moments that endure.
            </p>
        </div>
        <div id="dimg2">
            <img src="Images/9.jpeg" id="img2">
        </div>
    </center>
    <footer>
    <p id="email">photonixtdpza@gmail.com</p>
    <p id="ri">© 2023,Photonix. All Rights Reserved.</p>
    <p id="m">Follow Us On</p>
    <a href="https://www.instagram.com/moto_tone/"><img src="icons/insta.png" id="icon"></a>
    <a href="https://web.whatsapp.com/"><img src="icons/wa.JPG.png" id="icon"></a>
    <a href="https://www.facebook.com/ridhin.reji"><img src="icons/fb.JPG.png" id="icon"></a>
    </footer>
</body>
</html>