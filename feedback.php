<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>feedback</title>
</head>
<body>
    <?php include 'nav.html' ?>
    <form action="" method="POST">  
        <center>
            <h1>Feedback</h1>
        <label for="feedback">Feedback:</label>
        <textarea name="feedback" ></textarea><br>
        <input type="submit" name="submit" value="submit">
        </center> 
    </form>
</body>
<?php

session_start();
if(isset($_SESSION['userid'])) 
{
    $userid = $_SESSION['userid'];
    $username=$_SESSION['username'];
   /*  echo $userid;
    echo $username; */
} 
if(isset($_POST['submit']))
{
    include 'connection.php';
    if (isset($_GET['P_id'])) 
    {
    $pid = $_GET['P_id'];
    //echo $pid;
    }
    $feedback=$_POST['feedback'];
    //echo $feedback;
    $query="INSERT INTO feedback (Cid,C_name,P_id,feedback) VALUES ('$userid','$username','$pid','$feedback')";
    $res=mysqli_query($con,$query);
    if($res)
    {
        echo "<script>alert('Feedback Submitted')
        </script>";
    }
}
?>
</html>