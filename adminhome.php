<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <style>
        body
        {
            background-image: url(Images/ba932e14da891f202d04e03504d8b45b.jpg);
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
        }
        h1
        {
            color: whitesmoke;
        }
        h1 {
      background: linear-gradient(45deg, #ff00cc, #3333ff);
      -webkit-background-clip: text;
      color: transparent;
      font-size: 2em;
      text-align: center;
      margin: 0;
      padding: 20px;
    }

    /* Add some shadow to make the text stand out */
    h1::after {
      content: "";
      display: block;
      width: 100%;
      height: 10px;
      background: rgba(0, 0, 0, 0.3);
      margin-top: 10px;
    }
        button 
        {
           height: 50px;
           width: 200px;
           margin: 5px;
           font-size: large;
           background-color: whitesmoke;
           border-radius: 20px;
        }
        a
        {
            color: Blue;
            font-family: 'Times New Roman', Times, serif;
        }
        a:hover
        {
            color: yellow;
        }
        button:hover
        {
            background-color: black;
        }
        h1 {
            position: relative;
            display: inline-block;
            font-size: 50px;
        }
        #b
        {
            margin-top: 150px;
        }
        </style>
</head>
<body><center>
    <form method="POST" action="adminhome.php">
    <h1>Welcome Admin</h1><br>
  
    <button id="b"><a href="addcategory.php" style="text-decoration:none">Add Category</a></button>
    <button id="b"><a href="addproduct.php"  style="text-decoration:none">Add Product</a></button>
    <button id="b"><a href="product.php"  style="text-decoration:none">View Products</a></button><br>
    <button><a href="viewfeedback.php"  style="text-decoration:none">View Feedback</a></button>
    <button><a href="customerorders.php"  style="text-decoration:none">View Orders</a></button>
    <button><a href="report.php"  style="text-decoration:none">Report</a></button><br>
    <button><a href="customerquery.php"  style="text-decoration:none">Queries</a></button>
    <button><a href="viewcustomers.php"  style="text-decoration:none">View Customers</a></button>
    <button><a href="logout.php"  style="text-decoration:none">Log Out</a></button>
    </center>
    </form>
</body>
</html>


