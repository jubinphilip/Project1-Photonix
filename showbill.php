<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        div {
            width: 500px;
            height: 700px;
            border: 2px black;
            border-style: double;
            text-align: center;
        }

        #address {
            padding-left: 15px;
            text-align: left;
        }

        #em {
            margin-top: -25px;
            font-size: 12px;
        }

        table {
            margin: 20px auto; 
            border-collapse: collapse;
            width: 80%; 
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }
        #t1
        {
            background-color:#f4a63c;
        }
        #price
        {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    <div>
        <center>
            <h1>PHOTONIX</h1>
            <p id="em">photonixtdpza@gmail.com</p>
        </center>
           
        <p id="address">
            Photonix, AdamStar Complex,floor no:3<br>
            Thodupuzha <br>686672<br>
            +919061532907
        </p>
        
        <?php
        include 'connection.php';
        if (isset($_GET['oid'])) {
            $oid = $_GET['oid'];
        }
        $sql = "SELECT * FROM bill where O_id=$oid";
        $res = mysqli_query($con, $sql);
        echo "<table border=2px>";
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr id='t1'><td>Ordered Date</td><td>".$row['Date']."</td></tr>";
            echo "<tr><td>Payment id</td><td>".$row['pay_id']."</td></tr>";
            echo "<tr id='t1'><td>Invoice Number</td><td>".$row['invoice_no']."</td></tr>";
            echo "<tr><td>Order ID</td><td>".$row['O_id']."</td></tr>";
            echo "<tr id='t1'><td>Product ID</td><td>".$row['P_id']."</td></tr>";
            echo "<tr><td>Customer Name</td><td>".$row['C_name']."</td></tr>";
            echo "<tr id='t1'><td>Phone</td><td>".$row['phone']."</td></tr>";
            echo "<tr ><td>Quantity</td><td>".$row['quantity']."</td></tr>";
            $q=$row['quantity'];
            echo "<tr id='t1'><td>Address</td><td>".$row['Address']."</td></tr>";
            $price= $row['Price'];
        }
        echo"<table>";
        echo "GST:2%<br>";
        echo "price=$price <br>";
        $gst = $price * 0.02;
        $tmp=$price;
        $price*=$q;
        $price+=$gst;
        echo "Total Payable Amount=$q x $tmp = $price";
        ?>
          <p>Thankyou for Shopping</p>
      
    </div>
</body>
</html>
