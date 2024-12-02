<?php

    // Simulate AI property recommendation based on mock data
    $properties = [
        ["property_name" => "Downtown Loft", "property_price" => 250000],
        ["property_name" => "Suburban House", "property_price" => 200000],
        ["property_name" => "Luxury Apartment", "property_price" => 300000],
        ["property_name" => "Hanoi Villa", "property_price" => 400000],
        ["property_name" => "Saigon Studio", "property_price" => 150000],
        ["property_name" => "Hue Riverside House", "property_price" => 220000],
        ["property_name" => "Nha Trang Beach Condo", "property_price" => 280000],
        ["property_name" => "Hoi An Ancient House", "property_price" => 320000],
        ["property_name" => "Phu Quoc Island Villa", "property_price" => 500000],
        ["property_name" => "Da Lat Mountain Retreat", "property_price" => 270000],
        ["property_name" => "Can Tho Riverfront House", "property_price" => 230000],
        ["property_name" => "Saigon Penthouse", "property_price" => 350000],
        ["property_name" => "Danang Beach House", "property_price" => 450000],
    ];

    $recommended_property = $properties[array_rand($properties)]; // Random recommendation

    echo json_encode($recommended_property);

?>
