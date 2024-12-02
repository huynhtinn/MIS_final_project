<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Real Estate Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root {
            --primary: #5c8c85;
            --secondary: #396c63;
            --light: #f8f9fa;
            --dark: #343a40;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--light);
            padding-top: 70px;
        }

        h2 {
            color: var(--dark);
            font-weight: bold;
            margin-bottom: 20px;
        }

        .navbar {
            display: flex;
            align-items: center; /* Căn giữa theo chiều dọc */
            justify-content: space-between; /* Khoảng cách đều giữa logo và nút */
            height: 70px; /* Đảm bảo chiều cao đồng nhất */
            padding: 0 20px;
            background: linear-gradient(90deg, var(--primary), var(--secondary)); /* Gradient màu */
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem; /* Tăng kích thước chữ */
            color: var(--light);
            white-space: nowrap; /* Tránh chữ bị xuống dòng */
        }

        .btn-outline-light {
            height: 40px;
            line-height: 40px; /* Đảm bảo căn giữa nút */
            border: 2px solid #ffffff;
            color: #ffffff;
            font-weight: bold;
            padding: 0 15px;
            transition: 0.3s;
        }

        .btn-outline-light:hover {
            background-color: #ffffff;
            color: var(--dark);
        }


        .navbar-brand i {
            font-size: 1.5rem;
            margin-right: 8px;
        }

        .btn-outline-light {
            border: 2px solid #ffffff;
            color: #ffffff;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-outline-light:hover {
            background-color: #ffffff;
            color: var(--dark);
        }

        .shadow {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
            font-size: 16px;
        }

        button {
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
        }

        button.btn-primary {
            background-color: var(--primary);
            border: none;
        }

        button.btn-primary:hover {
            background-color: var(--secondary);
        }

        #recommendation_result {
            background-color: #eef6f5;
            padding: 20px;
            border-radius: 8px;
            font-weight: bold;
            text-align: center;
        }

        footer {
            background-color: var(--dark);
            color: var(--light);
            padding: 20px 10px;
            text-align: center;
        }

        .container-section {
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        @media (max-width: 768px) {
            .navbar .btn-success {
                margin-top: 10px;
            }
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow">
        <div class="container">
            <!-- Logo hoặc Tên ứng dụng -->
            <a class="navbar-brand align-items-center" href="#"><i class="fas fa-building me-2"></i> Real Estate Management</a>
            <!-- Nút quay lại -->
            <a href="dashboard.php" class="btn btn-outline-light ml-auto"><i class="fas fa-arrow-left me-2"></i>Back to Dashboard</a>
        </div>
    </nav>


    <div class="container mt-5">
        <div class="row my-4">
            <!-- Coffee Shop Management -->
            <div class="col-md-6">
                <div class="container-section">
                    <h2>Manage Coffee Shop Locations</h2>
                    <form method="POST" action="manage_locations.php">
                        <div class="form-group">
                            <label for="location_name">Location Name</label>
                            <input type="text" class="form-control" id="location_name" name="location_name" required>
                        </div>
                        <div class="form-group">
                            <label for="location_address">Location Address</label>
                            <input type="text" class="form-control" id="location_address" name="location_address" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Location</button>
                    </form>
                </div>
            </div>

            <!-- Property Price Management -->
            <div class="col-md-6">
                <div class="container-section">
                    <h2>Property Price Management</h2>
                    <form method="POST" action="manage_locations.php">
                        <div class="form-group">
                            <label for="property_name">Property Name</label>
                            <input type="text" class="form-control" id="property_name" name="property_name" required>
                        </div>
                        <div class="form-group">
                            <label for="property_price">Property Price (USD)</label>
                            <input type="number" class="form-control" id="property_price" name="property_price" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Property</button>
                    </form>
                </div>
            </div>
        </div>


        <!-- Property List Table -->
        <div class="container-section">
            <h2>Property List</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Property Name</th>
                        <th>Property Price (USD)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
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

                    foreach ($properties as $property) {
                        echo "<tr>";
                        echo "<td>{$property['property_name']}</td>";
                        echo "<td>\${$property['property_price']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- AI Suggestion Section -->
        <div class="container-section">
            <h2>AI Property Recommendation</h2>
            <button id="getRecommendation" class="btn btn-warning">Get Recommendation</button>
            <div id="recommendation_result" class="mt-3"></div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Coffee & Property Management. All Rights Reserved.</p>
    </footer>

    <!-- Include JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $('#getRecommendation').click(function () {
            $.post('get_recommendation.php', function (response) {
                const data = JSON.parse(response);
                $('#recommendation_result').html(`<strong>Recommended Property:</strong> ${data.property_name} <br><strong>Price:</strong> $${data.property_price}`);
            });
        });
    </script>
</body>

</html>