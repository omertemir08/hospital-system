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


    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ? AND password2 = ?");
    $stmt->bind_param("ss", $email, $password2);

   
    $stmt->execute();

   
    $result = $stmt->get_result();

  
    if ($result->num_rows > 0) {
        header("Location: signup-success.html");
        // giriş onayanıyor yönlenirme yapın
    } else {
        echo "Login failed. Invalid email or password.";
    }

    $stmt->close();
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Giriş</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
 <style>   body {
            
            background: url('istockphoto-1409899011-2048x2048') center/cover no-repeat;
            margin: 10;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            backdrop-filter: blur(3px);
        }   

        form {
            text-align: center;
            background: #189AB4;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;

        }

        label, input {
            display: block;
            margin-bottom: 16px;
            color: #D4F1F4;
        }
h1{
    text-align: center;
    color: black;
    
}
        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        button {
            background: #05445E;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #05445E;
        }
    </style>
</head>
<body>
    
    <h1>Giriş</h1>
    
    <form method="post" action="">
        <label for="email">Email</label>
        <input name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        
        <label for="password">Şifre</label>
        <input type="password" name="password2" id="password2">
        
        <button>Giriş</button>
    </form>

</body>
</html>
