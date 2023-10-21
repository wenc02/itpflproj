<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'itpfl_db') or die('Unable to connect');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login_query = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($login_query);

    if ($row = $query->fetch()) {
        $_SESSION['authenticated'] = true;
        header('Location: index.php');
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}

$conn->close();
?>

