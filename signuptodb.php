<?php

$conn = mysqli_connect('localhost', 'root', '', 'itpfl_db') or die('Unable to connect');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conpassword = $_POST['conpassword'];

    if ($password != $conpassword) {
        echo "Passwords do not match.";
    } else {
        $check_query = "SELECT * FROM tbl_admin WHERE username = '$username' OR email = '$email'";
        $result = $conn->query($check_query);

        if ($result->num_rows > 0) {
            echo "Username or email already exists.";
        } else {
            
            $insert_query = "INSERT INTO tbl_admin (username, email, password, con_password, date_added) VALUES ('$username', '$email', '$password', '$conpassword', NOW())";
            if ($conn->query($insert_query) === TRUE) {
                header("Location: login.php");
            } else {
                echo "Error: " . $insert_query . "<br>" . $conn->error;
            }
        }
    }
}

$conn->close();
?>
