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
        .product-card:hover 
        {
            transform: scale(1.2); /* Scales the card on hover */
        }
        .product-img {
            width: 100%; /* Take the full width of the container */
            height: auto; /* Maintain the original image ratio */
            object-fit: contain; /* Contain the image within the container */
            border-radius: 5px; /* Add border radius to images */
        }
     button
        {
    border: 2px solid black;
    padding: 1em;
    width: 80%;
    margin-left: 30px;
    cursor: pointer;
    margin-top: 2em;
    font-weight: bold;
    position: relative;
        }
 button::before
{
    content:"";
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    width: 0;
    background-color: black;
    transition: all .5s;
    margin: 0;
}
 button::after
{
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    width: 0;
    background-color: black;
    transition: all .5s;
}
 button:hover::before
{
    width: 30%;
}
 button:hover::after
{
    width: 30%;
}

    </style>
</head>
<body>
<?php include 'nav.html' ?>
<center>
<h1>Products</h1>
</center>
    <main>
        <div class="product-list">
            <?php
            // Establish your database connection
            include 'connection.php';
            // Fetch data from the database
            $query = 'SELECT * FROM product where P_Stock > 0'; // Modify the query to match your table name
            $result = mysqli_query($con, $query) or die("Query Failed");
            // Display product information
            while ($row = mysqli_fetch_assoc($result)) 
            {
               // $pid=$row['P_id'];
            ?>
            
                <div class="product-card">
                    <img class="product-img" src="./Frames/<?php echo $row['P_image']; ?>" alt="<?php echo $row['P_name']; ?>">
                    <h3><?php echo $row['P_name']; ?></h3>
                    <p>Description: <?php echo $row['P_des']; ?></p>
                    <p>Color: <?php echo $row['P_Color']; ?></p>
                    <p>Price: $<?php echo $row['P_Price']; ?></p>
                    <p>Dimension: <?php echo $row['P_dim']; ?></p>
                    <button class="add"><a href="viewproduct.php?pid=<?php echo $row['P_id']; ?>" style="text-decoration: none;">View Product</a></button>
                </div>
            <?php } ?>
        </div>
    </main>
</body>
</html>

