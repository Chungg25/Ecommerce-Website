<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Quản Lý Đơn Hàng</h4>
    </div>
    <div class="px-5">
        <div class="row my-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="invoice-title">
                                <?php
                                    if ($data['status'] == 'Da giao') {
                                        echo '<span class="badge bg-success font-size-12 ms-2">Đã Giao Hàng</span>';
                                    } elseif ($data['status'] == 'Da huy') {
                                        echo '<span class="badge bg-danger font-size-12 ms-2">Đã Hủy</span>';
                                    } elseif ($data['status'] == 'Cho xac nhan') {
                                        echo '<span class="badge bg-warning font-size-12 ms-2">Chờ Xác Nhận</span>';
                                    } elseif ($data['status'] == 'Dang van chuyen') {
                                        echo '<span class="badge bg-info font-size-12 ms-2">Đang Vận Chuyển</span>';
                                    } elseif ($data['status'] == 'Da xac nhan') {
                                        echo '<span class="badge bg-primary font-size-12 ms-2">Đã Xác Nhận, Đang Chờ Vận Chuyển</span>';
                                    }
                                ?>
                                </h4>
                                    <div class="mb-4">
                                        <h2 class="mb-1 text-muted">Thông Tin Đơn Hàng</h2>
                                    </div>
                                </div>

                                <hr class="my-4">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="text-muted">
                                            <h5 class="font-size-16 mb-3">Thông Tin Khách Hàng</h5>
                                            <h5 class="font-size-15 mb-2"><?php echo $data['username'] ?></h5>
                                            <p class="mb-1"><?php echo $data['address'] ?></p>
                                            <p class="mb-1"><?php echo $data['email'] ?></p>
                                            <p><?php echo $data['phone'] ?></p>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-sm-6">
                                        <div class="text-muted text-sm-end">
                                            <div>
                                                <h5 class="font-size-15 mb-1">Phương Thức Thanh Toán</h5>
                                                <p><?php echo $data['payment'] ?></p>
                                            </div>
                                            <div class="mt-4">
                                                <h5 class="font-size-15 mb-1">Phương Thức Vận Chuyển</h5>
                                                <p>
                                                    <?php 
                                                        if ($data['shipping'] == 0) {
                                                            echo 'Thường';
                                                        } elseif ($data['shipping'] == 1) {
                                                            echo 'Hỏa tốc';
                                                        }
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="mt-4">
                                                <h5 class="font-size-15 mb-1">Ngày Đặt Hàng</h5>
                                                <p><?php echo $data['created_at'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->

                                <div class="ms-1 row my-4">
                                    <h5 class="">Thay Đổi Trạng Thái Đơn Hàng</h5>
                                    <select id="orderStatus" class="form-select w-25 text-start" data-id="<?php echo $data['order_detail_id']; ?>">
                                        <option value="Cho xac nhan">Chờ Xác Nhận</option>
                                        <option value="Da xac nhan">Đã Xác Nhận</option>
                                        <option value="Dang van chuyen">Đang Vận Chuyển</option>
                                        <option value="Da giao">Đã Giao Hàng</option>
                                        <option value="Da huy">Đã Hủy</option>
                                    </select>
                                </div>

                                <div class="py-2">
                                    <h5 class="font-size-15">Thông Tin Sản Phẩm</h5>

                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Ảnh</th>
                                                    <th>Tên Sản Phẩm</th>
                                                    <th>Giá</th>
                                                    <th>Số Lượng</th>
                                                    <th>Thành Tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="item in order.items">
                                                    <td>
                                                        <img src="<?php echo $data['image']; ?>"
                                                            class="img-fluid"
                                                            style="width: 200px;">
                                                    </td>
                                                    <td><?php echo $data['name']; ?>
                                                        <small class="text-muted d-block">Kích Thước: <?php echo $data['size_name']; ?></small>
                                                        <small class="text-muted d-block">Màu Sắc: <?php echo $data['color_name']; ?></small>
                                                    </td>
                                                    <td>
                                                        <p class="fw-bold mb-0">
                                                            <?php echo $data['price'] - ($data['price'] * $data['discount']) . '$'?>
                                                        </p>
                                                    </td>
                                                    <td><?php echo $data['quantity']; ?></td>
                                                    <td>
                                                        <p class="fw-bold mb-0">
                                                            <?php echo $data['price'] * $data['quantity'] - ($data['price'] * $data['quantity'] * $data['discount']). '$'?>
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="4" class="text-end">Tổng Tiền</td>
                                                    <td>
                                                        <p class="fw-bold mb-0"><?php echo $data['price'] * $data['quantity'] - ($data['price'] * $data['quantity'] * $data['discount']) . '$' ?></p>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table><!-- end table -->
                                    </div><!-- end table responsive -->
                                    <div class="d-print-none mt-4">
                                        <div class="float-end">
                                            <div>
                                                <a class="btn btn-outline-danger" href='http://localhost:8080/Ecommerce-Website/admin/order/excel/<?php echo $data['order_detail_id']; ?>'>
                                                    Xuất Tệp Excel <i class="fa-solid fa-download"></i>
                                                </a>

                                                <a class="btn btn-outline-dark" href='http://localhost:8080/Ecommerce-Website/admin/order/pdf/<?php echo $data['order_detail_id']; ?>'>>
                                                    Xuất Tệp PDF <i class="fa-solid fa-download"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function() {
    $('#orderStatus').change(function() {
        var status = $(this).val().replace(/ /g, '_');
        status = encodeURIComponent(status);
        console.log(status);
        var id = $('#orderStatus').data('id');

        $.ajax({
            url: 'http://localhost:8080/Ecommerce-Website/admin/order/update_status/' + id + '/' + status,
            type: 'POST',
            success: function(response) {
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