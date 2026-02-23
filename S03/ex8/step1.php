<?php
session_start();
require_once 'utils.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Lưu vào Session để File 2 có thể đọc được
    $_SESSION['step1'] = [
        'username' => sanitize($_POST['username'] ?? ''),
        'password' => $_POST['password'] ?? '' 
    ];
    header("Location: step2.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Step 1</title>
    <style>
        body { font-family: Arial; background: #f4f6f8; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .box { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 350px; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #2c3e50; color: white; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Step 1: Account</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Next Step</button>
        </form>
    </div>
</body>
</html>