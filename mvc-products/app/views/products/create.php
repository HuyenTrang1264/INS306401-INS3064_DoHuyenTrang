<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
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
            width: 90%;
            max-width: 550px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        }

        h1 {
            margin-top: 0;
            text-align: center;
            color: #1f3c88;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 15px;
        }

        input:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        button, .back-link {
            border: none;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        button {
            background-color: #2563eb;
            color: white;
        }

        button:hover {
            background-color: #1d4ed8;
        }

        .back-link {
            background-color: #e5e7eb;
            color: #333;
            display: inline-block;
        }

        .back-link:hover {
            background-color: #d1d5db;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thêm sản phẩm</h1>

        <form action="/products/create" method="POST">
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="price">Giá sản phẩm</label>
                <input type="number" id="price" name="price" required>
            </div>

            <div class="actions">
                <button type="submit">Lưu sản phẩm</button>
                <a href="/products" class="back-link">Quay lại</a>
            </div>
        </form>
    </div>
</body>
</html>