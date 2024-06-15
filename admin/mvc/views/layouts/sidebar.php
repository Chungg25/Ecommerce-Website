<aside id="sidebar" class="expand shadow-sm border-end">
    <div class="d-flex align-items-center justify-content-between pe-4">
        <button class="toggle-btn" type="button">
            <i class="fa-solid fa-bars"></i>
        </button>

        <div class="sidebar-logo">
            <a href="http://localhost:8080/Ecommerce-Website/admin/dashboard/index">
                <img src="../mvc/assets/img/logo.png" class="img-fluid">
            </a>
        </div>
    </div>
    <ul class="sidebar-nav d-flex flex-column gap-3">
        <li class="sidebar-item">
            <a href="http://localhost:8080/Ecommerce-Website/admin/dashboard/index" class="sidebar-link">
                <i class="fa-solid fa-home"></i>
                <span>Trang Chủ</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="" class="sidebar-link collapsed has-dropdown a" data-bs-toggle="collapse" data-bs-target="#auth"
                aria-expanded="false" aria-controls="auth">
                <i class="fa-solid fa-user-group"></i>
                <span>Người Dùng</span>
            </a>
            <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="http://localhost:8080/Ecommerce-Website/admin/user/user" class="sidebar-link">Quản Lý Người Dùng</a>
                </li>
                <li class="sidebar-item">
                    <a href="http://localhost:8080/Ecommerce-Website/admin/user/add" class="sidebar-link">Thêm Người Dùng Mới</a>
                </li>
                <li class="sidebar-item">
                    <a href="http://localhost:8080/Ecommerce-Website/admin/user/edit" class="sidebar-link">Quản Trị Viên</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown a" data-bs-toggle="collapse" data-bs-target="#category"
                aria-expanded="false" aria-controls="category">
                <i class="fa-solid fa-layer-group"></i>
                <span>Danh Mục</span>
            </a>
            <ul id="category" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="http://localhost:8080/Ecommerce-Website/admin/category/category" class="sidebar-link">Quản Lý Danh Mục</a>
                </li>

                <li class="sidebar-item">
                    <a href="http://localhost:8080/Ecommerce-Website/admin/category/add" class="sidebar-link">Thêm Danh Mục Mới</a>
                </li>

            </ul>
        </li>

        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown a" data-bs-toggle="collapse" data-bs-target="#product"
                aria-expanded="false" aria-controls="product">
                <i class="fa-brands fa-slack"></i>
                <span>Sản Phẩm</span>
            </a>
            <ul id="product" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="http://localhost:8080/Ecommerce-Website/admin/product/product" class="sidebar-link">Quản Lý Sản Phẩm</a>
                </li>
                <li class="sidebar-item">
                    <a href="http://localhost:8080/Ecommerce-Website/admin/product/add" class="sidebar-link">Thêm Sản Phẩm</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown a" data-bs-toggle="collapse" data-bs-target="#discount"
                aria-expanded="false" aria-controls="discount">
                <i class="fa-solid fa-tags"></i>
                <span>Mã Giảm Giá</span>
            </a>
            <ul id="discount" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="http://localhost:8080/Ecommerce-Website/admin/coupon/coupon" class="sidebar-link">Quản Lý Mã </a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown a" data-bs-toggle="collapse" data-bs-target="#order"
                aria-expanded="false" aria-controls="order">
                <i class="fa-solid fa-money-bills"></i>
                <span>Đơn Hàng</span>
            </a>
            <ul id="order" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="http://localhost:8080/Ecommerce-Website/admin/order/order" class="sidebar-link">Quản Lý Đơn Hàng</a>
                </li>

            </ul>
        </li>

        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown a" data-bs-toggle="collapse" data-bs-target="#feedback"
                aria-expanded="false" aria-controls="feedback">
                <i class="fa-solid fa-message"></i>
                <span>Phản Hồi</span>
            </a>
            <ul id="feedback" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="http://localhost:8080/Ecommerce-Website/admin/feedback/feedback" class="sidebar-link">Phản Hồi Khách Hàng</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item">
            <a href="http://localhost:8080/Ecommerce-Website/admin/statistical/statistical" class="sidebar-link">
                <i class="fa-solid fa-chart-simple"></i>
                <span>Thống Kê</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a href="" class="sidebar-link" >
                <i class="fa-solid fa-envelope"></i>
                <span>Hộp Thư</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link" href="http://localhost:8080/Ecommerce-Website/admin">
                <i class="fa-solid fa-right-from-bracket fa-rotate-180"></i>
                <span>Đăng Xuất</span>
        </a>
        </li>
        
    </ul>

    <script src="../mvc/assets/js/navbar.js"></script>
</aside>