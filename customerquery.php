<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>customerquery</title>
    <style>
        body
        {
            background-image: url(Images/14.jpg);
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
        }
    .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 80%;
            text-align: center;
        }
        .myPopup
        {
           
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        
        }
    a:hover
    {
        cursor: pointer;
    }
    table
    {
        background-color: white;
        width: 60%;
    }
  </style>
</head>
<body>
    <form action="customerquery.php" method="POST">
      
        <center>
        <h1>Customer Queries</h1>
            <?php
            include 'connection.php';
            $query = "SELECT * FROM contact";
            $res = mysqli_query($con, $query) or die("Query Failed");
            echo "<table border=2px>";
            echo "<tr><th>Si.No</th><th>Customer id</th><th>Customer Quries</th><th>Query</th><th>Reply</th></tr>";

            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>" . $row['co_id'] . "</td>";
                echo "<td>" . $row['C_id'] . "</td>";
                echo "<td>" . $row['C_name'] . "</td>";
                echo "<td>" . $row['msg'] . "</td>";
                ?>
                <td><a onclick='openPopup("<?php echo $row['co_id']; ?>")'>reply</a></td>
                <?php
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </center>
        <div class="popup" id="myPopup">
            <span onclick="closePopup()" style="float: right; cursor: pointer;">&times;</span>
            <label>Enter your reply here</label><br>
            <input type="text" name="reply"><br>
            <input type="hidden" name="co_id" id="co_id">
            <center><input type="submit" name="submit" value="submit"></center>
        </div>

        <script>
            function openPopup(co_id) {
                document.getElementById("myPopup").style.display = "block";
                document.getElementById("co_id").value = co_id;
                // Update the URL with co_id
                window.history.replaceState({}, document.title, window.location.pathname + "?qid=" + co_id);
            }

            function closePopup() {
                document.getElementById("myPopup").style.display = "none";
            }
        </script>
    </form>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $reply = $_POST['reply'];
    $co_id = $_POST['co_id'];

    include 'connection.php';
    $query = "UPDATE contact SET reply='$reply' WHERE co_id=$co_id";
    mysqli_query($con, $query) or die("Query Failed");
    // Redirect to the original page after form submission
    header("Location: customerquery.php");
    exit();
}
?>