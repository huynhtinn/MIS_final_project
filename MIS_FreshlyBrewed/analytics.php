<?php

    session_start();
    include 'db.php'; // Kết nối với database

    // Lấy doanh thu hôm nay
    $sql_today_revenue = "SELECT SUM(TotalAmount) AS TodayRevenue FROM Orders WHERE DATE(OrderDate) = CURDATE()";
    $result = $conn->query($sql_today_revenue);
    $today_revenue = $result->fetch_assoc()['TodayRevenue'] ?? 0;

    // Lấy dữ liệu biểu đồ (theo ngày trong tháng)
    $sql_chart_data = "
        SELECT DATE(OrderDate) AS OrderDate, SUM(TotalAmount) AS TotalAmount
        FROM Orders
        WHERE MONTH(OrderDate) = MONTH(CURDATE()) AND YEAR(OrderDate) = YEAR(CURDATE())
        GROUP BY DATE(OrderDate)
    ";
    $chart_data_result = $conn->query($sql_chart_data);

    // Chuẩn bị dữ liệu cho Chart.js
    $chart_dates = [];
    $chart_revenues = [];
    while ($row = $chart_data_result->fetch_assoc()) {
        $chart_dates[] = $row['OrderDate'];
        $chart_revenues[] = $row['TotalAmount'];
    }

        
    // Top 3 Best-Selling Products
    $sql_best_products = "
    SELECT ProductName, SUM(Quantity) AS TotalSold
    FROM OrderDetails
    GROUP BY ProductName
    ORDER BY TotalSold DESC
    LIMIT 3;
    ";
    $result_best_products = $conn->query($sql_best_products);
    $best_products = [];
    while ($row = $result_best_products->fetch_assoc()) {
        $best_products[] = $row;
    }


    // Sales & Revenue
    $sql_sales_revenue = "
    SELECT DATE(OrderDate) AS OrderDate, SUM(TotalAmount) AS TotalRevenue
    FROM Orders
    GROUP BY DATE(OrderDate)
    ORDER BY OrderDate ASC;
    ";
    $result_sales_revenue = $conn->query($sql_sales_revenue);
    $sales_dates = [];
    $sales_revenues = [];
    while ($row = $result_sales_revenue->fetch_assoc()) {
        $sales_dates[] = $row['OrderDate'];
        $sales_revenues[] = $row['TotalRevenue'];
    }

    // Machine Learning Forecast (Optional Python Script)
    $forecast_revenues = []; // Dữ liệu dự đoán sẽ được tính toán sau.

    // Recent Sales
    $sql_recent_sales = "
        SELECT o.OrderDate, o.OrderID, u.FullName AS Customer, o.TotalAmount, 'Paid' AS Status
        FROM Orders o
        JOIN Users u ON o.UserID = u.UserID
        ORDER BY o.OrderDate DESC
        LIMIT 5;
    ";
    $result_recent_sales = $conn->query($sql_recent_sales);
    $recent_sales = [];
    while ($row = $result_recent_sales->fetch_assoc()) {
        $recent_sales[] = $row;
    }
    // Lấy dữ liệu bán hàng trong tuần này
    $sql_weekly_sales = "
    SELECT DAYNAME(OrderDate) AS OrderDay, COUNT(*) AS OrderCount
    FROM Orders
    WHERE YEARWEEK(OrderDate, 1) = YEARWEEK(CURDATE(), 1)
    GROUP BY DAYNAME(OrderDate)
    ORDER BY FIELD(DAYNAME(OrderDate), 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday')
    ";
    $weekly_sales_result = $conn->query($sql_weekly_sales);
    $weekly_sales_days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    $weekly_order_counts = array_fill(0, 7, 0);
        while ($row = $weekly_sales_result->fetch_assoc()) {
            $index = array_search($row['OrderDay'], $weekly_sales_days);
            $weekly_order_counts[$index] = $row['OrderCount'];
    }

    // Encode data for JavaScript
    $weekly_sales_days_json = json_encode($weekly_sales_days);
    $weekly_order_counts_json = json_encode($weekly_order_counts);



    // Hardcoded sample data for revenue and profit by quarter
    $quarters = ['Q1', 'Q2', 'Q3', 'Q4'];
    $revenues = [10000, 15000, 20000, 25000];
    $profits = [5000, 7500, 10000, 12500];

    // Hardcoded sample data for branch performance
    $branches = ['Ha Noi', 'Ho Chi Minh City', 'Da Nang'];
    $branch_revenues = [30000, 50000, 10000];

    // Hardcoded sample data for market trends
    $market_trends = [10, 15, 20, 25];

    // Encode data for JavaScript
    $weekly_sales_days_json = json_encode($weekly_sales_days);
    $weekly_order_counts_json = json_encode($weekly_order_counts);
    $quarters_json = json_encode($quarters);
    $revenues_json = json_encode($revenues);
    $profits_json = json_encode($profits);
    $branches_json = json_encode($branches);
    $branch_revenues_json = json_encode($branch_revenues);
    $market_trends_json = json_encode($market_trends);


    // Fetch recent feedbacks
    $sql_feedbacks = "SELECT * FROM Feedbacks ORDER BY CreatedAt DESC LIMIT 5";
    $result_feedbacks = $conn->query($sql_feedbacks);
    $feedbacks = [];
    if ($result_feedbacks->num_rows > 0) {
        while ($row = $result_feedbacks->fetch_assoc()) {
            $feedbacks[] = $row;
        }
    }
?>




<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <title>BI Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib_dashboard/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib_dashboard/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css_dashboard/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css_dashboard/style.css" rel="stylesheet">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="dashboard.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Freshly Brewed Dashboard</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Huy Nguyen</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="dashboard.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="widget.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Management</a>
                    <a href="analytics.php" class="nav-item nav-link"><i class="fa fa-chart-line me-2"></i>Analytics</a>
                    <a href="Cus_segment.php" class="nav-item nav-link"><i class="fa fa-users-cog me-2"></i>Segmentation</a>

                    <a href="peek_time.php" class="nav-item nav-link"><i class="fa fa-building me-2"></i>Peek Time</a>
                    <a href="manage_locations.php" class="nav-item nav-link"><i class="fa fa-building me-2"></i>Real Estate</a>
                    
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="dashboard.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <a href="index.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Back to Frontend</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a> 
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Huy send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Tin send you a message</h6>
                                        <small>30 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Khoi send you a message</h6>
                                        <small>50 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="see_all_message.php" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notification</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="see_all_notification.php" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Admin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="my_profile.php" class="dropdown-item">My Profile</a>
                            <a href="settings.php" class="dropdown-item">Settings</a>
                            <a href="register.php" class="dropdown-item">Log Out</a>


                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


           
            <!-- Quarterly Chart Start -->
             
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <h6 class="mb-0">Revenue and Profit by Quarter</h6>
                            <canvas id="quarterly-chart"></canvas>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <h6 class="mb-0">Market Trends</h6>
                            <canvas id="market-trends-chart"></canvas>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <h6 class="mb-0">Branch Performance</h6>
                            <canvas id="branch-performance-chart"></canvas>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="chart-container">
                            <canvas id="market-trends-chart"></canvas>
                            <h6 class="mb-0">Reviews of the past year</h6>
                            <table class="trend-table table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Season</th>
                                        <th>Trend</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Winter</td>
                                        <td>Highest revenue</td>
                                    </tr>
                                    <tr>
                                        <td>Spring</td>
                                        <td>Revenue mainly from fruit tea and milk tea products from young customers</td>
                                    </tr>
                                    <tr>
                                        <td>Summer</td>
                                        <td>Increased sales of cold beverages</td>
                                    </tr>
                                    <tr>
                                        <td>Fall</td>
                                        <td>Steady sales with a mix of hot and cold beverages</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>



            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Group 07</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            Designed By <a href="">Group 07</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js_dashboard/main.js"></script>

    

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    


    <!-- Quarterly Revenue and Profit Chart -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Quarterly Revenue and Profit Chart
            const quarterlyCtx = document.getElementById('quarterly-chart').getContext('2d');
            new Chart(quarterlyCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo $quarters_json; ?>,
                    datasets: [
                        {
                            label: 'Revenue',
                            data: <?php echo $revenues_json; ?>,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Profit',
                            data: <?php echo $profits_json; ?>,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Branch Performance Chart
            const branchPerformanceCtx = document.getElementById('branch-performance-chart').getContext('2d');
            new Chart(branchPerformanceCtx, {
                type: 'pie',
                data: {
                    labels: <?php echo $branches_json; ?>,
                    datasets: [{
                        data: <?php echo $branch_revenues_json; ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Market Trends Chart
            const marketTrendsCtx = document.getElementById('market-trends-chart').getContext('2d');
            new Chart(marketTrendsCtx, {
                type: 'line',
                data: {
                    labels: <?php echo $quarters_json; ?>,
                    datasets: [{
                        label: 'Market Trends',
                        data: <?php echo $market_trends_json; ?>,
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1,
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>