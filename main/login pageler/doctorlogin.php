<?php

$host = "127.0.0.1";
$dbname = "test";
$username = "root";
$password = "123";
$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $email = $_POST['email'] ?? '';
    $password2 = $_POST['password2'] ?? '';


    $stmt = $conn->prepare("SELECT * FROM doctor WHERE email = ? AND password2 = ?");
    $stmt->bind_param("ss", $email, $password2);

   
    $stmt->execute();

   
    $result = $stmt->get_result();

  
    if ($result->num_rows > 0) {
        header("Location: mainpage.html");
        // giriş onayanıyor yönlenirme yapın
    } else {
        echo "Login failed. Invalid email or password.";
    }

    $stmt->close();
}

$conn->close();

?>



