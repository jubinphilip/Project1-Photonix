<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <style>
        label
        {
            font-size: large;
            color: whitesmoke;
        }
        div
        {
            background-color: black;
            width: 500px;
            height:200px;
        }
        table
        {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <center>
        <h1>Payment</h1>
        <form action="" method="POST">
        <div>
            <table>
                <tr><td><label>UPI</label></td><td><input type="radio" name="pay" value="UPI"></td></tr>
                <tr><td><label>Wallet/Postpaid</label></td><td><input type="radio" name="pay" value="Wallet/Postpaid"></td></tr>
                <tr><td><label>Credit/Debit/ATM Card</label></td><td><input type="radio" name="pay" value="Card"></td></tr>
                <tr><td><label>Net Banking</label></td><td><input type="radio" name="pay" value="Net Banking"></td></tr>
                <tr><td><label>Cash on Delivery</label></td><td><input type="radio" name="pay" value="COD"></td></tr>
            </table>
            <input type="submit" name="submit" value="Pay">
    </div>
           
        </form>
    </center>
</body>
<?php
      if (isset($_GET['orderId'])) 
      {
              $oid = $_GET['orderId'];
      }
        if(isset($_POST['submit']))
        {
        //echo "Hello";
        $pmethod=$_POST['pay'];
       // echo $oid;
        //echo $pmethod;
        include 'connection.php';
        $query="update orders set Payment='$pmethod' where O_id='$oid'";
        $result=mysqli_query($con,$query);
        if($result)
        {
            echo "<script>alert('Payment Done')</script>";
            header("Location:myorders.php");
        }
    }
    ?>
</html>