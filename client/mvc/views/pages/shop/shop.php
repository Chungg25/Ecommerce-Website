<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech2etc Ecommerce Tutorial</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="./mvc/assets/css/style.css">
    <!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
</head>

<section id="page-header">

    <h2>#stayhome</h2>
    <p>Save more with coupons & up to 70% off!</p>

</section>


<body>
    <div class="shop">
        <div class="filter">
            <div class="box">
                <h4>Price</h4>
                <div class="values">
                    <div>$<span id="first"><?php echo isset($data['s']) ? $data['s'] : '0'; ?></span></div> -
                    <div>$<span id="second"><?php echo isset($data['e']) ? $data['e'] : '1000'; ?></span></div>
                </div>
                <div class="slider" data-value-0="#first" data-value-1="#second" data-range="#third"></div>
            </div>
            <div class="category">
                <h4>Category</h4>
                <input type="checkbox" id="categoryname" name="category1">
                <label for="category"> T-Shirt</label><br>
                <input type="checkbox" id="categoryname" name="category2">
                <label for="category"> Shirt</label><br>
                <input type="checkbox" id="categoryname" name="category3">
                <label for="category"> Pants</label><br>
                <input type="checkbox" id="categoryname" name="category4">
                <label for="category"> Shoes</label><br>
            </div>
        </div>
        <section id="product1" class="section-p1">
            <div class="pro-container">
                <?php foreach($data["product"] as $product): ?>
                <div class="pro">
                    <img src=" <?php echo $product['image']; ?>" alt="Product Image">
                    <div class="des">
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
                <?php endforeach; ?>

            </div>
        </section>
    </div>
    <section id="pagination" class="section-p1">
        <?php for ($i = 1; $i <= $data["total_pages"]; $i++): ?>
        <a href="http://localhost:8080/Ecommerce-Website/client/shop/shop/page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
        <?php
        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        ?>
        <a href="http://localhost:8080/Ecommerce-Website/client/shop/shop/page=<?php echo $current_page + 1; ?>">
            <i class="fal fa-long-arrow-alt-right"></i></a>
    </section>


    <!-- <script src="../js/script.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
    $(document).ready(function() {
        $('a[name="cart"]').click(function(e) {
            e.preventDefault();

            var productId = $(this).data('product_id');

            $.ajax({
                url: './mvc/controllers/addtocart.php',
                method: 'POST',
                data: {
                    product_id: productId,
                    action: 'add'
                },
                success: function(response) {
                    alert('Sản phẩm đã được thêm vào giỏ hàng');
                },
                error: function() {
                    alert('Có lỗi xảy ra, vui lòng thử lại');
                }
            });
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        // Lọc sản phẩm khi thay đổi danh mục
        $('input[name^="category"]').change(function() {
            filterProducts();
        });

        // Lọc sản phẩm khi thay đổi giá tiền
        $('.slider').on('slidestop', function(event, ui) {
            filterProducts();
        });

        function filterProducts() {
            var categories = [];
            $('input[name^="category"]:checked').each(function() {
                categories.push($(this).val());
            });

            var minPrice = $('.slider').slider('values', 0);
            var maxPrice = $('.slider').slider('values', 1);

            $.ajax({
                url: './mvc/controllers/getProducts.php',
                type: 'POST',
                data: {
                    categories: categories,
                    minPrice: minPrice,
                    maxPrice: maxPrice
                },
                success: function(response) {
                    // $('.pro-container').html(response);
                }
            });
        }
    });
    </script>
    <script>
    $('.slider').each(function(e) {

        var slider = $(this),
            width = slider.width(),
            handle,
            handleObj;

        let svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
        svg.setAttribute('viewBox', '0 0 ' + width + ' 83');

        slider.html(svg);
        slider.append($('<div>').addClass('active').html(svg.cloneNode(true)));

        slider.slider({
            range: true,
            values: [<?php echo isset($data['s']) ? $data['s'] : '10'; ?>,
                <?php echo isset($data['e']) ? $data['e'] : '200'; ?>
            ],
            min: 0,
            step: 5,
            max: 200,
            create(event, ui) {

                slider.find('.ui-slider-handle').append($('<div />'));

                $(slider.data('value-0')).html(slider.slider('values', 0).toString().replace(
                    /\B(?=(\d{3})+(?!\d))/g, '&thinsp;'));
                $(slider.data('value-1')).html(slider.slider('values', 1).toString().replace(
                    /\B(?=(\d{3})+(?!\d))/g, '&thinsp;'));
                $(slider.data('range')).html((slider.slider('values', 1) - slider.slider(
                        'values', 0))
                    .toString().replace(/\B(?=(\d{3})+(?!\d))/g, '&thinsp;'));

                setCSSVars(slider);

            },
            start(event, ui) {

                $('body').addClass('ui-slider-active');

                handle = $(ui.handle).data('index', ui.handleIndex);
                handleObj = slider.find('.ui-slider-handle');

            },
            change(event, ui) {
                setCSSVars(slider);
            },
            slide(event, ui) {

                let min = slider.slider('option', 'min'),
                    minRange = slider.slider('option', 'minRange'),
                    max = slider.slider('option', 'max');

                if (ui.handleIndex == 0) {
                    if ((ui.values[0] + minRange) >= ui.values[1]) {
                        slider.slider('values', 1, ui.values[0] + minRange);
                    }
                    if (ui.values[0] > max - minRange) {
                        return false;
                    }
                } else if (ui.handleIndex == 1) {
                    if ((ui.values[1] - minRange) <= ui.values[0]) {
                        slider.slider('values', 0, ui.values[1] - minRange);
                    }
                    if (ui.values[1] < min + minRange) {
                        return false;
                    }
                }

                $(slider.data('value-0')).html(ui.values[0].toString().replace(
                    /\B(?=(\d{3})+(?!\d))/g,
                    '&thinsp;'));
                $(slider.data('value-1')).html(ui.values[1].toString().replace(
                    /\B(?=(\d{3})+(?!\d))/g,
                    '&thinsp;'));
                $(slider.data('range')).html((slider.slider('values', 1) - slider.slider(
                        'values', 0))
                    .toString().replace(/\B(?=(\d{3})+(?!\d))/g, '&thinsp;'));

                setCSSVars(slider);

            },
            stop(event, ui) {

                handle = null;

            }

        });

        var svgPath = new Proxy({
            x: null,
            y: null,
            b: null,
            a: null
        }, {
            set(target, key, value) {
                target[key] = value;
                if (target.x !== null && target.y !== null && target.b !== null && target
                    .a !==
                    null) {
                    slider.find('svg').html(getPath([target.x, target.y], target.b, target
                        .a,
                        width));
                }
                return true;
            },
            get(target, key) {
                return target[key];
            }
        });

        svgPath.x = width / 2;
        svgPath.y = 42;
        svgPath.b = 0;
        svgPath.a = width;
    });

    function getPoint(point, i, a, smoothing) {
        let cp = (current, previous, next, reverse) => {
                let p = previous || current,
                    n = next || current,
                    o = {
                        length: Math.sqrt(Math.pow(n[0] - p[0], 2) + Math.pow(n[1] - p[1], 2)),
                        angle: Math.atan2(n[1] - p[1], n[0] - p[0])
                    },
                    angle = o.angle + (reverse ? Math.PI : 0),
                    length = o.length * smoothing;
                return [current[0] + Math.cos(angle) * length, current[1] + Math.sin(angle) * length];
            },
            cps = cp(a[i - 1], a[i - 2], point, false),
            cpe = cp(point, a[i - 1], a[i + 1], true);
        return `C ${cps[0]},${cps[1]} ${cpe[0]},${cpe[1]} ${point[0]},${point[1]}`;
    }

    function getPath(update, before, after, width) {
        let smoothing = .16,
            points = [
                [0, 42],
                [before <= 0 ? 0 : before, 42],
                update,
                [after >= width ? width : after, 42],
                [width, 42]
            ],
            d = points.reduce((acc, point, i, a) => i === 0 ? `M ${point[0]},${point[1]}` :
                `${acc} ${getPoint(point, i, a, smoothing)}`, '');
        return `<path d="${d}" />`;
    }

    function setCSSVars(slider) {
        let handle = slider.find('.ui-slider-handle');
        slider.css({
            '--l': handle.eq(0).position().left + handle.eq(0).outerWidth() / 2,
            '--r': slider.outerWidth() - (handle.eq(1).position().left + handle.eq(1).outerWidth() /
                2)
        });
    }
    </script>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function() {
    $(".box").click(function(e) {
        var firstValue = $('#first').text();
        var secondValue = $('#second').text();

        console.log(firstValue, secondValue);

        window.location.href = 'http://localhost:8080/Ecommerce-Website/client/shop/shop/page=1/' +
            firstValue + '/' +
            secondValue;
    });
});
</script>