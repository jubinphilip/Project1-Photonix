<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        /* Style your product cards here */
        .product-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            margin-left: 30px;
            width: 300px; /* Fixed width for each card */
            display: inline-block;
            overflow: hidden; /* Hide overflow to keep images within the card */
            transition: transform 0.3s ease;
        }
        .product-img {
            width: 100%; /* Take the full width of the container */
            height: auto; /* Maintain the original image ratio */
            object-fit: contain; /* Contain the image within the container */
            border-radius: 5px; /* Add border radius to images */
        }
        button
        {
            width: 147px;
            height: 45px;
            background-color: brown;
            font-size: 20px;
        }
        button:hover
        {
            background-color: blue;
        }
        a
        {
            color: white;
            font-size: medium;
        }
        button a{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif
        }
    </style>
</head>
<body>
    <?php
include 'adminnav.html';
?>
<center>
<h1>Products</h1>
</center>
<main>
    <div class="product-list">
        <?php
        // Establish your database connection
        include 'connection.php';

        // Delete product if requested
        if (isset($_GET['frame_id'])) {
            $frame_id = $_GET['frame_id'];

            // Use prepared statements to prevent SQL injection
            $query = "DELETE FROM product WHERE P_id = ?";
            $stmt = $con->prepare($query);
            $stmt->bind_param("i", $frame_id);
            $stmt->execute();

            
            
            // Redirect back to this page after deletion
            header("Location: product.php");
            exit();
        }

        // Fetch data from the database
        $query = 'SELECT * FROM product where P_Stock > 0'; // Modify the query to match your table name
        $result = mysqli_query($con, $query) or die("Query Failed");

        // Display product information
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="product-card">
                <img class="product-img" src="./Frames/<?php echo ($row['P_image']); ?>" alt="<?php echo ($row['P_name']); ?>">
                <h3><?php echo ($row['P_name']); ?></h3>
                <p>Description: <?php echo ($row['P_des']); ?></p>
                <p>Color: <?php echo ($row['P_Color']); ?></p>
                <p>Dimenshion: <?php echo ($row['P_dim']); ?></p>
                <p>Stock: <?php echo ($row['P_Stock']); ?></p>
                <p>Price: $<?php echo ($row['P_Price']); ?></p>
                <button class="add">
                    <a href="product.php?frame_id=<?php echo $row['P_id']; ?>&action=delete" style="text-decoration: none;">Remove</a>
                </button>
                <button class="add">
                    <a href="stockupdate.php?frame_id=<?php echo $row['P_id']; ?>" style="text-decoration: none;">Update</a>
                </button>
            </div>
        <?php } ?>
    </div>
</main>

</body>
</html>

