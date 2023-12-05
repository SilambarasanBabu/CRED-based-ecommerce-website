<?php
  include('includes/connect.php');
  include('functions/common_function.php');
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecom Site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
      body{
        overflow-x: hidden;
        background: #dee2e6 !important;
      }

      .st-title{
        background: #dee2e6 !important;
      }

      .st-card{
        border: 2px solid black;
        margin-left: 6px;
        background: #dee2e6 !important;
      }
    </style>
</head>
<body>
    <!-- Nav bar -->
<div class="container-fluid p-0">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <img src="images/logo1.png" alt="logo" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#cat">Products</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#features">Features</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.html">Login</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item (); ?></sup></a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total price: <?php total_price(); ?>/-</a>
        </li>
      </ul>
      <form class="d-flex" action="search_products.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>
</div>


<?php 
  cart();
?>
<!-- secondary nav bar -->

<nav class="navbar  navbar-expand-lg navbar-dark bg-secondary">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <?php
            getcategories();
          ?>
  </ul>
</nav>


<!-- title-->

<div class="bg-light st-title">
  <h3 class="text-center">Book Hub</h3>
  <p class="text-center">Today a reader, tomorrow a leader.</p>
</div>

<!-- Hero section -->
<main>
        <section class="section-hero section">
            <div class="container grid grid-two-column">
                <div class="section-hero-data">
                    <p class="Hero-top-data">
                        Get Your Book collections
                    </p>
                    <h1 class="Hero-heading">The Book-Hub</h1>
                    <p class="Hero-para">Dive into a world of endless possibilities. Find your next adventure, ignite your imagination, and lose yourself in the pages of a captivating story.
                    </p>
                    <div>
                        <a href="#" class="explore-btn">Explore</a>
                    </div>
                </div>
                <div class="section-hero-image">
                    <img src="images/hero.png" alt="banner" class="hero-image">
                </div>
            </div>
        </section>
    </main>

<!-- getting dynamic products -->

<div class="row" id="cat">
  <h2 class="ptitle">Available Products:</h2>
  <div class="col-md-12">
  <div class="row">
    <?php
      getproducts();
      get_unique_categories();
    ?>
    </div>
    </div>
  </div>
</div>

<hr>
<div class="features" id="features">
        <div class="feature">
            <img class="featureImg" src="images/shipping.png" alt="shipping image">
            <span class="featureTitle">FREE SHIPPING</span>
            <span class="featureDes">Free worldwide shipping on all orders.</span>
        </div>
        <div class="feature">
            <img class="featureImg" src="images/return.png" alt="return image">
            <span class="featureTitle">7 DAYS RETURN</span>
            <span class="featureDes">No question return and easy refund in 14 days.</span>
        </div>
        <div class="feature">
            <img class="featureImg" src="images/gift.png" alt="gift image">
            <span class="featureTitle">GIFT CARD</span>
            <span class="featureDes">Buy gift cards and use coupon codes easily.</span>
        </div>
        <div class="feature">
            <img class="featureImg" src="images/letter.png" alt="contact image">
            <span class="featureTitle">CONTACT US!</span>
            <span class="featureDes">Keep in touch via email and support system.</span>
        </div>
    </div>

<hr>
<footer id="contact">
        <div class="footerLeft">
            <div class="footerMenu">
                <h1 class="fMenuTitle">About Us</h1>
                <ul class="flist">
                    <li class="fitem">Company</li>
                    <li class="fitem">Contact</li>
                    <li class="fitem">Careers</li>
                    <li class="fitem">Affiliates</li>
                    <li class="fitem">Stores</li>
                </ul>
            </div>

            <div class="footerMenu">
                <h1 class="fMenuTitle">Useful Links</h1>
                <ul class="flist">
                    <li class="fitem">Support</li>
                    <li class="fitem">Refund</li>
                    <li class="fitem">FAQ</li>
                    <li class="fitem">Feedback</li>
                    <li class="fitem">Stories</li>
                </ul>
            </div>

            <div class="footerMenu">
                <h1 class="fMenuTitle">Products</h1>
                <ul class="flist">
                    <li class="fitem">Poetry</li>
                    <li class="fitem">Fiction</li>
                    <li class="fitem">Non-Fiction</li>
                    <li class="fitem">Drama</li>
                    <li class="fitem">Novel</li>
                </ul>
            </div>
        </div>
        <div class="footerRight">
          <div class="footerRightMenu">
                <h1 class="fMenuTitle">Subscribe to our newsletter</h1>
                <div class="fRightMail">
                    <input type="email" placeholder="Your@gmail.com" class="mailInput">
                    <button class="rightBtn">Join</button>
                </div>
          </div>
          <div class="footerRightMenu">
            <h1 class="fMenuTitle">Follow Us</h1>
            <div class="fRightIcon">
                <img src="images/facebook.png" alt="facebook" class="fRIcon">
                <img src="images/twitter.png" alt="twitter" class="fRIcon">
                <img src="images/instagram.png" alt="instagram" class="fRIcon">
                <img src="images/whatsapp.png" alt="whatsapp" class="fRIcon">
            </div>
          </div>
          <div class="footerRightMenu">
            <span class="copyRight">@Silambarasan Dev. All rights reserved from 2023.</span>
          </div>
        </div>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>