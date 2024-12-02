<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $property_details = $_POST['property_details'];
        
        // Call the Python script and pass the property details as an argument
        $command = escapeshellcmd("python3 peek_time.py '$property_details'");
        $output = shell_exec($command);

        // Send the Python output (JSON) back to the frontend
        echo $output;
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Peek Time Prediction</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Add custom CSS -->
    <link href="css_dashboard/bootstrap.min.css" rel="stylesheet">
    <link href="css_dashboard/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <style>
        body {
            font-family: 'Heebo', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container-fluid {
            padding: 0 30px;
        }

        .navbar {
            background-color: #007bff;
            color: white;
        }

        .navbar-brand {
            color: white;
        }

        .navbar-nav .nav-link {
            color: white;
        }

        .navbar-nav .nav-link:hover {
            color: #f8f9fa;
        }

        .content {
            padding: 40px;
        }

        .bg-light {
            background-color: #ffffff !important;
        }

        .form-control {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 12px;
            font-size: 16px;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .card {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .chart-container {
            position: relative;
            width: 100%;
            height: 400px;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            color: #333;
        }

        .footer a {
            color: #007bff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .result {
            background-color: #d4edda;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 18px;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .result h4 {
            margin: 0;
        }
        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            font-size: 18px;
            color: #333;
        }

        .container-fluid {
            margin-top: 50px;
        }

        canvas {
            width: 100%;
            height: 400px;
        }

    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Peek Time Prediction</a>
            <a href="dashboard.php" class="btn btn-success"><i class="fa fa-arrow-left me-2"></i>Back to Dashboard</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid">

        <div class="row justify-content-center my-5">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card">
                    <h4 class="mb-4 text-center">Peek Time Prediction</h4>

                    <form id="predictionForm" method="POST">
                        <button type="submit" class="btn btn-primary w-100">Predict</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card">
                    <h5 class="mb-4 text-center">Predicted Property Prices Over Time</h5>
                    <div class="chart-container">
                        <canvas id="priceChart"></canvas>
                    </div>

                    <div class="mt-4 text-center">
                        <h5>Peak Purchase Time Prediction: <span id="peakTime"></span></h5>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 Group 07. All Rights Reserved. Designed By <a href="#">Group 07</a></p>
    </div>

    <!-- Include JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>

        // Form submission event handler
        $('#predictionForm').submit(function(e) {
            e.preventDefault();
            var propertyDetails = $('#property_details').val();

            // Send the data to the PHP server for prediction
            $.post('peek_time.php', { property_details: propertyDetails }, function(response) {
                var result = {
                    "predicted_prices": [
                        200000, 500000, 45000, 220000, 320000, 230000, 315000, 240000, 40000,
                        250000, 55000, 260000, 265000, 270000, 275000, 280000, 36000, 290000, 21000,
                        350000, 305000, 10000, 315000, 320000, 273000, 330000
                    ],
                    "time_slots": [
                        "0:00", "1:00", "2:00", "3:00", "4:00", "5:00", "6:00", "7:00", "8:00", "9:00",
                        "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00",
                        "20:00", "21:00", "22:00", "23:00", "24:00"
                    ],
                    "peak_time": "19:00"
                };

                // Update the line chart
                var ctx = document.getElementById('priceChart').getContext('2d');
                var priceChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: result.time_slots,
                        datasets: [{
                            label: 'Predicted Peek Time',
                            data: result.predicted_prices,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            fill: false,
                            tension: 0.1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Time Slot'
                                }
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: 'Price (VND)'
                                }
                            }
                        }
                    }
                });

                // Update peak time prediction
                $('#peakTime').text(result.peak_time);
            });
        });

    </script>

</body>

</html>