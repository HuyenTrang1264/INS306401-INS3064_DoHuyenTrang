<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Kiểm tra xem các trường có rỗng không
    $errors = [];
    $fullname = $_POST['fullname'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $message = $_POST['message'] ?? '';

    if (empty($fullname)) {
        $errors[] = "Full Name is required.";
    }
    if (empty($email)) {
        $errors[] = "Email is required.";
    }
    if (empty($phone)) {
        $errors[] = "Phone Number is required.";
    }
    if (empty($message)) {
        $errors[] = "Message is required.";
    }

    if (!empty($errors)) {
        // Nếu có lỗi, hiển thị các lỗi này
        echo '<ul>';
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo '</ul>';
    } else {
        // Nếu không có lỗi, hiển thị dữ liệu
        echo "<h2>Received Data:</h2>";
        echo "<ul>";
        echo "<li><strong>Full Name:</strong> $fullname</li>";
        echo "<li><strong>Email:</strong> $email</li>";
        echo "<li><strong>Phone Number:</strong> $phone</li>";
        echo "<li><strong>Message:</strong> $message</li>";
        echo "</ul>";
    }
} else {
    echo "Invalid request.";
}
?>
