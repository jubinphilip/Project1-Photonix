
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
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
    <center>
        <ul>
            <li><a href="adminhome.php">Home</a></li>
            <li><a href="addcategory.php">Add Category</a></li>
            <li><a href="addproduct.php">Add Product</a></li>
            <li><a href="product.php">View Product</a></li>
            <li><a href="viewfeedback.php">View Feedback</a></li>
            <li><a href="report.php">Report</a></li>
            <li><a href="customerorders.php">View Orders</a></li>
            <li><a href="viewcustomers.php">View Customers</a></li>
            <li><a href="logout.php">Log out</a></li>
        </ul>
    </center>
    <center>
        <h2>Orders</h2>
        <?php
        include 'connection.php';

        if (isset($_GET['oid']) && isset($_GET['action'])) {
            $oid = $_GET['oid'];
            $action = $_GET['action'];

            if ($action === 'confirm') {
                // Update status to 'Accepted'
                $query1="select P_id,quantity from orders where O_id=$oid";
                $res1=mysqli_query($con,$query1);
                while($row1=mysqli_fetch_assoc($res1))
                {
                    $pid=$row1['P_id'];
                    $quantity=$row1['quantity'];
                }
                $query2 = "Select P_Stock from product where P_id='$pid'";
                $res2 = mysqli_query($con, $query2);
        
                while($row1 = mysqli_fetch_assoc($res2))
                {
                    $stock=$row1['P_Stock'];
                    $stock=$stock-$quantity;
                    //echo $stock;
                }
                $query2="UPDATE product SET P_Stock='$stock' WHERE P_id=$pid";
                mysqli_query($con,$query2);
                $query = "UPDATE orders SET Status='Accepted' WHERE O_id=$oid";
                $res = mysqli_query($con, $query);

                if ($res) {
                    echo "Order $oid confirmed successfully.";
                } else {
                    echo "Error updating order status: " . mysqli_error($con);
                }
            } elseif ($action === 'decline') {
                // Update status to 'Declined'
                $query = "UPDATE orders SET Status='Declined' WHERE O_id=$oid";
                $res = mysqli_query($con, $query);

                if ($res) {
                    echo "Order $oid declined successfully.";
                } else {
                    echo "Error updating order status: " . mysqli_error($con);
                }
            }
        }

        $query = 'SELECT * FROM orders';
        $result = mysqli_query($con, $query) or die("Query Failed");
        echo "<table border=2px>";
        echo "<tr><th>Order id</th><th>Customer id</th><th>Customer Name</th><th>Product id</th><th>Image</th><th>Price</th><th>Quantity</th><th>Description</th><th>Address</th><th>Status</th><th>Payment Status</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['O_id'] . "</td>";
            echo "<td>" . $row['C_id'] . "</td>";

            $query1 = "SELECT Cname FROM customer WHERE Cid = " . $row['C_id'];
            $result1 = mysqli_query($con, $query1);
            $customerName = mysqli_fetch_assoc($result1)['Cname'];

            echo "<td>".$customerName."</td>";
            echo "<td>" . $row['P_id'] . "</td>";
             $imgPath = $row['U_image'];
            echo "<td><img src='UserImages/$imgPath' alt='Uploaded Image' ></td>"; 
           //echo "<td><img src=\"UserImages/" . htmlspecialchars($row['U_image']) . "\" alt=\"" . htmlspecialchars($row['U_des']) . "\"></td>";
            echo "<td>" . $row['P_price'] . "</td>";
            echo "<td>" . $row['quantity'] . "</td>";
            echo "<td>" . $row['U_des'] . "</td>";
            echo "<td>" . $row['Address'] . "</td>";
            echo "<td>" . $row['Status'] . "</td>";
            echo "<td>" .$row['Payment'] . "</td>";
            echo "<td><button><a href='customerorders.php?oid={$row['O_id']}&action=confirm' style='text-decoration: none;'>Confirm</button>";
            echo "<br><button><a href='customerorders.php?oid={$row['O_id']}&action=decline' style='text-decoration: none;'>Decline</button></td>";
            echo "</tr>";
        }
        ?>
    </center>
</body>
</html>
