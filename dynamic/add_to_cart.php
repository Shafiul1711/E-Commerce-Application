<?php
session_start();
require '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = (int)$_POST['product_id'];
    $format = $_POST['format'] ?? 'Physical'; //default behaviour

    $stmt = $conn->prepare("SELECT id, name, price FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        //unique key and format
        $key = $product_id . '_' . $format;

        if (!isset($_SESSION['cart'][$key])) {
            $_SESSION['cart'][$key] = [
                'product_id' => $product_id,
                'name' => $row['name'],
                'price' => $row['price'],
                'quantity' => 1,
                'format' => $format
            ];
        } else {
            $_SESSION['cart'][$key]['quantity'] += 1;
        }
    }

    $stmt->close();
    $conn->close();
}

header("Location: products.php");
exit;

