<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body
        {
            background-image: url(Images/2.jpeg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
        #text
        {
            text-align: center;
        }
        #head
        {
            color: #004d4d;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size:70px;
            margin-top: 10px;  
           /* margin-left: 20%; */
           /* background-color: whitesmoke;*/
           
        }
        #about
        {
         /* background-color:whitesmoke;
            opacity: 50%;*/
            width: 1250px;
            height: 250px;
           text-align: center;
            color: black;
            font-size: 40px;
            margin-left: 10%;
        }
        #menu
        {
            margin: 0;
            padding: 0;
            list-style: none;
            box-sizing: border-box;
            font-family:'Times New Roman', Times, serif;
            font-size: larger;
            color: black;
            margin-top: -18px;
        }
        ul
        {
            float: right;
            margin-right: 20px;
        }
        li
        {
            text-decoration: none;
            display: inline-block;
            line-height: 80px;
            margin: 0 5px;
            font-weight: bolder;
        }
        #navbar:hover
        {
            background-color: yellow;
        }
        h3
        {
            margin-top: -45px;
            margin-left: 100px;
        }
        #btnproduct
        {
            width: 120px;
            height: 40px;
            font-size: 20px;
            background-color: indigo;
            border-radius: 30px;
        }
        #btnproduct:hover
        {
            background-color: blueviolet;
            cursor: pointer;
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
         img
         {
            width: 320px;
            height: 420px;
            margin-right: 30px;
            margin-left: 20px;
         }
         h2
         {
            background-color: white;
            font-size: 50px;
         }
         
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page</title>
</head>
<body>
    <form action="loginhome.php" method="POST">
    <ul id="menu">
        <li ><a style="text-decoration: none; color:black;"  href="loginhome.php" id="navbar">Home</a></li>
        <li ><a style="text-decoration: none; color:black;"  href=Contact.php id="navbar">Contact us</a></li>
        <li ><a style="text-decoration: none; color:black;"  href=about.php id="navbar">About</a></li>
        <li ><a style="text-decoration: none; color:black;"  href="myorders.php" id="navbar">My Orders</a></li>
        <li ><a style="text-decoration: none; color:black;"  href="logout.php" id="navbar">Logout</a></li>
    </ul>
    <h1 id="head">PHOTONIX</h1>
   <!-- <p id="text">photonixmvpa@privatelimited.com</p>-->
    
    <h3>Welcome <?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['userid'])) 
{
    $username = $_SESSION['username'];
    $userid= $_SESSION['userid'];
    echo $username;
    //echo $userid;
} 
?>  </h3>
<center><h2>Our Works</h2></center>

<img src="Images/Screenshot_20231204-222643_Photos~2-01.jpeg">
<img src="Images/Screenshot_20231204-222651_Photos~2-01.jpeg">
<img src="Images/WhatsApp Image 2023-12-13 at 8.17.21 PM.jpeg">
<img src="Images/WhatsApp Image 2023-12-13 at 8.42.22 PM.jpeg">
<div id="about">
<button id="btnproduct"><a href="products.php?Cid=<?php echo $userid; ?>" style="text-decoration: none;color: white;">Products</a></button>
    </div>
    
    </form>
</body>

</html>

