<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
        body
        {
            background-image: url(Images/1.jpeg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        
        #box
        {
            /*border: 2px solid;*/
            width: 500px;
            height: 300px;
        }
        #info
        {
            width: 200px;
            height: 25px;
        }
        table
        {
            margin-top: 40px;
        }
        #head
        {
            color:whitesmoke;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 70px;
            margin-top: 10px;  
            color:#99b3e6;
        }
        #register
       {
            font-size: 30px;
       }
       #signin
       {
        margin-top: 30px;
        background-color: bisque;
        width: 100px;
        height: 30px;
        border-radius: 100px;
       }
       #signin:hover
        {
            background-color:goldenrod;
            cursor: pointer;
            color: brown;
        }
        #signin
        {
            position: relative;
            transition: all 0.5s ease; /* Add smooth transition */
        }
        @keyframes flicker {
            0%, 100% {
                opacity: 0.8;
                transform: translateY(0) scale(1);
                box-shadow: 0 0 10px 5px rgba(255, 165, 0, 0.5);
            }
            25%, 75% {
                opacity: 1;
                transform: translateY(-5px) scale(1.1);
                box-shadow: 0 0 20px 10px rgba(255, 165, 0, 0.7);
            }
            50% {
                opacity: 0.9;
                transform: translateY(0) scale(1);
                box-shadow: 0 0 15px 8px rgba(255, 165, 0, 0.6);
            }
        }

        .fire {
            width: 100px;
            height: 200px;
            background: linear-gradient(to bottom, #ffeb3b, #ff9800);
            position: relative;
            margin: 50px auto;
            border-radius: 10px;
            animation: flicker 1s infinite;
        }

        .flame {
            width: 50px;
            height: 50px;
            background: linear-gradient(to bottom, #ffeb3b, #ff9800);
            position: absolute;
            bottom: 0;
            left: 25px;
            border-radius: 50%;
            transform-origin: 50% 100%;
            animation: flicker 1s infinite;
        }
    </style>
    
</head>
<body>
<h1 id="head">PHOTONIX</h1>
    <form action="login.php" method="POST" id="register" >
    <div class="fire">
        <div class="flame"></div>
    </div>
        <center>
            <div id="box">
                <table>
       <tr><td><input type="text" name="name" placeholder="Name" id="info"></td></tr>
       <tr><td><input type="password" name="pass" placeholder="Password" id="info"></tr></td></table>
       <button  type="submit"  name="submit" id="signin" onmouseover="moveButton()">Login</button><br><br>
       <script>
    function moveButton() {
        var button = document.getElementById("signin");

        // Generate random coordinates for the button
        var newX = Math.floor(Math.random() * (window.innerWidth - button.offsetWidth));
        var newY = Math.floor(Math.random() * (window.innerHeight - button.offsetHeight));

        // Set the new coordinates
        button.style.left = newX + "px";
        button.style.top = newY + "px";
    }
</script>
       </div>
    </form>
</body>
<?php
session_start(); // Start the session at the beginning of the script

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $flag = 0;
    $pswd = $_POST['pass'];

    include 'connection.php'; // Ensure this file connects to your database

    $query = "SELECT Cid,Cname, Cpswd FROM Customer";
    $res = mysqli_query($con, $query) or die("Query failed");
    if ($name == "photonix" && $pswd == "photonix@123") {
        header("Location: adminhome.php");
        exit(0);
    }
    else
    {
    while ($row = mysqli_fetch_array($res)) {
        $usrid = $row['Cid'];
        $usrname = $row['Cname'];
        $paswrd = $row['Cpswd'];
         if ($name == $usrname && $pswd == $paswrd) {
            $_SESSION['username'] = $usrname; // Set username in session
            $_SESSION['userid'] = $usrid;
            header("Location: loginhome.php");
            exit(0);
        } else {
            $flag = 1;
        }
    }

    if ($flag == 1) {
        echo '<script>alert("Login Unsuccessful")</script>';
    }
}
}
?>
</html>
