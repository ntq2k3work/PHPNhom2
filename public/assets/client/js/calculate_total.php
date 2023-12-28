<?php
$quantity = $_POST['quantity'];
$price = $_POST['price'];

// Tăng số lượng hàng và tính toán giá tiền mới
$quantity++;
$price = $quantity * $price;

// Trả về kết quả
$response = [
    'quantity' => $quantity,
    'price' => $price
];
echo json_encode($response);
?>