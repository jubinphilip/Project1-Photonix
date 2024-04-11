<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Now</title>
</head>
<body>
    <form action="buynow.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="pid" value="<?php echo isset($_GET['Pid']) ? $_GET['Pid'] : ''; ?>">
        <center>
            <table>
                <tr><td>Insert Image</td>
                <td><input type="file" name="uimage"></td></tr>
                <tr><td>Insert Text</td>
                <td><input type="text" name="udes"></td></tr>
                <tr><td>Insert the delivery Address</td>
                <td><input type="text" name="uadrs"></td></tr>
                <tr><td>Quantity</td>
                <td><input type="number" name="quantity"></td></tr>
            </table>
            <input type="submit" value="Pay" name="submit">
        </center>
    </form>

    <?php
    if(isset($_POST['submit']))
    {
        include 'connection.php';

        session_start();
        if(isset($_SESSION['userid'])) 
        {
            $userid = $_SESSION['userid'];
            $username = $_SESSION['username'];
        } 
        $query3="Select Cphone from customer where Cid=$userid ";
        $res3=mysqli_query($con,$query3);
        while($row3 = mysqli_fetch_assoc($res3))
        {
            $phone=$row3['Cphone'];
        }
        $pid = isset($_POST['pid']) ? $_POST['pid'] : '';
        $Uimg = $_FILES['uimage']['name'];
        $Uimg_tmp = $_FILES['uimage']['tmp_name'];
        $Udes = $_POST['udes'];
        $uadrs = $_POST['uadrs'];
        $quantity =$_POST['quantity'];
        $query1 = "Select P_Price ,P_Stock from product where P_id='$pid'";
        $res1 = mysqli_query($con, $query1);
        $stock="";
        while($row1 = mysqli_fetch_assoc($res1))
        {
            $price = $row1["P_Price"];
            $stock=$row1["P_Stock"];
        }
        //echo $stock;
        if($stock <= $quantity)
        {
            echo "<script>alert('Enter a quantity less than " . $stock . "')</script>"; 
        }
        else
        {
        $status = "Waiting";
        $target_directory = "UserImages/";
        $target_file = $target_directory . basename($Uimg);
        move_uploaded_file($Uimg_tmp, $target_file);
        $total=$price*$quantity;
        echo $total;
        $query = "INSERT INTO orders (C_id, P_id, U_image, P_Price,quantity, U_des, Address, Status,Total, Date) VALUES ('$userid', '$pid', '$Uimg', '$price','$quantity','$Udes', '$uadrs', '$status','$total', NOW())";
        $res = mysqli_query($con, $query);
        $x=rand(1,100000);
        if($res)
        {
            // Get the last inserted ID (order ID)
            $orderId = mysqli_insert_id($con);
            $query4="select Address from orders where O_id=$orderId";
            $res4=mysqli_query($con,$query4);
            while($row4 = mysqli_fetch_assoc($res4))
            {
                $adr=$row4['Address'];
            }
            $query2="INSERT INTO bill (invoice_no,O_id,P_id,C_name,phone,Price,quantity,Total,Address,Date) VALUES ('$x','$orderId','$pid','$username','$phone','$price','$quantity','$total','$adr',NOW())";
            mysqli_query($con,$query2);
            // Redirect to Payment.php with the order ID in the URL
            header("Location: Payment.php?orderId=" . $orderId);
            exit();
        }
        else
        {
            echo "Error: " . mysqli_error($con); 
        }
        mysqli_close($con); 
    }
}
    ?>
</body>
</html>
