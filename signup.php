
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
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Check if email already exists
    $checkEmailQuery = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($connection, $checkEmailQuery);
    if (mysqli_num_rows($result) > 0) {
        //echo "Email Already Exists";
        echo "<script>
            alert('Email Already Exists');
            window.location.href='signup.html';
            </script>";
    } else {
        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $hashedPassword = md5($password);

        // Insert a new record into the User table
        $insertQuery = "INSERT INTO user(name, email, password) VALUES ('$name', '$email', '$hashedPassword')";

        if (mysqli_query($connection, $insertQuery)) {
            session_start();
            $_SESSION["username"] = $name;
            header("Location: welcome.php"); 
            exit();
        } else {
            // echo "Error: " . $insertQuery . "<br>" . mysqli_error($connection);
            echo "<script>alert('Error: " . $insertQuery . "\\n" . mysqli_error($connection) . "');
            window.location.href='signup.html';
            </script>";

        }
    }
    
    mysqli_close($connection);
}
?>

