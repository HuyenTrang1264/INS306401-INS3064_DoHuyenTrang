<?php
require_once 'Database.php';
$db = Database::getInstance()->getConnection();

$sql = "SELECT u.name, u.email, SUM(o.total_amount) as total_spent
        FROM users u
        JOIN orders o ON u.id = o.user_id
        GROUP BY u.id
        ORDER BY total_spent DESC
        LIMIT 3";

$customers = $db->query($sql)->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Top VIP Customers</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Top 3 VIP Customers (Highest Spending)</h2>
    <table>
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Total Spent</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td>$<?= number_format($row['total_spent'], 2) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <a href="index.php">Back to Dashboard</a>
</body>
</html>