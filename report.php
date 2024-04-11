<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>report</title>
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

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }
        </style>
</head>
<body>
<?php include 'adminnav.html' ?>
    <center>
        <form action="" method="POST">
        <h1>
            Report
        </h1>
        Enter the start date:<input type="date" name="sdate"><br><br>
        Enter the end date:<input type="date" name="edate"><br><br>
        <input type="submit" name="submit" value="submit"><br>
        </form>
        <?php 
        include 'connection.php';
        if(isset($_POST['submit']))
        {
            $sdate = $_POST['sdate'];
            $edate = $_POST['edate'];
            
            $query = "SELECT C_id, P_id, P_price,quantity,Total,Status, Payment
          FROM orders
          WHERE Status = 'Accepted'
          AND Date BETWEEN '$sdate' AND '$edate'";

        $result = mysqli_query($con, $query) or die("Query Failed");
        echo "The sales report between $sdate and $edate";
        echo "<table border=2px>";
        echo "<tr><th>Customer id</th><th>Customer Name</th><th>Product id</th><th>Product Image</th><th>Price</th><th>Quantity</th><th>Total</th><th>Status</th><th>Payment Status</th></tr>";
        $sum=0;
        $count=0;
        while ($row = mysqli_fetch_assoc($result))
        {
            echo "<tr>";
            echo "<td>" . $row['C_id'] . "</td>";

            $query1 = "SELECT Cname FROM customer WHERE Cid = " . $row['C_id'];
            $result1 = mysqli_query($con, $query1);
            $customerName = mysqli_fetch_assoc($result1)['Cname'];
            echo "<td>".$customerName."</td>";
            echo "<td>" . $row['P_id'] . "</td>";
            $x=$row['P_id'];
            $sql1="Select P_image from product where P_id=$x";
            $result1=mysqli_query($con,$sql1);
            while($row1=mysqli_fetch_assoc($result1))
            { ?>
              <td><img  src="./Frames/<?php echo htmlspecialchars($row1['P_image']); ?>"></td>
           <?php }
            echo "<td>" . $row['P_price'] . "</td>";
           echo "<td>" . $row['quantity'] . "</td>";
           echo "<td>" . $row['Total'] . "</td>";
           $sum=$sum+$row['Total'];
            echo "<td>" . $row['Status'] . "</td>";
            echo "<td>" .$row['Payment'] . "</td>";
            $count=$count+1;
            echo "</tr>";
        }
        echo "<tr><td colspan=5>Number Of Sold Products</td><td colspan=4>".$count."</td></tr>";
        echo "<tr><td colspan=5>Total Amount</td><td colspan=4>".$sum."</td></tr></table>";
     } ?>
    </center>
</body>
</html>

  