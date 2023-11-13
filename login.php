<?php
$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "registration";
$connection = mysqli_connect($sname, $uname, $password, $db_name);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $checkUserQuery = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($connection, $checkUserQuery);
    
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        
        if (md5($password) ==  $user["password"]) {
            
            session_start();
            $_SESSION["username"] = $user["name"];
            header("Location: welcome.php"); // Redirect to the welcome page
            exit();
        } else {
            echo "<script>
            alert('Incorrect password');
            window.location.href='index.html';
            </script>";
        }
    } else {
        echo "<script>
            alert('User does not exist');
             window.location.href='index.html';
            </script>";             
    }

    mysqli_close($connection);
}
?>
