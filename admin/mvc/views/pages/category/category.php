<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Danh Mục</h4>
    </div>

    <div class="px-5">

        <table class="table table-striped mt-5">
            <thead>
                <th>STT</th>
                <th>Tên Danh Mục</th>
                <th>Sản Phẩm</th>
                <th>Thao Tác</th>
            </thead>

            <tbody>
                <?php foreach($data as $index => $category): ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo $category['category_name']; ?></td>
                        <td><?php echo $category['sum'] ?? 0; ?></td>
                        <td>
                        <a class="btn btn-primary" href="http://localhost:8080/Ecommerce-Website/admin/category/viewDetail/<?php echo $category['category_id']; ?>">
                            <i class="fas fa-eye"></i>
                        </a>
                        <button class="remove btn btn-danger" data-category-id="<?php echo $category['category_id']; ?>">
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
        var categoryId = $(this).data('category-id');
        console.log(categoryId);
        $.ajax({
            url: 'http://localhost:8080/Ecommerce-Website/admin/category/removeCate/' + categoryId,
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