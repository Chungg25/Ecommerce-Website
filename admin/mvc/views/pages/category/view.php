<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Danh Mục</h4>
    </div>

    <div class="px-5">


        <table class="table table-striped mt-5">
            <thead>
                <th>STT</th>
                <th>Tên Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Thao Tác</th>
            </thead>

            <tbody>
                <?php foreach($data as $index => $product): ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['quantity']; ?></td>
                        <td>
                        <button class="remove btn btn-danger" data-product-id="<?php echo $product['product_id']; ?>">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function() {
    $('.remove').click(function(event) {
        var productId = $(this).data('product-id');
        $.ajax({
            url: 'http://localhost:8080/Ecommerce-Website/admin/category/remove/' + productId,
            type: 'GET',
            success: function(data) {
                console.log('AJAX request succeeded');
                location.reload();
            },
            error: function(error) {
                console.log('AJAX request failed');
            }
        });
    });
});
</script>