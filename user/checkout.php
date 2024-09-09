<?php
include("../coneksi.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_names = $_POST['product_names'];
    $product_prices = $_POST['product_prices'];
    $quantities = $_POST['quantities'];

    for ($i = 0; $i < count($product_names); $i++) {
        $product_name = $product_names[$i];
        $product_price = $product_prices[$i];
        $quantity = $quantities[$i];

        // Menggunakan prepared statement untuk menghindari SQL Injection
        $stmt = $coneksi->prepare("INSERT INTO cart (product_name, product_price, quantity) VALUES (?, ?, ?)");
        $stmt->bind_param("sdi", $product_name, $product_price, $quantity);

        if ($stmt->execute()) {
            echo "Item added to cart successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
    
    // Hapus semua item di keranjang setelah checkout
    unset($_SESSION['cart']);
    header("Location: payment.php"); // Redirect ke halaman terima kasih atau halaman lainnya
} else {
    echo "Invalid request method.";
}

$coneksi->close();
?>