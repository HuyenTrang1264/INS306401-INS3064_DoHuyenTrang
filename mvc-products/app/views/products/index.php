<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sach san pham</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            background-color: #f4f7fb;
            color: #333;
        }

        .container {
            width: 92%;
            max-width: 1000px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        }

        h1 {
            margin-top: 0;
            color: #1f3c88;
            text-align: center;
        }

        .top-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            color: white;
            padding: 10px 18px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn-add {
            background-color: #2563eb;
        }

        .btn-add:hover {
            background-color: #1d4ed8;
        }

        .btn-edit {
            background-color: #f59e0b;
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 8px;
            color: white;
            font-weight: bold;
            display: inline-block;
        }

        .btn-edit:hover {
            background-color: #d97706;
        }

        .btn-delete {
            background-color: #dc2626;
            padding: 8px 14px;
        }

        .btn-delete:hover {
            background-color: #b91c1c;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 10px;
        }

        thead {
            background-color: #2563eb;
            color: white;
        }

        th, td {
            padding: 14px 16px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: middle;
        }

        tbody tr:nth-child(even) {
            background-color: #f9fafb;
        }

        tbody tr:hover {
            background-color: #eef4ff;
        }

        .actions {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .actions form {
            margin: 0;
        }

        .empty {
            text-align: center;
            padding: 20px;
            color: #666;
        }

        .price {
            font-weight: bold;
            color: #0f766e;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Danh sách sản phẩm</h1>

        <div class="top-bar">
            <a href="/products/create" class="btn btn-add">+ Thêm sản phẩm mới</a>
        </div>

        <?php if (!empty($products)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Mã số</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= htmlspecialchars($product['id']) ?></td>
                            <td><?= htmlspecialchars($product['name']) ?></td>
                            <td class="price">$<?= htmlspecialchars($product['price']) ?></td>
                            <td>
                                <div class="actions">
                                    <a href="/products/edit?id=<?= htmlspecialchars($product['id']) ?>" class="btn-edit">
                                        Sửa
                                    </a>

                                    <form action="/products/delete" method="POST" onsubmit="return confirm('Ban co chac muon xoa san pham nay khong?');">
                                        <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>">
                                        <button type="submit" class="btn btn-delete">Xóa</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="empty">Chưa có sản phẩm nào.</p>
        <?php endif; ?>
    </div>
</body>
</html>