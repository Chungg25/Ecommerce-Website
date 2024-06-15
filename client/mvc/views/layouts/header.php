<header id="header">
    <a href="http://localhost:8080/Ecommerce-Website/client"><img src="../mvc/assets/img/logo.png" class="logo"
            alt=""></a>
    <div>

        <ul id="navbar">
            <li><a class="active" href="http://localhost:8080/Ecommerce-Website/client">Home</a></li>
            <li><a href="http://localhost:8080/Ecommerce-Website/client/shop/shop">Shop</a></li>
            <li><a href="http://localhost:8080/Ecommerce-Website/client/blog/blog">Blog</a></li>
            <li><a href="http://localhost:8080/Ecommerce-Website/client/about/about">About</a></li>
            <li><a href="http://localhost:8080/Ecommerce-Website/client/contact/contact">Contact</a></li>
            <?php
            if(isset($_SESSION["data"])){
                echo '<li><a href="http://localhost:8080/Ecommerce-Website/client/logout/a">Logout</a></li>';
            } else {
                echo '<li><a href="http://localhost:8080/Ecommerce-Website/client/login">Login</a></li>';
            }
            ?>
            
            <?php
            if(isset($_SESSION["data"])){
                echo '<li id="lg-bag"><a href="http://localhost:8080/Ecommerce-Website/client/cart/cart/' . $_SESSION["data"]["user_id"] . '"><i
                class="far fa-shopping-bag"></i></a></li>';
            } else {
                echo '<li id="lg-bag"><a href="http://localhost:8080/Ecommerce-Website/client/login"><i
                class="far fa-shopping-bag"></i></a></li>';
            }
            ?>

            <?php
            if(isset($_SESSION["data"])) {
                echo '<li id="lg-bag"><a href="http://localhost:8080/Ecommerce-Website/client/account/account/' . $_SESSION["data"]["user_id"] . '"><i></i> ' . $_SESSION["data"]["username"] . '</a></li>';
            } else {
                echo '<li id="lg-bag"><a href="http://localhost:8080/Ecommerce-Website/client/login/login"><i class="fa fa-user-circle-o"></i></a></li>';
            }
            ?>

            <!-- <a href="#" id="close"><i class="far fa-times"></i></a> -->
        </ul>
    </div>
</header>