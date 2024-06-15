<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Quản Lý Người Dùng</h5>
    </div>

    <div class="px-5">

        <div class="d-flex justify-content-between align-items-center mt-5">
            <a href="http://localhost:8080/Ecommerce-Website/admin/user/add" class="btn btn-danger">Thêm Người Dùng Mới
                <i class="fas fa-plus"></i>
            </a>
        </div>
        
        <table class="table table-striped mt-5">
            <thead>
                <th>STT</th>
                <th>Tên Người Dùng</th>
                <th>Email</th>
                <th>Ngày Tạo</th>
                <th>Khoá</th>
                <th>Uỷ Quyền</th>
                <th>Thao Tác</th>
            </thead>
            <tbody>
                <?php foreach($data as $index => $user): ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($user['created_at'])); ?></td>
                        <td>
                            <input type="checkbox" class="checkbox" data-user-id="<?php echo $user['user_id']; ?> "<?php echo $user['is_active'] ? '' : 'checked'; ?> />
                        </td>
                        <td>
                            <?php echo $user['authority'] === 0 ? 'Quản Trị Viên' : 'Khách Hàng'; ?>
                        </td>
                        <td>
                        <a class="editUserButton btn btn-primary" href="http://localhost:8080/Ecommerce-Website/admin/user/edit/<?php echo $user['user_id']; ?>">
                            <i class="fas fa-edit"></i>
                        </a>

                            <button id="removeUserButton" class="removeUserButton btn btn-danger" data-user-id="<?php echo $user['user_id']; ?>">
                                <i class="fas fa-trash"></i>
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
    $('.removeUserButton').click(function(event) {
        var userId = $(this).data('user-id');
        $.ajax({
            url: 'http://localhost:8080/Ecommerce-Website/admin/user/remove/' + userId,
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

<script>
$(document).ready(function() {
    $('.checkbox').click(function(event) {
        var userId = $(this).data('user-id');
        $.ajax({
            url: 'http://localhost:8080/Ecommerce-Website/admin/user/updateActive/' + userId,
            type: 'GET',
            success: function(data) {
                console.log('AJAX request succeeded');
                console.log(userId);
                // location.reload();
            },
            error: function(error) {
                console.log('AJAX request failed');
            }
        });
    });
});
</script>

                        