<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>stock update</title>
</head>
<body>
    <center>
    <form action="" method="POST">
        <h1>Stock Update</h1>
        <table>
        <tr><td><label>Enter the number of stocks:</label></td><td><input type="number" name="count"></td></tr>
        <tr><td><label>Select the dimenshion:</label></td><td><input type="radio" name="pdimenshion" value="6 x 4"><label>6 x 4</label> <input type="radio" name="pdimenshion" value="6 x 8"><label>6 x 8</label> <input type="radio" name="pdimenshion" value="10 x 8"><label>10 x 8</label><br> <input type="radio" name="pdimenshion" value="12 x 8"><label>12 x 8</label> <input type="radio" name="pdimenshion" value="12 x 10"><label>12 x 10</label><input type="radio" name="pdimenshion" value="15 x 12"><label>15 x 12</label></td></tr>
        <tr><td><label>Enter the Color :</label></td><td><input type="text" name="Color"></td></tr>
        </table>
        <br><input type="submit" name="submit" value="Update">
    </form>
    </center>
</body>
<?php
if(isset($_POST['submit']))
{
    include 'connection.php';
    if (isset($_GET['frame_id'])) {
        $oid = $_GET['frame_id'];
    }
    $stock=$_POST['count'];
    $pdim=$_POST['pdimenshion'];
    $color=$_POST['Color'];
    $query="Update  product set P_Color='$color',P_dim='$pdim',P_Stock='$stock' where P_id=$oid";
    $res=mysqli_query($con,$query);
    if($res)
    {
        echo '<script>"alert(Stock Updated)"</script>';
    }
}
?>
</html>