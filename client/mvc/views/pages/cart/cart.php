<link rel="stylesheet" href="../mvc/assets/css/style.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<body>
    <section id="page-header" class="about-header">
        <h2>#let's_talk</h2>
        <p>LEAVE A MESSAGE, We love to hear from you !</p>
    </section>

    <section id="cart" class="section-p1">
        <table>
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $index => $cart) {
                    echo '<tr>';
                    echo "</td>";
                    echo "<td>";
                    echo '<a class="remove btn btn-danger" data-cart-id="'.$cart["cart_id"].'"><i class="fas fa-trash-alt"></i></a>';

                    echo '<a class="update btn btn-primary">';
                    echo '<i class="fa-solid fa-check"></i>';
                    echo '</a>';
                    echo "</td>";
                  
                    echo '<td><img src="' . $cart['image'] . '"></td>';
                    echo '<td>' . $cart['name'] . '</td>';
                    echo '<td>' . $cart['price'] . '</td>';
                    echo '<td>' . $cart['quantity'] . '</td>';
                    echo '</tr>';
                }
            ?>
            </tbody>
        </table>
    </section>
    <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Apply Coupon</h3>
            <div>
                <input type="text" placeholder="Enter Your Coupon" name="couponCode">
                <button class="normal">Apply</button>
            </div>
        </div>

        <div id="subtotal" class="container">
            <h3>Cart Totals</h3>
            <table class="table table-striped">
                <tr>
                    <td>Cart Subtotal</td>
                    <td>
                        <?php
                        $grandTotal = 0;
                        foreach ($data as $index => $cart) {
                            $total = $cart['quantity'] * $cart['price'];
                            $grandTotal += $total;
                        }
                        echo "$ " . number_format($grandTotal, 2);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="shippingMethod" id="shippingMethod1"
                                value="Standard Express">
                            <label class="form-check-label" for="shippingMethod1">
                                Standard Shipping
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="shippingMethod" id="shippingMethod2"
                                value="Express Shipping">
                            <label class="form-check-label" for="shippingMethod2">
                                Express Shipping
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="couponCode">Discount</label>
                        <td id="discount">0</td>
                    </td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong id="total">
                            <?php
                            echo "$ " . number_format($grandTotal, 2);
                            ?>
                        </strong></td>
                </tr>
                <tr>
                    <td>
                        <label for="paymentMethod">Payment Method</label>
                    </td>
                    <td>
                        <form id="checkoutForm" action="" method="post">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod1"
                                    value="online payment">
                                <label class="form-check-label" for="paymentMethod1">
                                    Online Payment
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod3"
                                    value="Cash on Delivery">
                                <label class="form-check-label" for="paymentMethod3">
                                    Cash on Delivery
                                </label>
                            </div>
                            <button type="submit" class="normal">Proceed to checkout</button>
                        </form>
                    </td>
                </tr>
            </table>
            <!-- <button class="normal" type="submit">Proceed to checkout</button> -->
        </div>
    </section>
</body>

</html>
<script>
document.getElementById('shippingMethod2').addEventListener('change', function() {
    var grandTotal = <?php echo $grandTotal; ?>;
    var quantity = <?php echo array_sum(array_column($data, 'quantity')); ?>;
    if (this.value == 'Express Shipping') {
        grandTotal += quantity;
    }
    document.getElementById('total').textContent = " $ " + grandTotal.toFixed(2);
});
document.getElementById('ca')
</script>


<script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('.remove').click(function(e) {
        var id = $(this).data('cart-id');
        $.ajax({
            url: 'http://localhost:8080/Ecommerce-Website/client/cart/remove/' +
                id,
            type: 'get',
            success: function(data) {
                // alert(response);
                location.reload();
            }
        });
    });
});
</script>
<script>
document.getElementById('checkoutForm').addEventListener('submit', function(e) {
    if (document.getElementById('paymentMethod3').checked) {
        this.action = 'http://localhost:8080/Ecommerce-Website/client/successOrder/successOrder';
    } else {
        // Set the action to the URL for other payment methods
        this.action = 'otherPayment.php';
    }
});
</script>
<script>
$(document).ready(function() {
    $('.normal').on('click', function(event) {
        
        var couponCode = $('input[name="couponCode"]').val();
        var grandTotal = <?php echo $grandTotal; ?>;
        var discount = 0;

        if (couponCode === 'a01') {
            discount = grandTotal * 0.02; // 2% discount
        } else if (couponCode === 'b01') {
            discount = grandTotal * 0.03; // 3% discount
        }

        grandTotal -= discount;
        document.getElementById('total').textContent = "$ " + grandTotal.toFixed(2);
        document.getElementById('discount').textContent = "$ " + discount.toFixed(2);
    });
});
</script>