<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view feedback</title>
    <style>
        body
        {
            background-image: linear-gradient(lime);
            background-color: yellow;
        }
    </style>
</head>
<body>
    <center>
        <?php include 'adminnav.html' ?>
    <h1>Feedback</h1>
    <?php
    include 'connection.php';
    $query="select * from feedback";
    $result=mysqli_query($con,$query);
    {
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>id</th>";
        echo "<th>Customer id</th>";
        echo "<th>Customer Name</th>";
        echo "<th>Product id</th>";
        echo "<th>Feedback</th></tr>";
        while($row=mysqli_fetch_assoc($result))
        {
            echo "<tr>";
            echo "<td>".$row['f_id']."</td>";
            echo "<td>".$row['Cid']."</td>";
            echo "<td>".$row['C_name']."</td>";
            echo "<td>".$row['P_id']."</td>";
            echo "<td>".$row['feedback']."</td>";
        }
    }
    ?>
    </center>
</body>
</html>