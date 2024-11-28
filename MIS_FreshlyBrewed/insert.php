<?php
include 'db.php'; // Kết nối với database

// Array of products
$products = [
    [
        'name' => 'Purple Passion Juice',
        'description' => 'A vibrant purple drink served in a mason jar, with a refreshing blend of mixed berries and a hint of mint. Perfect for a hot day to rejuvenate your senses.',
        'price' => 19.00,
        'image' => 'img/store-product-7.jpg'
    ],
    [
        'name' => 'Iced Coffee Bliss',
        'description' => 'An invigorating iced coffee topped with frothy bubbles, served in a glass with a straw. This refreshing beverage is perfect for those who need a caffeine boost.',
        'price' => 19.00,
        'image' => 'img/store-product-8.jpg'
    ],
    [
        'name' => 'Tropical Sunrise Smoothie',
        'description' => 'A delightful smoothie made with tropical fruits like mango, pineapple, and banana, blended to perfection. Served in a tall glass with a slice of pineapple on the rim.',
        'price' => 15.00,
        'image' => 'img/store-product-9.jpg'
    ],
    [
        'name' => 'Matcha Mint Cooler',
        'description' => 'A refreshing green drink made with matcha and mint, served in a mason jar with a straw. This unique blend offers a revitalizing and healthful experience.',
        'price' => 19.00,
        'image' => 'img/store-product-10.jpg'
    ],
    [
        'name' => 'Mango Sunrise',
        'description' => 'An enticing orange drink infused with the sweetness of ripe mango pieces, served in a glass. This tropical delight is a perfect way to brighten your day.',
        'price' => 19.00,
        'image' => 'img/store-product-11.jpg'
    ]
    // Add more products as needed
];

// Insert products into the database
foreach ($products as $product) {
    $stmt = $conn->prepare("INSERT INTO Products (ProductName, Description, Price, ImageURL) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $product['name'], $product['description'], $product['price'], $product['image']);
    $stmt->execute();
    $stmt->close();
}

echo "Products inserted successfully!";
?>