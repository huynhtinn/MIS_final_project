<?php
session_start();
include 'db.php'; // Kết nối với database

// Sample data for customer segmentation
$customer_groups = [
    'Office Workers' => [
        'percentage' => 40,
        'preferences' => 'Takeaway coffee, simple drinks',
        'peak_hours' => '7am-9am',
        'purchases' => 5000,
        'revenue' => 2000
    ],
    'Students' => [
        'percentage' => 30,
        'preferences' => 'Study space, affordable prices',
        'peak_hours' => '2pm-5pm',
        'purchases' => 3800,
        'revenue' => 1975
    ],
    'Others' => [
        'percentage' => 30,
        'preferences' => 'Variety of drinks, comfortable seating',
        'peak_hours' => '5pm-8pm',
        'purchases' => 1600,
        'revenue' => 1000
    ],
    'Regulars' => [
        'percentage' => 45,
        'preferences' => 'Exclusive blends, personalized service',
        'peak_hours' => '8am-10am',
        'purchases' => 2500,
        'revenue' => 3500
    ],
    'Tourists' => [
        'percentage' => 25,
        'preferences' => 'Local specialties, souvenirs',
        'peak_hours' => '10am-12pm',
        'purchases' => 1200,
        'revenue' => 800
    ],
    'Families' => [
        'percentage' => 20,
        'preferences' => 'Kids menu, family-friendly',
        'peak_hours' => '12pm-2pm',
        'purchases' => 800,
        'revenue' => 500
    ],
    'Health Enthusiasts' => [
        'percentage' => 15,
        'preferences' => 'Organic, vegan options',
        'peak_hours' => '2pm-4pm',
        'purchases' => 600,
        'revenue' => 400
    ],
    'Night Owls' => [
        'percentage' => 10,
        'preferences' => 'Late-night menu, live music',
        'peak_hours' => '8pm-10pm',
        'purchases' => 400,
        'revenue' => 300
    ]
];

// Prepare data for charts
$group_names = array_keys($customer_groups);
$group_percentages = array_column($customer_groups, 'percentage');
$group_purchases = array_column($customer_groups, 'purchases');
$group_revenue = array_column($customer_groups, 'revenue');
$group_frequency = array_column($customer_groups, 'frequency');



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
                    <a href="inventory_management.php" class="nav-item nav-link"><i class="fa fa-building me-2"></i>Storage</a>
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


           
            <!-- Customer Segmentation Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-4 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <h6 class="mb-0">Customer Segmentation - Pie Chart</h6>
                            <canvas id="customer-segmentation-pie-chart"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <h6 class="mb-0">Customer Segmentation - Bar Chart</h6>
                            <canvas id="customer-segmentation-bar-chart"></canvas>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-xl-12">
                        <div class="bg-light text-center rounded p-4">
                            <h6 class="mb-0">Customer Group Information</h6>
                            <div class="row">
                                <?php foreach ($customer_groups as $group_name => $group_data): ?>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo htmlspecialchars($group_name); ?></h5>
                                                <p class="card-text">Percentage: <?php echo htmlspecialchars($group_data['percentage']); ?>%</p>
                                                <p class="card-text">Preferences: <?php echo htmlspecialchars($group_data['preferences']); ?></p>
                                                <p class="card-text">Peak Hours: <?php echo htmlspecialchars($group_data['peak_hours']); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Customer Segmentation End -->


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
    

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Customer Segmentation Pie Chart
            const pieCtx = document.getElementById('customer-segmentation-pie-chart').getContext('2d');
            new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode($group_names); ?>,
                    datasets: [{
                        data: <?php echo json_encode($group_percentages); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // Customer Segmentation Bar Chart
            const barCtx = document.getElementById('customer-segmentation-bar-chart').getContext('2d');
            new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($group_names); ?>,
                    datasets: [
                        {
                            label: 'Purchases',
                            data: <?php echo json_encode($group_purchases); ?>,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Revenue',
                            data: <?php echo json_encode($group_revenue); ?>,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Frequency',
                            data: <?php echo json_encode($group_frequency); ?>,
                            backgroundColor: 'rgba(255, 206, 86, 0.2)',
                            borderColor: 'rgba(255, 206, 86, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
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