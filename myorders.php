<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My orders</title>
    <style>
        th {
            background-color: orangered;
            color: whitesmoke;
        }
        
        table {
            background-color: whitesmoke;
            border-collapse: collapse;
            margin: 0 auto; /* Center the table */
        }

        td {
            width: 150px;
            height: 150px;
        }

        img {
            width: 130px;
            height: 130px;
        }   
        a
        {
            text-decoration: none;
        }
        </style>
</head>
<body>
    <center>
<?php
include 'nav.html';
session_start();
    if(isset($_SESSION['userid'])) 
    {
        $userid = $_SESSION['userid'];
        $username= $_SESSION['username'];
       // echo "User ID: " . $userid; 
       // echo $username;
       include 'connection.php';
       $sql = "SELECT  O_id,P_id,Address,Status,P_price,quantity from  orders WHERE C_id = '$userid'";
       $result = mysqli_query($con, $sql);?>
       <table border="2px">
        <tr><th>Order ID</th><th>Product Id</th><th>Product Image</th><th>Address</th><th>Price</th><th>Quantity</th><th>Status</th><th>Bill</th></tr>
       <?php
       echo "<h1>" . $username . "'s Orders" . "</h1>";
       while($row=mysqli_fetch_assoc($result))
       {
            $o=$row['O_id'];
            $x= $row['P_id'];
            $a=$row['Address'];
            $s=$row['Status'];
            $p=$row['P_price'];
            $q=$row['quantity'];
            echo "<tr><td>" .$o."</td>";
            echo "<td>" .$x."</td>";
           /*  echo $x;
            echo $a;
            echo $s; */
            $sql1="Select P_image from product where P_id=$x ";
            $result1=mysqli_query($con,$sql1);
            while($row1=mysqli_fetch_assoc($result1))
            { ?>
              <td><img  src="./Frames/<?php echo htmlspecialchars($row1['P_image']); ?>"></td>
           <?php }
           echo "<td>" .$a."</td>";
           echo "<td>" .$p."</td>";
           echo "<td>" .$q."</td>";
           echo "<td>" .$s."</td>";
           if($s=="Accepted")
           {?>
            <td><button><a href="showbill.php?oid=<?php echo $row['O_id']; ?>">Show Bill</a></button><br><br><button><a href="feedback.php?P_id=<?php echo $row['P_id']; ?>">Send feedback<a></button></tr>
            <?php }
       }
       "</table>";
    } ?>
</center>
</body>
</html>