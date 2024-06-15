<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Admin Dashboard</h4>
    </div>
   

    <div class="px-5">

        <div class="row mt-5">
            <div class="col-12 col-md-4 col-xl-3">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4 bg-danger  d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-money-bills text-white fs-4"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-title fw-medium fs-5">Đơn Hàng</p>
                                <?php
                                    echo "<h5 class='fw-bold'>$data[order]</h5>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-xl-3">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4 bg-success  d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-dollar-sign text-white fs-4"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-title fw-medium fs-5">Tổng Doanh Thu</p>
                                <?php
                                    echo "<h5 class='fw-bold'>$data[revenue]$</h5>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-xl-3">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4 bg-primary  d-flex align-items-center justify-content-center">
                            <i class="fa-brands fa-slack text-white fs-4"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-title fw-medium fs-5">Sản Phẩm</p>
                                <?php
                                    echo "<h5 class='fw-bold'>$data[product]</h5>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-xl-3">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4 bg-warning d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-calendar-days fs-4 text-white"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-title fw-medium fs-5">Báo Cáo</p>
                                <h5 class="fw-bold">12</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="p-4 shadown-sm border rounded-2">
                <p class="fs-5 fw-bold mb-4">Đơn Hàng Cần Xác Nhận</p>

                <table class="table table-striped">
                    <thead>
                        <th>Khách Hàng</th>
                        <th>Ngày Đặt Hàng</th>
                        <th>Giỏ Hàng</th>
                        <th>Trạng Thái</th>
                        <th>Thao Tác</th>
                    </thead>

                    <tbody>
                        <?php
                            while($row = mysqli_fetch_assoc($data['status'])){
                                echo "<tr>";
                                echo "<td>" . $row['username'] . "</td>"; 
                                echo "<td>" . date("H:i:s d-m-Y", strtotime($row['created_at'])) . "</td>";
                                echo "<td>" . $row['quantity'] . "</td>"; 
                                echo "<td>";

                                if ($row['status'] == 'Cho xac nhan') {
                                    echo '<span class="badge text-bg-primary">Chờ Xác Nhận</span>';
                                } elseif ($row['status'] === 'Da xac nhan') {
                                    echo '<span class="badge text-bg-secondary">Đã Xác Nhận</span>';
                                } elseif ($row['status'] === 'Dang van chuyen') {
                                    echo '<span class="badge text-bg-info">Đang Giao</span>';
                                } elseif ($row['status'] === 'Da giao') {
                                    echo '<span class="badge text-bg-success">Đã Giao</span>';
                                } elseif ($row['status'] === 'Da huy') {
                                    echo '<span class="badge text-bg-danger">Đã Hủy</span>';
                                }
                                echo "</td>";
                                echo "<td>";
                                echo '<a class="btn btn-danger" href="http://localhost:8080/Ecommerce-Website/admin/order/detail/' . $row['order_id'] . '"><i class="fa-solid fa-eye"></i></a>';

                                echo '<a class="update btn btn-primary" data-id="' . $row['order_detail_id'] . '">';
                                echo '<i class="fa-solid fa-check"></i>';
                                echo '</a>';
                                echo "</td>";
                                echo "</tr>";
                            }
                        ?>
                        <?php
                            if(count($data) == 0){
                                echo "<td colspan='5' class='text-center'>Bạn không có đơn hàng cần xác nhận</td>";
                            }
                        ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th colspan="5">
                                <a href="http://localhost:8080/Ecommerce-Website/admin/order/order">Xem tất cả đơn hàng <i class="fa-solid fa-arrow-right"></i></a>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        

        <div class="row mt-5">
            <div class="col-12 col-md-7 shadow-sm border rounded-2">
                <div class="chart-header d-flex align-items-center justify-content-between p-4">
                    <p class="fs-5 fw-bold">Biểu Đồ Doanh Thu</p>

                    <select ng-model="selectedMonth" ng-change="updateChartData()" class="form-control w-25">
                        <option value="">Tất cả</option>
                        <option ng-repeat="month in months" value="{{month}}">Tháng {{month}}</option>
                    </select>
                </div>
                <canvas id="myChart"></canvas>

            </div>

            <div class="col-12 col-md-5">
                <div class="p-4 shadow-sm border rounded-2">
                    <div class="bloc-title">
                        <p class="fw-bold fs-5">Khách Hàng Mới</p>
                    </div>

                    <div>
                        <div class="card mb-3">
                            <div class="row g-0 px-4 py-2">
                                <div class="col-md-2 d-flex align-items-center justify-content-between">
                                    <img src="../mvc/assets/img/avatar.jpg"
                                        class="img-fluid rounded-circle w-100 m-auto h-auto" alt="...">
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h5 class="card-title">Đặng Thị Thanh Huyền</h5>
                                            <p class="mb-0 text-secondary fs-6">Truy Cập 25 Phút Trước</p>
                                        </div>

                                        <a href="" class="badge text-bg-primary">Xem Chi Tiết</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="row g-0 px-4 py-2">
                                <div class="col-md-2 d-flex align-items-center justify-content-between">
                                    <img src="../mvc/assets/img/avatar.jpg"
                                        class="img-fluid rounded-circle w-100 m-auto h-auto" alt="...">
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h5 class="card-title">Chung Thái Kiệt</h5>
                                            <p class="mb-0 text-secondary fs-6">Đang Trực Tuyến</p>
                                        </div>

                                        <a href="" class="badge text-bg-primary">Xem Chi Tiết</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="shadow-sm border rounded-2 p-4">
                <p class="mb-0 fw-bold fs-5 mb-4">Bài Viết Mới Nhất</p>

                <table class="table table-striped">
                    <thead>
                        <th>Tiêu Đề</th>
                        <th>Tác Giả</th>
                        <th>Ngày Đăng</th>
                        <th>Thao Tác</th>
                    </thead>

                    <tbody>
                        <tr>
                            <td>CHÀO BẠN MỚI - APP TOKYOLIFE TẶNG MIỄN PHÍ MẶT NẠ SỦI BỌT DƯỠNG DA TOKYOLIFE
                            </td>
                            <td>Admin</td>
                            <td>12-04-2023</td>
                            <td>
                                <a href="" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <a href="" class="btn btn-primary">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>TokyoLife được vinh danh “Giải thưởng Hành động vì Cộng đồng”
                            </td>
                            <td>Trần Công Minh</td>
                            <td>12-04-2023</td>
                            <td>
                                <a href="" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <a href="" class="btn btn-primary">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>HAPPY 8/3 TẶNG MIỄN PHÍ NƯỚC HOA PHÁP DÀNH RIÊNG THÀNH VIÊN APP</td>
                            <td>Admin</td>
                            <td>12-04-2023</td>
                            <td>
                                <a href="" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <a href="" class="btn btn-primary">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>TÍCH CỰC ĐÀO TẠO NGHỀ GẮN VỚI GIẢI QUYẾT VIỆC LÀM NGƯỜI KHUYẾT TẬT
                            </td>
                            <td>Trần Công Minh</td>
                            <td>12-04-2023</td>
                            <td>
                                <a href="" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <a href="" class="btn btn-primary">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>CHÀO BẠN MỚI - APP TOKYOLIFE TẶNG MIỄN PHÍ MẶT NẠ SỦI BỌT DƯỠNG DA TOKYOLIFE
                            </td>
                            <td>Admin</td>
                            <td>12-04-2023</td>
                            <td>
                                <a href="" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <a href="" class="btn btn-primary">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $(".update").click(function(e){
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            url: 'http://localhost:8080/Ecommerce-Website/admin/order/update/' + id,
            type: 'post',
            success: function(data){
                // alert(response);
                location.reload();
            }
        });
    });
});
</script>