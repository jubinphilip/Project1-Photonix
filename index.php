<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body
        {
            background-image: url(Images/4.jpeg);
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
             text-align: center;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 100px;
            margin-top: 10px;  
           /* margin-left: 20%; */
           /* background-color: whitesmoke;*/
            padding-left: 200px;
        }
        #about
        {
         /* background-color:whitesmoke;
            opacity: 50%;*/
            width: 650px;
            height: 250px;
           text-align: center;
            color: black;
            font-size: 40px;
            margin-left: 27%;
            margin-top: 100px;
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
        #login
        {
            color: white;
            text-align: center;
            font-size: larger;
            margin-left: 2%;
            margin-top: 130px;
        }
        #signin
        {
            background-color: cornflowerblue;
            color: whitesmoke;
            width: 100px;
            height: 40px;
            font-size: large;
            border-radius:100px;
            font-family: 'Times New Roman', Times, serif;
        }
        #signin:hover
        {
            background-color:darkcyan;
            cursor: pointer;
            color: brown;
        }
        #navbar:hover
        {
            background-color: #ffb3b3;
        }
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 80%;
            text-align: center;
            border: 10px solid pink;
        }
        .myPopup
        {
           
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page</title>
</head>
<body>
    <ul id="menu">
        <li ><a style="text-decoration: none; color:black;"  href="index1.php" id="navbar">Home</a></li>
        <li onclick="openPopup()"><a style="text-decoration: none; color:black;"  href=# id="navbar">Contact us</a></li>
        <li><a style="text-decoration: none; color:black;"  href=about.php id="navbar">About</a></li>
    </ul>
    <div class="popup" id="myPopup" >
        <span onclick="closePopup()" style="float: right; cursor: pointer;">&times;</span>
        <h2>Contact Us</h2>
       <p> email:photonixtdpza@gmail.com</p>
        <p>contact:+919061532907</p>
    </div>

    <script>
        function openPopup() {
            document.getElementById("myPopup").style.display = "block";
        }

        function closePopup() {
            document.getElementById("myPopup").style.display = "none";
        }
    </script>
    <h1 id="head">PHOTONIX</h1>
   <!-- <p id="text">photonixmvpa@privatelimited.com</p>-->
    <div id="about">
    <h2 id="welcome">Welcome</h2>
    <p>
        Welcome to Photonix! We are a company that specializes in creating the most beautiful and unique photo frames for you. 
    </p>
    </div>
    <div id="login">
    <p>Already a user</p>
    <button id="signin"><a style="text-decoration: none;"  href="login.php" id="signin">Sign in</a></button><br>
    <p>New user</p>
    <button id="signin"><a style="text-decoration: none;" href="register.php" id="signin">Register</a></button>
    </div>
</body>
</html>
