<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body
        {
            background-image: url(Images/wp4249289-photo-frame-wallpapers.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
        #head
        {
            color: Black;
             text-align: center;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 100px;
            margin-top: 10px;  
           /* margin-left: 20%; */
            background-color: whitesmoke;
            padding-left: 200px;
        }
        #about
        {
         /* background-color:whitesmoke;
            opacity: 50%;*/
            width: 1200px;
            height: 250px;
           text-align: center;
            color: white;
            font-size: 35px;
            margin-left: 10%;
            margin-top: 100px;
        }
        #menu
        {
            margin: 0;
            padding: 0;
            list-style: none;
            box-sizing: border-box;
            font-family:'Times New Roman', Times, serif;
            font-size: larger;
            color: black;
        }
        ul
        {
            float: right;
            margin-right: 20px;
        }
        li
        {
            text-decoration: none;
            display: inline-block;
            line-height: 80px;
            margin: 0 5px;
            font-weight: bolder;
        }
        #login
        {
            color: white;
            text-align: center;
            font-size: larger;
            margin-left: 2%;
        }
        #signin
        {
            background-color: bisque;
            color: blue;
            width: 100px;
            height: 50px;
            font-size: large;
            border-radius: 100px;
            font-family: 'Times New Roman', Times, serif;
        }
        #signin:hover
        {
            background-color:darkcyan;
            cursor: pointer;
            color: brown;
        }
        #navbar:hover
        {
            background-color: aquamarine;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page</title>
</head>
<body>
    <ul id="menu">
        <li><a style="text-decoration: none; color:black;"  href="userhome.php" id="navbar">Home</a></li>
        <li><a style="text-decoration: none; color:black;"  href=# id="navbar">Contact us</a></li>
        <li><a style="text-decoration: none; color:black;"  href=# id="navbar">About</a></li>
    </ul>
    <h1 id="head">PHOTONIX</h1>
    <div id="about">
    <h2 id="welcome">Welcome</h2>
    <p>
        Welcome to Photonix! We are a company that specializes in creating the most beautiful and unique photo frames for you. 
    </p>
    </div>
    <div id="login">
    <p>Already a user?</p>
    <button id="signin"><a style="text-decoration: none;"  href="login.php">Sign in</a></button><br>
    <p>New user?</p>
    <button id="signin"><a style="text-decoration: none;" href="register.php">Register</a></button>
    </div>
</body>
</html>
