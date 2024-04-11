<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        body
        {
            background-image: linear-gradient(orange,yellow);
        }
        tr,td{
            padding-top: 30px;
        }
        </style>
</head>
<body>
    <?php include 'adminnav.html' ?>
    <form action="addproduct.php" method="POST" enctype="multipart/form-data">
        <center>
            <h1>Add Product</h1>
            <label>Select the Category</label><br>
            <select name="category"> 
                <?php
                include 'connection.php';
                $query = "SELECT Catid, Catname FROM Category"; 
                $res = mysqli_query($con, $query) or die("Query Failed");
                while ($row = mysqli_fetch_assoc($res)) 
                { 
                    echo "<option value='" . $row['Catid'] . "'>" . $row['Catname'] . "</option>";
                }
                ?>
            </select>
            <table >
         <tr><td><label>Product Name:</label></td>
         <td><input type="text" name="pname"></td></tr>
         <tr><td><label>Product Description:</label></td>
         <td><input type="text" name="pdes"></td></tr>
         <tr><td><label>Product Color:</label></td>
         <td><input type="text" name="pcolor"></td></tr>
         <tr><td><label>Product Image:</label></td>
         <td><input type="file" name="pimage"></td></tr>
         <tr><td><label>Select Dimenshion:</label></td>
         <td><input type="radio" name="pdimenshion" value="6 x 4"><label>6 x 4</label> <input type="radio" name="pdimenshion" value="6 x 8"><label>6 x 8</label> <input type="radio" name="pdimenshion" value="10 x 8"><label>10 x 8</label><br> <input type="radio" name="pdimenshion" value="12 x 8"><label>12 x 8</label> <input type="radio" name="pdimenshion" value="12 x 10"><label>12 x 10</label><input type="radio" name="pdimenshion" value="15 x 12"><label>15 x 12</label></td></tr>
         <tr><td><label>Product Price:</label></td>
         <td><input type="text" name="pprice"></td></tr>
         <tr><td><label>Product Stock:</label></td>
         <td><input type="text" name="pstock"></td></tr>
            </table>
            <?php
               // $sql='select P_image from Product';
               // $res=mysqli_query($con,$sql);
                //while($row=mysqli_fetch_assoc($res))
                //{
            ?>
             <!--  <img src="<?php// echo $row['P_image']?>" width="300px" height="300px">-->
            <?php
                //}
            ?>
        <br><input type="submit" name="submit" value="Add Product">
        <input type="submit" onclick="clearForm()"  value="Clear"> 
        </center>
    </form>
</body>
</html>
<?php
if (isset($_POST["submit"])) 
{
    //$catid=$_GET['cat'];
    $Pname=$_POST['pname'];
    $catid = $_POST['category'];
    $Pdes=$_POST['pdes'];
    $Pcolor=$_POST['pcolor'];
    $Pimg=$_FILES['pimage']['name'];
    $Pimg_tmp=$_FILES['pimage']['tmp_name'];    // echo "<pre>".print_r($_FILES['pimage'])."</pre>";this codes displays the inormation about the image its location its size etc.. 
    $Pdim=$_POST['pdimenshion'];
    $Pprice=$_POST['pprice'];
    $Pstock=$_POST['pstock'];
    $query="INSERT INTO product (P_name,cat_id,P_des,P_color,P_image,P_dim,P_price,P_stock) VALUES ('$Pname','$catid','$Pdes','$Pcolor','$Pimg','$Pdim','$Pprice','$Pstock')";
    $res=mysqli_query($con,$query) or die("Query Failed");
    if($res)
    {
        echo '<script>alert("Item Added")</script>';
       // move_uploaded_file($Pimg_tmp,$Pimg);
    }
}
?>
<script>
function clearForm() 
{
    document.getElementById("planeFrame").reset();
}

</script>
    
    
