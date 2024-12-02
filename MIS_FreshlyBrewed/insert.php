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
        'image' => 'img/store-product-11.jpg'
    ],
    [
        'name' => 'Matcha Mint Cooler',
        'description' => 'A refreshing green drink made with matcha and mint, served in a mason jar with a straw. This unique blend offers a revitalizing and healthful experience.',
        'price' => 19.00,
        'image' => 'img/store-product-9.jpg'
    ],
    [
        'name' => 'Mango Sunrise',
        'description' => 'An enticing orange drink infused with the sweetness of ripe mango pieces, served in a glass. This tropical delight is a perfect way to brighten your day.',
        'price' => 19.00,
        'image' => 'img/store-product-10.jpg'
        
    ],
    [
        'name' => 'Berry Bliss',
        'description' => 'A vibrant purple drink blended with fresh blueberries, blackberries, and a hint of lemon zest. Served in a mason jar with a sprig of mint.',
        'price' => 21.00,
        'image' => 'img/store-product-13.jpg'
    ],
    [
        'name' => 'Tropical Paradise',
        'description' => 'A colorful mix of pineapple juice, coconut milk, and a splash of grenadine, garnished with a slice of pineapple and a cherry.',
        'price' => 22.50,
        'image' => 'img/store-product-14.jpg'
    ],
    [
        'name' => 'Green Vitality',
        'description' => 'A refreshing green smoothie with spinach, kale, green apple, and a squeeze of lime. Served in a tall glass with a cucumber slice.',
        'price' => 18.50,
        'image' => 'img/store-product-15.jpg'
    ],
    [
        'name' => 'Peach Serenity',
        'description' => 'A creamy peach smoothie mixed with Greek yogurt, honey, and vanilla. Topped with whipped cream and peach slices.',
        'price' => 20.00,
        'image' => 'img/store-product-16.jpg'
    ],
    [
        'name' => 'Citrus Zinger',
        'description' => 'A zesty drink with orange juice, sparkling water, and a hint of ginger. Served with an orange wedge and a cinnamon stick.',
        'price' => 17.50,
        'image' => 'img/store-product-17.jpg'
    ],
    [
        'name' => 'Chocolate Indulgence',
        'description' => 'A rich chocolate milkshake with Belgian chocolate, whipped cream, and chocolate shavings. Served in a tall glass.',
        'price' => 25.00,
        'image' => 'img/store-product-18.jpg'
    ],
    [
        'name' => 'Strawberry Sunset',
        'description' => 'A strawberry and banana smoothie with a hint of coconut, served in a clear glass and garnished with strawberry slices.',
        'price' => 19.50,
        'image' => 'img/store-product-19.jpg'
    ],
    [
        'name' => 'Caramel Dream',
        'description' => 'A creamy caramel frappuccino with a drizzle of caramel sauce and whipped cream on top.',
        'price' => 24.00,
        'image' => 'img/store-product-20.jpg'
    ],
    [
        'name' => 'Blue Lagoon',
        'description' => 'A visually stunning drink with blue curaçao syrup, lemonade, and crushed ice. Garnished with a lemon wheel.',
        'price' => 16.00,
        'image' => 'img/store-product-21.jpg'
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