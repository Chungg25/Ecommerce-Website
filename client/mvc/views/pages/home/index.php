<link rel="stylesheet" href="../mvc/assets/css/style.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

<body>
    <section id="hero">
        <h4>Trade-in-offer</h4>
        <h2>Super value deals</h2>
        <h1>On all products</h1>
        <p>Save more with coupons & up to 70% off!</p>
        <a href="http://localhost:8080/Ecommerce-Website/client/shop/shop">Shop Now</a>
    </section>

    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="../mvc/assets/img/features/f1.png" alt="img">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="../mvc/assets/img/features/f2.png" alt="img">
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="../mvc/assets/img/features/f3.png" alt="img">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="../mvc/assets/img/features/f4.png" alt="img">
            <h6>Promotions</h6>
        </div>
        <div class="fe-box">
            <img src="../mvc/assets/img/features/f5.png" alt="img">
            <h6>Happy Sell</h6>
        </div>
        <div class="fe-box">
            <img src="../mvc/assets/img/features/f6.png" alt="img">
            <h6>F24/7 Support</h6>
        </div>
    </section>

    <section id="products" class="pt-md-3">
        <h2 class="text-center">Featured Products</h2>
        <p class="text-center">Summer Collection New Morden Design</p>
        <div class="container">
            <div class="row gy-5">
                <?php foreach($data as $index => $product): ?>
                <div class="col-md-3">
                    <div class="card p-3 h-100">
                        <img src="<?php echo $product['image']; ?>" alt="Product Image">
                        <div class="card-body">
                            <span>adidas</span>
                            <h5><?php echo $product['name']; ?></h5>
                            <div class="star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4><?php echo "$" . $product['price']; ?></h4>
                        </div>
                        <?php
                    if(!isset($_SESSION["data"])){
                        echo '<a href="http://localhost:8080/Ecommerce-Website/client/login"><i class="fal fa-shopping-cart cart" id="add"></i></a>';
                    } else {
                        echo '<a class="fal fa-shopping-cart cart add" href="http://localhost:8080/Ecommerce-Website/client/cart/viewIn/' . base64_encode($_SESSION["data"]["user_id"]) . '/' . base64_encode($product['product_id']) . '"></a>';
                    }
                ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

    </section>

    <section id="banner" class="section-m1">
        <h4>Repair Services</h4>
        <h2>Up to <span>70% Off</span> - All t-Shirts & Accessories</h2>
        <button class="normal">Explore More</button>
    </section>


    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            <h4>crazy deals</h4>
            <h2>buy 1 get 1 free</h2>
            <span>The best classic dress is on sale at cara</span>
            <button class="white">Learn More</button>
        </div>
        <div class="banner-box banner-box2">
            <h4>spring/summer</h4>
            <h2>upcomminh season</h2>
            <span>The best classic dress is on sale at cara</span>
            <button class="white">Collection</button>
        </div>

    </section>

    <section id="banner3">
        <div class="banner-box">
            <h2>SEASON SALE</h2>
            <h3>Winter Collection -50% OFF</h3>
        </div>
        <div class="banner-box banner-box2">
            <h2>NEW FOOTWEAR COLLECTION</h2>
            <h3>WSpring / Summer 2022</h3>
        </div>
        <div class="banner-box banner-box3">
            <h2>T-SHIRTS</h2>
            <h3>New Trendy Prints</h3>
        </div>
    </section>


    <script src="./js/script.js"></script>


</body>

</html>