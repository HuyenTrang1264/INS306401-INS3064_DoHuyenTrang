<?php
require_once 'Database.php';
$db = Database::getInstance()->getConnection();

$search = $_GET['search'] ?? '';
$filter_cat = $_GET['category_id'] ?? '';

// Lấy danh sách Categories cho dropdown
$categories = $db->query("SELECT * FROM categories")->fetchAll();

// Truy vấn JOIN để lấy tên category
$sql = "SELECT p.*, c.name AS category_name 
        FROM products p 
        LEFT JOIN categories c ON p.category_id = c.id 
        WHERE p.name LIKE :search";

if ($filter_cat !== '') {
    $sql .= " AND p.category_id = :cat_id";
}

$stmt = $db->prepare($sql);
$params = [':search' => "%$search%"];
if ($filter_cat !== '') $params[':cat_id'] = $filter_cat;
$stmt->execute($params);
$products = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Product Dashboard</h1>
    <div class="filter-section">
        <form method="GET">
            <input type="text" name="search" placeholder="Search..." value="<?= htmlspecialchars($search) ?>">
            <select name="category_id">
                <option value="">-- All Categories --</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat['id'] ?>" <?= $filter_cat == $cat['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($cat['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Filter</button>
            <a href="index.php">Reset</a>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $p): ?>
                <tr class="<?= $p['stock'] < 10 ? 'low-stock' : '' ?>">
                    <td><?= $p['id'] ?></td>
                    <td><?= htmlspecialchars($p['name']) ?></td>
                    <td>$<?= number_format($p['price'], 2) ?></td>
                    <td><?= htmlspecialchars($p['category_name'] ?? 'N/A') ?></td>
                    <td><?= $p['stock'] ?> <?= $p['stock'] < 10 ? '⚠️' : '' ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>