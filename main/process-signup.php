<?php
$mysqli = new mysqli("127.0.0.1","root","123","test");

if ($mysqli->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "INSERT INTO user (name, email, password2) VALUES (?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss", $_POST["name"], $_POST["email"], $_POST["password2"]);
                  
if ($stmt->execute()) {
    header("Location: ./mainpage.html");
    exit;
} else {
    if ($mysqli->errno === 1062) {
        die("Email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
?>
