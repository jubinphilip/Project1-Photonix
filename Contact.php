<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>
    <style>
        body
        {
            background-image: url(Images/12.jpg);
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
        }
        </style>
</head>
<body>
    <form action="Contact.php" method="POST">
    <?php 
    include 'nav.html';
 ?>
    <center>
        <h1>Contact Us</h1>
   <table>
    <tr><td><label for="">Enter your query:</label></td><td><input type="text" name="msg"></td></tr>
   </table>
   <input type="submit" name="submit" value="submit"><br>
   <input type="submit" name="submit1" value="viewreply">
    </center>
    </form>
</body>
<?php
if(isset($_POST['submit']))
{
    session_start();
    if(isset($_SESSION['username']) && isset($_SESSION['userid'])) 
    {
        $username = $_SESSION['username'];
        $userid= $_SESSION['userid'];
    } 
    $msg=$_POST['msg'];
  // echo $userid;
   //echo $username;
   //echo $msg;
   include 'connection.php';
   $query="INSERT INTO contact (C_id,C_name,msg) VALUES ('$userid','$username', '$msg')";
   $res=mysqli_query($con,$query) or die("Insert Query Failed");
   if($res)
   {
   echo "<script>alert('Query Submitted')</script>";
   }
}
if(isset($_POST['submit1']))
{
    session_start();
    if(isset($_SESSION['username']) && isset($_SESSION['userid'])) 
    {
        $username = $_SESSION['username'];
        $userid= $_SESSION['userid'];
    } 
  // echo $userid;
   //echo $username;
   //echo $msg;
   include 'connection.php';
   $query="select C_name,msg,reply from contact where C_id=$userid";
   $result=mysqli_query($con,$query) or die("Query Failed");
   echo "<center>";
   echo "<table border=2px>";
        echo "<tr><th>Customer Name</th><th>Query</th><th>Reply</th></tr>";

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['C_name'] . "</td>";
            echo "<td>" . $row['msg'] . "</td>";
            echo "<td>" . $row['reply'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</center>";
}
?>
<html>