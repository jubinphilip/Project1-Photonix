<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Basic styling for the navigation bar */
        body
        {
            background-image: url(Images/);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-size: 100% 100%;
        }
       
    </style>
</head>
<body>
    <?php include 'adminnav.html' ?>
<form action="addcategory.php" method="POST">
    <center>
    <h1>Add Category</h1>
    <label>Category Name</label>
    <input type="text" name="catname"><br><br>
    <input type="submit" name="submit" value="Add">
    </center>
</form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
    include 'connection.php';
    $cat_name = $_POST['catname'];
    $query="Insert into category (Catname) values ('$cat_name')";
    $res=mysqli_query($con,$query) or die ("Query Failed");
    if($res)
    {
     echo '<script>alert("New Category Added")</script>'; 
    }
}
?>