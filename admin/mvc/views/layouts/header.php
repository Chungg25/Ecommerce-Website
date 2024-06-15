<header class="w-100 py-2 text-bg-danger">
    <div class="container">
        <div class="d-flex align-items-center justify-content-end gap-4">
            <button type="button" class="btn btn-sm btn-outline-light position-relative">
                <i class="fa-solid fa-envelope"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    99+
                    <span class="visually-hidden">unread messages</span>
                </span>
            </button>

            <button type="button" class="btn btn-sm btn-outline-light position-relative">
                <i class="fa-solid fa-gear"></i>
                <span
                    class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                    <span class="visually-hidden">New alerts</span>
                </span>
            </button>

            <div class="dropdown">
                <span class="dropdown-toggle d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <img src="../mvc/assets/img/avatar.jpg" class="img-fluid rounded-circle" width="40px">
                    <span>Xin Chào, Admin</span>
                </span>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Thông Tin Cá Nhân</a></li>
                    <li><a class="dropdown-item" href="#">Đổi Mật Khẩu</a></li>
                    <li><a class="dropdown-item" ng-click="logout()">Đăng Xuất</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>