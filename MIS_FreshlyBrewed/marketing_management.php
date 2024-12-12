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
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Freshly Brewed</h3>
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
                    <a href="dashboard.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown"></div>
                    <a href="personnel_management.php" class="nav-item nav-link"><i class="fa fa-user-tie me-2"></i>Employee</a>
                    <a href="equipment_management.php" class="nav-item nav-link"><i class="fa fa-tools me-2"></i>Equipment</a>
                    <a href="marketing_management.php" class="nav-item nav-link"><i class="fa fa-bullhorn me-2"></i>Marketing</a>
                    <a href="strategy.php" class="nav-item nav-link"><i class="fa fa-lightbulb me-2"></i>Strategy</a>

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
                <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Admin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Marketing Management Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Marketing Management</h6>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Platform</th>
                                            <th>Visits</th>
                                            <th>Interactions</th>
                                            <th>Brand Awareness</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Article: FreshlyBrewed: Redefining the Coffee Experience</td>
                                            <td>10,000</td>
                                            <td>500</td>
                                            <td>High</td>
                                        </tr>
                                        <tr>
                                            <td>Article: FreshlyBrewed's Commitment to Sustainable Coffee Farming</td>
                                            <td>8,000</td>
                                            <td>300</td>
                                            <td>Medium</td>
                                        </tr>
                                        <tr>
                                            <td>Article: Supporting Local Farmers: FreshlyBrewed's Nationwide Farm Investments</td>
                                            <td>8,000</td>
                                            <td>300</td>
                                            <td>Medium</td>
                                        </tr>
                                        <tr>
                                            <td>Article: Innovative Technology Behind FreshlyBrewed's Superior Coffee</td>
                                            <td>8,000</td>
                                            <td>300</td>
                                            <td>Medium</td>
                                        </tr>

                                        <tr>
                                            <td>Facebook</td>
                                            <td>15,000</td>
                                            <td>1,200</td>
                                            <td>Very High</td>
                                        </tr>
                                        <tr>
                                            <td>Instagram</td>
                                            <td>12,000</td>
                                            <td>900</td>
                                            <td>High</td>
                                        </tr>
                                        <tr>
                                            <td>Tiktok</td>
                                            <td>50,000</td>
                                            <td>20,000</td>
                                            <td>Very High</td>
                                        </tr>
                                        <tr>
                                            <td>Google Ads</td>
                                            <td>20,000</td>
                                            <td>1,500</td>
                                            <td>High</td>
                                        </tr>
                                        <!-- Add more platforms as needed -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Marketing Management End -->
             
            <!-- Marketing Analysis Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Marketing Analysis</h6>
                            <p>Analyze marketing performance data and generate periodic marketing reports. Identify market trends and support strategic marketing decisions.</p>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Metric</th>
                                            <th>Value</th>
                                            <th>Change</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Total Visits</td>
                                            <td>150,000</td>
                                            <td>+10%</td>
                                        </tr>
                                        <tr>
                                            <td>Total Interactions</td>
                                            <td>25,000</td>
                                            <td>+15%</td>
                                        </tr>
                                        <tr>
                                            <td>Brand Awareness</td>
                                            <td>High</td>
                                            <td>Stable</td>
                                        </tr>
                                        <tr>
                                            <td>Conversion Rate</td>
                                            <td>5%</td>
                                            <td>+2%</td>
                                        </tr>
                                        <!-- Add more metrics as needed -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Marketing Analysis End -->

            <!-- Future Strategy Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Future Strategy</h6>
                            <p>Based on the current marketing performance, here are some proposed strategies for the future:</p>
                            <ul>
                                <li>Increase investment in social media marketing, particularly on platforms like TikTok and Instagram where engagement is high.</li>
                                <li>Develop more engaging content to boost interactions on articles and other platforms.</li>
                                <li>Expand Google Ads campaigns to reach a broader audience and increase brand awareness.</li>
                                <li>Implement a referral program to leverage word-of-mouth marketing and increase organic growth.</li>
                                <li>Analyze customer feedback to improve product offerings and customer satisfaction.</li>
                                <li>Collaborate with influencers and bloggers to enhance brand visibility and credibility.</li>
                                <li>Utilize data analytics to identify and target high-potential customer segments more effectively.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Future Strategy End -->
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js_dashboard/main.js"></script>
        
</body>

</html>