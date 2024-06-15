<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Quản Lý Sản Phẩm</h4>
    </div>

    <div class="px-5">
        <div class="d-flex justify-content-between align-items-center mt-5">
            <a href="http://localhost:8080/Ecommerce-Website/admin/product/add" class="btn btn-danger">Thêm Sản Phẩm Mới
                <i class="fas fa-plus"></i>
            </a>
        </div>


        <table class="table table-striped my-5">
            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Loại Sản Phẩm</th>
                    <th>Giá Gốc</th>
                    <th>Giảm Giá</th>
                    <th>Flash Sale</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>


            <tbody>
                <?php foreach($data as $index => $product): ?>
                    <tr>
                        <td>
                            <img src="<?php echo $product['image']; ?>" class="img-fluid"
                                style="width: 50px;">
                        </td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['category_name']; ?></td>
                        <td><?php echo "$" .  $product['price']; ?></td>
                        <td><?php echo ($product['discount'] ?? 0) . "%"; ?></td>
                        <td>
                            <input type="checkbox" class="checkbox" data-product-id="<?php echo $product['product_id']; ?>"<?php if ($product['flash'] == 1) echo 'checked'; ?>>
                        </td>
                        <td>
                            <button class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
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
    $('.checkbox').click(function(event) {
        var productId = $(this).data('product-id');
        console.log(productId);
        $.ajax({
            url: 'http://localhost:8080/Ecommerce-Website/admin/product/update_flash/' + productId,
            type: 'GET',
            success: function(data) {
                console.log('AJAX request succeeded');
                // location.reload();
                console.log(productId);
            },
            error: function(error) {
                console.log('AJAX request failed');
            }
        });
    });
});
</script>