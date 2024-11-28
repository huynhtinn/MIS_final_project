<?php
session_start();
include 'db.php';

// Handle Add to Cart action
if (isset($_GET['action']) && $_GET['action'] == 'add') {
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit();
    }

    if (isset($_POST['product_name']) && isset($_POST['product_price'])) {
        $product_id = $_GET['id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];

        $cart_item = array(
            'id' => $product_id,
            'name' => $product_name,
            'price' => $product_price,
            'quantity' => 1
        );
 
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
            if (isset($cart[$product_id])) {
                $cart[$product_id]['quantity'] += 1;
            } else {
                $cart[$product_id] = $cart_item;
            }
        } else {
            $cart = array($product_id => $cart_item);
        }

        $_SESSION['cart'] = $cart;

        header('Location: cart.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tea Store</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
                <a href="index.php" class="navbar-brand">
                    <img class="img-fluid" src="img/logo.png" alt="Logo">
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="about.php" class="nav-item nav-link">About</a>
                        <a href="product.php" class="nav-item nav-link">Products</a>
                        <a href="store.php" class="nav-item nav-link">Store</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu bg-light rounded-0 m-0">
                                <a href="feature.php" class="dropdown-item">Features</a>
                                <a href="blog.php" class="dropdown-item">Blog Article</a>
                                <a href="testimonial.php" class="dropdown-item">Feedbacks</a>
                            </div>
                        </div>
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="border-start ps-4 d-none d-lg-block">
                        <button type="button" class="btn btn-sm p-0"><i class="fa fa-search"></i></button>
                        <a href="cart.php" class="btn btn-sm p-0 ms-3"><i class="fa fa-shopping-cart"></i></a>
                        <a href="user.php" class="btn btn-sm p-0 ms-3"><i class="fa fa-user"></i></a>
                        <a href="logout.php" class="btn btn-sm p-0 ms-3"><i class="fa fa-sign-out-alt"></i> Logout</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Store</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Store</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Store Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Online Store</p>
                <h1 class="display-6">Discover the diverse and delightful flavors of our premium teas</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="img/store-product-4.jpg" alt="">
                        <div class="p-4">
                            <div class="text-center mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <h4 class="mb-3">Berry Bliss</h4>
                            <p>A refreshing drink featuring a perfect blend of strawberries, raspberries, and blueberries. Garnished with rosemary and served over ice, this beverage is as delightful to look at as it is to taste.</p>
                            <h4 class="text-primary">$19.00</h4>
                        </div>
                        <div class="store-overlay">
                            <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">More Detail <i class="fa fa-arrow-right ms-2"></i></a>
                            <form method="post" action="store.php?action=add&id=1">
                                <input type="hidden" name="product_name" value="Berry Bliss">
                                <input type="hidden" name="product_price" value="19.00">
                                <button type="submit" class="btn btn-dark rounded-pill py-2 px-4 m-2">Add to Cart <i class="fa fa-cart-plus ms-2"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="img/store-product-5.jpg" alt="">
                        <div class="p-4">
                            <div class="text-center mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <h4 class="mb-3">Pomegranate Sparkle</h4>
                            <p>Fresh pomegranate juice with floating pomegranate seeds, garnished with a sprig of rosemary. This drink is invigorating and full of energy.</p>
                            <h4 class="text-primary">$19.00</h4>
                        </div>
                        <div class="store-overlay">
                            <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">More Detail <i class="fa fa-arrow-right ms-2"></i></a>
                            <form method="post" action="store.php?action=add&id=2">
                                <input type="hidden" name="product_name" value="Pomegranate Sparkle">
                                <input type="hidden" name="product_price" value="19.00">
                                <button type="submit" class="btn btn-dark rounded-pill py-2 px-4 m-2">Add to Cart <i class="fa fa-cart-plus ms-2"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="img/store-product-6.jpg" alt="">
                        <div class="p-4">
                            <div class="text-center mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <h4 class="mb-3">Café Mocha Delight</h4>
                            <p>A hot cup of mocha coffee topped with smooth milk foam, served on a wooden tray with roasted coffee beans. This drink offers a rich and warming flavor experience.</p>
                            <h4 class="text-primary">$19.00</h4>
                        </div>
                        <div class="store-overlay">
                            <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">More Detail <i class="fa fa-arrow-right ms-2"></i></a>
                            <form method="post" action="store.php?action=add&id=3">
                                <input type="hidden" name="product_name" value="Café Mocha Delight">
                                <input type="hidden" name="product_price" value="19.00">
                                <button type="submit" class="btn btn-dark rounded-pill py-2 px-4 m-2">Add to Cart <i class="fa fa-cart-plus ms-2"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="img/store-product-7.jpg" alt="">
                        <div class="p-4">
                            <div class="text-center mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <h4 class="mb-3">Purple Passion Juice</h4>
                            <p>A vibrant purple drink served in a mason jar, with a refreshing blend of mixed berries and a hint of mint. Perfect for a hot day to rejuvenate your senses.</p>
                            <h4 class="text-primary">$19.00</h4>
                        </div>
                        <div class="store-overlay">
                            <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">More Detail <i class="fa fa-arrow-right ms-2"></i></a>
                            <form method="post" action="store.php?action=add&id=4">
                                <input type="hidden" name="product_name" value="Purple Passion Juice">
                                <input type="hidden" name="product_price" value="19.00">
                                <button type="submit" class="btn btn-dark rounded-pill py-2 px-4 m-2">Add to Cart <i class="fa fa-cart-plus ms-2"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="img/store-product-8.jpg" alt="">
                        <div class="p-4">
                            <div class="text-center mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <h4 class="mb-3">Iced Coffee Bliss</h4>
                            <p>An invigorating iced coffee topped with frothy bubbles, served in a glass with a straw. This refreshing beverage is perfect for those who need a caffeine boost.</p>
                            <h4 class="text-primary">$19.00</h4>
                        </div>
                        <div class="store-overlay">
                            <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">More Detail <i class="fa fa-arrow-right ms-2"></i></a>
                            <form method="post" action="store.php?action=add&id=5">
                                <input type="hidden" name="product_name" value="Iced Coffee Bliss">
                                <input type="hidden" name="product_price" value="19.00">
                                <button type="submit" class="btn btn-dark rounded-pill py-2 px-4 m-2">Add to Cart <i class="fa fa-cart-plus ms-2"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="img/store-product-9.jpg" alt="">
                        <div class="p-4">
                            <div class="text-center mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <h4 class="mb-3">Matcha Mint Cooler</h4>
                            <p>A refreshing green drink made with matcha and mint, served in a mason jar with a straw. This unique blend offers a revitalizing and healthful experience.</p>
                            <h4 class="text-primary">$19.00</h4>
                        </div>
                        <div class="store-overlay">
                            <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">More Detail <i class="fa fa-arrow-right ms-2"></i></a>
                            <form method="post" action="store.php?action=add&id=6">
                                <input type="hidden" name="product_name" value="Matcha Mint Cooler">
                                <input type="hidden" name="product_price" value="19.00">
                                <button type="submit" class="btn btn-dark rounded-pill py-2 px-4 m-2">Add to Cart <i class="fa fa-cart-plus ms-2"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="img/store-product-10.jpg" alt="">
                        <div class="p-4">
                            <div class="text-center mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <h4 class="mb-3">Mango Sunrise</h4>
                            <p>An enticing orange drink infused with the sweetness of ripe mango pieces, served in a glass. This tropical delight is a perfect way to brighten your day.</p>
                            <h4 class="text-primary">$19.00</h4>
                        </div>
                        <div class="store-overlay">
                            <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">More Detail <i class="fa fa-arrow-right ms-2"></i></a>
                            <form method="post" action="store.php?action=add&id=7">
                                <input type="hidden" name="product_name" value="Mango Sunrise">
                                <input type="hidden" name="product_price" value="19.00">
                                <button type="submit" class="btn btn-dark rounded-pill py-2 px-4 m-2">Add to Cart <i class="fa fa-cart-plus ms-2"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="img/store-product-11.jpg" alt="">
                        <div class="p-4">
                            <div class="text-center mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <h4 class="mb-3">Fruit Fantasy Fizz</h4>
                            <p>A playful pink drink featuring a medley of fruits and bubbles, served in a tall glass with a straw. This fun and fruity concoction is sure to delight your taste buds.</p>
                            <h4 class="text-primary">$19.00</h4>
                        </div>
                        <div class="store-overlay">
                            <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">More Detail <i class="fa fa-arrow-right ms-2"></i></a>
                            <form method="post" action="store.php?action=add&id=8">
                                <input type="hidden" name="product_name" value="Fruit Fantasy Fizz">
                                <input type="hidden" name="product_price" value="19.00">
                                <button type="submit" class="btn btn-dark rounded-pill py-2 px-4 m-2">Add to Cart <i class="fa fa-cart-plus ms-2"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="img/store-product-12.jpg" alt="">
                        <div class="p-4">
                            <div class="text-center mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <h4 class="mb-3">Watermelon Refresher</h4>
                            <p>A delightful red drink with fresh watermelon pieces, served in a glass mug. This beverage is both hydrating and packed with flavor, ideal for summer.</p>
                            <h4 class="text-primary">$19.00</h4>
                        </div>
                        <div class="store-overlay">
                            <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">More Detail <i class="fa fa-arrow-right ms-2"></i></a>
                            <form method="post" action="store.php?action=add&id=9">
                                <input type="hidden" name="product_name" value="Watermelon Refresher">
                                <input type="hidden" name="product_price" value="19.00">
                                <button type="submit" class="btn btn-dark rounded-pill py-2 px-4 m-2">Add to Cart <i class="fa fa-cart-plus ms-2"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                
                
                
            </div>
        </div>
    </div>
    <!-- Store End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>


<script>
    document.querySelectorAll('form[action*="store.php?action=add"]').forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(this);
            fetch(this.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    fetchSalesData(); // Update the chart data
                }
            });
        });
    });
</script>