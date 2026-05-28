<?php

require_once __DIR__ . '/../../core/Controller.php';

class ProductController extends Controller
{
    private function seedProducts()
    {
        if (!isset($_SESSION['products'])) {
            $_SESSION['products'] = [
                ['id' => 1, 'name' => 'May tinh xach tay', 'price' => 1500],
                ['id' => 2, 'name' => 'Chuot', 'price' => 25],
                ['id' => 3, 'name' => 'Ban phim', 'price' => 45],
            ];
        }
    }

    private function findProductById($id)
    {
        $this->seedProducts();

        foreach ($_SESSION['products'] as $product) {
            if ($product['id'] == $id) {
                return $product;
            }
        }

        return null;
    }

    public function index()
    {
        $this->seedProducts();

        $this->view('products/index', [
            'products' => $_SESSION['products']
        ]);
    }

    public function create()
    {
        $this->view('products/create');
    }

    public function store()
    {
        $this->seedProducts();

        $name = $_POST['name'] ?? '';
        $price = $_POST['price'] ?? '';

        $name = trim($name);
        $price = trim($price);

        if ($name === '' || $price === '') {
            echo "Vui long nhap day du thong tin.";
            return;
        }

        $maxId = 0;
        foreach ($_SESSION['products'] as $product) {
            if ($product['id'] > $maxId) {
                $maxId = $product['id'];
            }
        }

        $_SESSION['products'][] = [
            'id' => $maxId + 1,
            'name' => $name,
            'price' => $price
        ];

        header('Location: /products');
        exit;
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;

        if ($id === null) {
            echo "Khong tim thay san pham.";
            return;
        }

        $product = $this->findProductById($id);

        if (!$product) {
            echo "San pham khong ton tai.";
            return;
        }

        $this->view('products/edit', [
            'product' => $product
        ]);
    }

    public function update()
    {
        $this->seedProducts();

        $id = $_POST['id'] ?? '';
        $name = $_POST['name'] ?? '';
        $price = $_POST['price'] ?? '';

        $id = trim($id);
        $name = trim($name);
        $price = trim($price);

        if ($id === '' || $name === '' || $price === '') {
            echo "Vui long nhap day du thong tin.";
            return;
        }

        foreach ($_SESSION['products'] as $key => $product) {
            if ($product['id'] == $id) {
                $_SESSION['products'][$key]['name'] = $name;
                $_SESSION['products'][$key]['price'] = $price;
                break;
            }
        }

        header('Location: /products');
        exit;
    }

    public function delete()
    {
        $this->seedProducts();

        $id = $_POST['id'] ?? null;

        if ($id === null) {
            echo "Khong tim thay san pham de xoa.";
            return;
        }

        foreach ($_SESSION['products'] as $key => $product) {
            if ($product['id'] == $id) {
                unset($_SESSION['products'][$key]);
                break;
            }
        }

        $_SESSION['products'] = array_values($_SESSION['products']);

        header('Location: /products');
        exit;
    }
}