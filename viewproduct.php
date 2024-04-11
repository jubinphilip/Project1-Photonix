<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <style>
        body
       {
        background-image: linear-gradient(orange,yellow);
       }
        img
        {
            width: 400px;
            height: 500px;
        }
        #buynow
        {
            width: 100px;
            height: 40px;
            border-radius: 30px;
            background-color: brown;
            color: aliceblue;
            margin-top: 10px;
            margin-right: 10px;

        }
        #buynow:hover
        {
            background-color: orange;
        }
        a
        {
            text-decoration: none;
            color: white;
        }
        </style>
</head>
<body>
</body>
<?php
include 'connection.php';

if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];

    // Construct the SQL query using a parameterized query to prevent SQL injection
    $query = "SELECT * FROM product WHERE P_id = '$pid'";

    // Execute the query
    $result = mysqli_query($con, $query);

    // Check if the query was successful
    // Fetch the data as an associative array
    $product = mysqli_fetch_assoc($result);

    // Check if the product exists
    if ($product) {
        // Display the product details
        echo "<center>";
        echo "<h2>" . "Product Name: " . $product['P_name'] . "</h2><br>"; ?>
        <img class="product-img" src="./Frames/<?php echo $product['P_image']; ?>" alt="<?php echo $product['P_name']; ?>"><br><br>
        <?php
        echo "Product Price: " . $product['P_Price'] . "<br>";
        echo "Product Description: " . $product['P_des'] . "<br>";
        echo "Dimension: " . $product['P_dim'] . "<br>"; 
        echo "Stock: " . $product['P_Stock'] . "<br>"; ?>
        <button id='buynow'><a href='buynow.php?Pid=<?php echo $pid; ?>'>Buy Now</a></button>
        </center>;
    <?php
    // Add other product details as needed
    } else {
        echo "Product not found.";
    }
} else {
    echo "Error in the query: " . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>

</html>
