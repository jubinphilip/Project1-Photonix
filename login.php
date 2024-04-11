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
            background-size: 100% 100%;
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
        
    </style>
</head>
<body>
<h1 id="head">PHOTONIX</h1>
    <form action="login.php" method="POST" id="register" >
        <center>
            <div id="box">
                <table>
       <tr><td><input type="text" name="name" placeholder="Name" id="info"></td></tr>
       <tr><td><input type="password" name="pass" placeholder="Password" id="info"></tr></td></table>
       <input type="submit" value="Login" name="submit" id="signin"><br><br>
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
