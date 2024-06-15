<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Quản Lý Đơn Hàng</h4>
    </div>

    <div class="px-5">
        <table class="table table-striped my-5">
            <thead>
                <tr>
                    <th>Mã Đơn Hàng</th>
                    <th>Người Đặt</th>
                    <th>Ngày Đặt</th>
                    <th>Trạng Thái</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $index => $order): ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo $order['username']; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($order['created_at'])); ?></td>
                        <td>
                        <?php
                            if ($order['status'] == 'Cho xac nhan') {
                                echo '<span class="badge text-bg-primary">Chờ Xác Nhận</span>';
                            } elseif ($order['status'] === 'Da xac nhan') {
                                echo '<span class="badge text-bg-secondary">Đã Xác Nhận</span>';
                            } elseif ($order['status'] === 'Dang van chuyen') {
                                echo '<span class="badge text-bg-info">Đang Giao</span>';
                            } elseif ($order['status'] === 'Da giao') {
                                echo '<span class="badge text-bg-success">Đã Giao</span>';
                            } elseif ($order['status'] === 'Da huy') {
                                echo '<span class="badge text-bg-danger">Đã Hủy</span>';
                            }
                        ?>
                        </td>
                        <td>
                            <a href="http://localhost:8080/Ecommerce-Website/admin/order/detail/<?php echo $order['order_id']; ?>" class="btn btn-sm btn-danger">Xem</a>
                        </td>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>