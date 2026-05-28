<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $phone = trim($_POST["phone"] ?? ""); 
    $message = trim($_POST["message"] ?? "");

    $errors = [];

    if ($name === "" || $email === "" || $phone === "" || $message === "") {
        $errors[] = "Missing Data"; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Result</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f8; }
        .box { width: 400px; margin: 80px auto; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .error { color: #c0392b; }
        .success { color: #27ae60; }
        a { display: inline-block; margin-top: 15px; text-decoration: none; color: #2980b9; }
    </style>
</head>
<body>

<div class="box">
<?php
if (!empty($errors)) {
    echo "<h3 class='error'>" . $errors[0] . "</h3>";
    echo '<a href="contact.html">← Go back</a>';
} else {
    echo "<h3 class='success'>Thank you!</h3>";
    echo "<p><strong>Name:</strong> " . htmlspecialchars($name) . "</p>";
    echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
    echo "<p><strong>Phone:</strong> " . htmlspecialchars($phone) . "</p>";
    echo "<p><strong>Message:</strong><br>" . nl2br(htmlspecialchars($message)) . "</p>";
    echo '<a href="contact.html">← Back to form</a>';
}
?>
</div>

</body>
</html>