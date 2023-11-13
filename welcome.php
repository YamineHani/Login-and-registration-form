<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        /* Add CSS styles for the button */
        form {
            text-align: center; /* Center the button horizontally */
        }
        /* Style the "Logout" button */
        form input[type="submit"] {
            width: 55x; /* Set the width of the button */
            height: 40px; /* Set the height of the button */
            background-color: #555;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION["username"])) {
        echo "<h1>Welcome, " . $_SESSION["username"] . "!</h1>";
    } else {
       // header("Location: index.html"); 
       header("Location: sign.php"); 
    }
    ?>
        <form action="logout.php" method="post">
        <input type="submit" value="Logout">
    </form>

</body>
</html>
