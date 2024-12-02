<?php

    session_start();

    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
        $total_items = array_sum(array_column($cart, 'quantity'));
    } else {
        $total_items = 0;
    }

    echo json_encode(['cart_count' => $total_items]);
    exit();

?>

