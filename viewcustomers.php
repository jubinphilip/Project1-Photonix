<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Information</title>
    <style>
        body
        {
            background-image: url(Images/derick-mckinney-oARTWhz1ACc-unsplash.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
        h1{
            color: whitesmoke;
        }
        
        th
        {
            background-color: orangered;
            color: whitesmoke;
        }
        table {
            background-color: whitesmoke;
            border-collapse: collapse;
            width: 50%;
            margin: 0 auto; /* Center the table */
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        .product-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            width: 300px; /* Fixed width for each card */
            display: inline-block;
            overflow: hidden; /* Hide overflow to keep images within the card */
        }
        .product-img {
            width: 100%; /* Take the full width of the container */
            height: auto; /* Maintain the original image ratio */
            object-fit: contain; /* Contain the image within the container */
            border-radius: 5px; /* Add border radius to images */
        }
    </style>
</head>
<body>
<?php include 'adminnav.html' ?>
    <center>
    <h1>Customer Information</h1>
        <?php
        include 'connection.php';
        $query = "SELECT Cid, Cname, Cadrs, Cphone FROM Customer";
        $res = mysqli_query($con, $query) or die("Query Failed");

        echo "<table>";
        echo "<tr><th>Customer ID</th><th>Name</th><th>Address</th><th>Phone</th></tr>";

        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>" . $row['Cid'] . "</td>";
            echo "<td>" . $row['Cname'] . "</td>";
            echo "<td>" . $row['Cadrs'] . "</td>";
            echo "<td>" . $row['Cphone'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";

        // Free result set
        mysqli_free_result($res);
        // Close connection
        mysqli_close($con);
        ?>
    </center>
</body>
</html>
