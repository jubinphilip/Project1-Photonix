<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #head
        {
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 60px;
            margin-top: 10px;  
           color:   #e180ff;

        }
        body
        {
           background-image: url(Images/5.jpeg);
           background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
        #info
        {
            width: 200px;
            height: 25px;
            margin-top: 10px;
        }
       #register
       {
            margin-top: 30px;
       }
       #signin
       {
        margin-top: 20px;
        background-color: #ac00e6;
            color: whitesmoke;
            width: 100px;
             height: 40px;
            font-size: large;
            border-radius: 25px;
            font-family: 'Times New Roman', Times, serif;
       }
       #signin:hover
        {
            background-color:#edb3ff;
            cursor: pointer;
            color: brown;
        }
    </style>
    <title>register</title>
</head>
<body>
<h1 id="head">PHOTONIX</h1>
    <form action="register.php" method="POST">
        <center>
            <h2>New user Then Register here...!</h2>
            <div id="register">
                <table>
    <tr><td><input type="text" name="name" placeholder="Name" id="info" required></td></tr>
    <tr><td><input type="text" name="adrs" placeholder="Address" id="info" required></td></tr>
    <tr><td><input type="text" name="ph" placeholder="Contact Number" id="info" pattern="[6-9]{1}[0-9]{9}" title="Enter a valid Indian Mobile Number having 10 digits [start with 6-9]" required></td></tr>
    <tr><td><input type="password" name="pswd" placeholder="Password" id="info"required></td></tr>
    <tr><td><input type="password" name="cpswd" placeholder="Confirm Password" id="info" required></td></tr> </table>
     <input type="submit" name="submit" value="Register" id="signin" id="info"><br>
     <button id="signin"><a href="login.php" style="text-decoration: none; " id="signin">Login</a></button>
     </div>
     </center>
    </form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
    
    $Cname=$_POST['name'];
    $Cadrs=$_POST['adrs'];
    $Cph=$_POST['ph'];
    $Cpswd=$_POST['pswd'];
    $Ccpswd=$_POST['cpswd'];
   // echo $name.$adrs.$ph.$pswd.$cpswd;
   if($Cpswd!=$Ccpswd)
   {
    echo '<script>alert("Password does not Match")</script>';    
   }
   else
   {
   include 'connection.php';
   /*if($con)
   {
    echo "Success";
   }*/
   $query="insert into Customer (Cname,Cadrs,Cphone,Cpswd,Ccpswd) values ('$Cname','$Cadrs','$Cph','$Cpswd','$Ccpswd')";
   $res=mysqli_query($con,$query)or die("Query Failed");
   if($res)
   {
    echo '<script>alert("Registered Successfully")</script>'; 
   }
}
}
?>