<?php
$result = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST['num1'] ?? '';
    $num2 = $_POST['num2'] ?? '';
    $op = $_POST['operation'] ?? '';

    // Kiểm tra định dạng số 
    if (is_numeric($num1) && is_numeric($num2)) {
        $num1 = (float)$num1;
        $num2 = (float)$num2;

        switch ($op) {
            case '+': $result = $num1 + $num2; break;
            case '-': $result = $num1 - $num2; break;
            case '*': $result = $num1 * $num2; break;
            case '/': 
                if ($num2 == 0) {
                    $error = "Lỗi: Không thể chia cho 0!"; // Chặn lỗi chia cho 0 
                } else {
                    $result = $num1 / $num2;
                }
                break;
            default: $error = "Phép tính không hợp lệ!";
        }
    } else {
        $error = "Vui lòng nhập số hợp lệ!";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Calculator</title></head>
<body>
    <h2>Simple Calculator</h2>
    <form method="post">
        <input type="text" name="num1" value="<?= htmlspecialchars($_POST['num1'] ?? '') ?>" required>
        <select name="operation">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="text" name="num2" value="<?= htmlspecialchars($_POST['num2'] ?? '') ?>" required>
        <button type="submit">Calculate</button>
    </form>

    <?php if ($error): ?>
        <p style="color:red;"><?= $error ?></p>
    <?php elseif ($result !== ""): ?>
        <p>Kết quả: <strong><?= htmlspecialchars($result) ?></strong></p>
    <?php endif; ?>
</body>
</html>