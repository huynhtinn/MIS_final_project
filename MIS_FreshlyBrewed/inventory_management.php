<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Inventory Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary: #6c757d;
            --secondary: #343a40;
            --light: #f8f9fa;
            --dark: #212529;
        }

        body {
            background-color: var(--light);
            font-family: 'Arial', sans-serif;
            padding-top: 70px;
        }

        .navbar {
            background-color: var(--primary);
        }

        .navbar-brand {
            color: var(--light);
            font-weight: bold;
        }

        .navbar .btn-success {
            margin-left: auto;
        }

        .container-section {
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        h2 {
            color: var(--dark);
            font-weight: bold;
        }

        .btn-primary {
            background-color: var(--primary);
            border: none;
        }

        .btn-primary:hover {
            background-color: var(--secondary);
        }

        table {
            width: 100%;
            text-align: center;
        }

        table th, table td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Inventory Management</a>
            <a href="dashboard.php" class="btn btn-success">
                <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
            </a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <!-- Inventory Management -->
            <div class="col-md-6">
                <div class="container-section">
                    <h2>Manage Inventory</h2>
                    <form method="POST" action="process_inventory.php">
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" required>
                        </div>
                        <div class="form-group">
                            <label for="stock_quantity">Stock Quantity</label>
                            <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add/Update Product</button>
                    </form>
                </div>
            </div>

            <!-- Inventory Prediction -->
            <div class="col-md-6">
                <div class="container-section">
                    <h2>Inventory Prediction</h2>
                    <button id="predict_stock" class="btn btn-warning">Predict Stock</button>
                    <div id="prediction_result" class="mt-3" style="font-weight: bold; background: #eef6f5; padding: 15px; border-radius: 8px;"></div>
                </div>
            </div>
        </div>

        <!-- Inventory Table -->
        <div class="container-section mt-4">
            <h2>Current Inventory</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Stock Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Dummy data for inventory
                    $inventory = [
                        ["product_name" => "Espresso", "stock_quantity" => 120],
                        ["product_name" => "Latte", "stock_quantity" => 80],
                        ["product_name" => "Cappuccino", "stock_quantity" => 50],
                        ["product_name" => "Mocha", "stock_quantity" => 40],
                        ["product_name" => "Green Tea", "stock_quantity" => 60]
                    ];

                    foreach ($inventory as $item) {
                        echo "<tr>";
                        echo "<td>{$item['product_name']}</td>";
                        echo "<td>{$item['stock_quantity']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-4">
        <p>&copy; 2024 Freshly Brewed. All Rights Reserved.</p>
    </footer>

    <!-- Include JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $('#predict_stock').click(function () {
            // Dummy prediction
            const prediction = "Based on current sales trends, you might need to restock Espresso within 3 days.";
            $('#prediction_result').html(prediction);
        });
    </script>
</body>

</html>
