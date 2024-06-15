<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
<section id="prodetails" class="section-p1">
    <div class="single-pro-image">
        <img src="<?php echo $data["image"] ?>" width="100%" id="MainImg" alt="">
        <div class="small-img-group">
            <div class="small-img-col">
                <img src="../mvc/assets/img/products/f1.jpg" width="100%" class="small-img" alt="">
            </div>
            <div class="small-img-col">
                <img src="../mvc/assets/img/products/f2.jpg" width="100%" class="small-img" alt="">
            </div>
            <div class="small-img-col">
                <img src="../mvc/assets/img/products/f3.jpg" width="100%" class="small-img" alt="">
            </div>
            <div class="small-img-col">
                <img src="../mvc/assets/img/products/f4.jpg" width="100%" class="small-img" alt="">
            </div>
        </div>
    </div>
    <div class="single-pro-details">
        <h6>Home / <?php echo $data["category_name"] ?></h6>
        <h4><?php echo $data["name"] ?></h4>
        <h2 id="price">$<?php echo $data["price"] ?></h2>
        <div class="a123">
            <select name="" id="size">
                <option>Select Size</option>
                <option>S</option>
                <option>M</option>
                <option>L</option>
                <option>XL</option>
            </select>
            <select name="" id="color">
                <option>Select Color</option>
                <option>Red</option>
                <option>Blue</option>
                <option>Green</option>
                <option>Yellow</option>
                <option>White</option>
                <option>Black</option>
                <option>Pink</option>
            </select>
            <input type="number" value="1" id="quantity" min="1">
        </div>
        <button class="normal" id="addToCart">Add To Cart</button>
        <h4>Product Details</h4>
        <span>The Gildan Ultra Cotton T-shirt is made from a substantial 6.0oz. per
            sq.yd.fabric constructed from 100% cotton, this classic fit preshrunk jersey
            knit provides unmatched comfort with each wear
        </span>

    </div>


</section>


<section id="product1" class="section-p1">
    <h2>New Arrivals</h2>
    <p>Summer Collection New Morden Design</p>
    <div class="pro-container">
        <div class="pro">
            <img src="../mvc/assets/img/products/n1.jpg" alt="img">
            <div class="des">
                <span>adidas</span>
                <h5>Cartoons Astronaut T-Shirts</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>$78</h4>
            </div>
            <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
        </div>
        <div class="pro">
            <img src="../mvc/assets/img/products/n2.jpg" alt="img">
            <div class="des">
                <span>adidas</span>
                <h5>Cartoons Astronaut T-Shirts</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>$78</h4>
            </div>
            <a href=""><i class="fal fa-shopping-cart cart"></i></a>
        </div>
        <div class="pro">
            <img src="../mvc/assets/img/products/n3.jpg" alt="img">
            <div class="des">
                <span>adidas</span>
                <h5>Cartoons Astronaut T-Shirts</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>$78</h4>
            </div>
            <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
        </div>
        <div class="pro">
            <img src="../mvc/assets/img/products/n4.jpg" alt="img">
            <div class="des">
                <span>adidas</span>
                <h5>Cartoons Astronaut T-Shirts</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>$78</h4>
            </div>
            <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#addToCart").click(function() {
        var size = $("#size").val();
        var quantity = $("#quantity").val();
        var path = window.location.pathname;
        var pathParts = path.split('/');
        var encodedUserId = pathParts[pathParts.length - 2];

        var user_id = atob(encodedUserId);
        var product = pathParts[pathParts.length - 1];

        var product_id = atob(product);
        var color = $("#color").val();
        var price = $("#price").text().replace('$', ''); // Add a semicolon at the end of this line
        var data = {
            size: size,
            quantity: quantity,
            price: price,
            user_id: user_id,
            color: color,
            product_id: product_id,
        };
        for (var property in data) {
            if (data.hasOwnProperty(property) && typeof data[property] === 'string') {
                data[property] = data[property].replace(/\s/g, '/');
            }
        }
        var queryString = "";
        for (var key in data) {
            if (data.hasOwnProperty(key)) {
                queryString += key + "=" + data[key] + "/";
            }
        }
        queryString = queryString.slice(0, -1);
        console.log(queryString);
        $.ajax({
            url: 'http://localhost:8080/Ecommerce-Website/client/cart/add/' + queryString,
            type: 'post',
            success: function(response) {
                // console.log(response);
                alert('Product added to cart successfully');
            }
        });
    });
});
</script>