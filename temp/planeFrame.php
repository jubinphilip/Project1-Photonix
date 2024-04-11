<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add plane Frame</title>
</head>
<body>
    <center>
        <form action="planeFrame.php" method="POST" enctype="multipart/form-data" id="planeFrame">
            <p>Enter the frame details</p>
            <label>Frame Name</label>
            <input type="text" name="plfname"><br><br>
            <label>Frame Description</label>
            <input type="text" name="plfdes"><br><br>
            <label>Thickness</label>
            <input type="text" name="plfthick"><br><br>
            <label>Frame Color</label>
            <input type="text" name="plfcolor"><br><br>
            <label>Frame Image</label>
            <input type="file" name="plfimage"><br><br>
            <label>Price</label>
            <input type="text" name="plfprice"><br><br>
            <input type="submit" name="submit" value="Add Frame"><br>
            <input type="submit" onclick="clearForm()"  value="Clear">
        </form>
    </center>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
    $Pname=$_POST['plfname'];
    $Pdesc=$_POST['plfdes'];
    $Pprice=$_POST['plfprice'];
    $Pcolor=$_POST['plfcolor'];
    $Pthickness=$_POST['plfthick'];
    $Pimage=$_FILES['plfimage']['name'];
    // echo "<pre>".print_r($_FILES['plfimage'])."</pre>";this codes displays the inormation about the image its location its size etc.. 
    $Pimage_tmp=$_FILES['plfimage']['tmp_name'];
    $con=mysqli_connect("localhost", "root", "", "jubindb")or die ("Not Connected");
    $query="INSERT INTO planeframe (Pname,Pdesc,Pprice,Pcolor,Pthickness,Pimage	)VALUES('$Pname','$Pdesc','$Pprice','$Pcolor','$Pthickness','$Pimage')";
    $res=mysqli_query($con,$query) or die("Query Failed");
    if($res)
    {
        move_uploaded_file($Pimage_tmp,$Pimage);
    }
}
?>
<script>
    function clearForm() 
{
    document.getElementById("planeFrame").reset();
}

</script>