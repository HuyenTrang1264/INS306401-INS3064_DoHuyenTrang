<?php
session_start();
require_once 'utils.php';

// Bảo mật: Nếu chưa qua Step 1 thì bắt quay lại
if (!isset($_SESSION['step1'])) {
    header("Location: step1.php");
    exit;
}

$is_done = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $bio = sanitize($_POST['bio'] ?? '');
    $location = sanitize($_POST['location'] ?? '');
    $is_done = true;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Step 2</title>
    <style>
        body { font-family: Arial; background: #f4f6f8; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .box { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 380px; }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #27ae60; color: white; border: none; border-radius: 4px; cursor: pointer; }
        .result { background: #e8f5e9; padding: 15px; border-radius: 4px; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="box">
        <?php if (!$is_done): ?>
            <h2>Step 2: Profile</h2>
            <form method="post">
                <textarea name="bio" placeholder="Tell us about yourself" required></textarea>
                <input type="text" name="location" placeholder="Your Location" required>
                <button type="submit">Finish Registration</button>
            </form>
        <?php else: ?>
            <h2 style="color: #27ae60;">Success!</h2>
            <div class="result">
                <p><strong>Username:</strong> <?= htmlspecialchars($_SESSION['step1']['username']) ?></p>
                <p><strong>Bio:</strong> <?= htmlspecialchars($bio) ?></p>
                <p><strong>Location:</strong> <?= htmlspecialchars($location) ?></p>
            </div>
            <?php session_destroy(); // Xóa session sau khi xong ?>
            <p style="text-align: center;"><a href="step1.php">Start Over</a></p>
        <?php endif; ?>
    </div>
</body>
</html>