<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Thêm Người Dùng Mới</h5>
    </div>

    <div class="px-5">
        <div class="row mt-5">
            <div class="col-3 pe-5">
                <div
                    class="p-2 pb-5 d-flex flex-column align-items-center justify-content-between border shadow-sm rounded-3">
                    <img src="../mvc/assets/img/avatar.jpg" alt="" class="img-fluid w-50 m-auto">
                    <input type="file" name="avatar" id="avatar">
                    <label for="" class="avatar">Chọn Ảnh</label>
                </div>
            </div>

            <div class="col-9">
                <div class="p-5 shadow-sm border">
                    <form class="row">
                        <div class="col-12 col-md-6 mb-4">
                            <label for="name" class="form-label">Họ Và Tên <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>

                        <div class="col-12 col-md-6 mb-4">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>

                        <div class="col-12 col-md-6 mb-4">
                            <label for="password" class="form-label">Mật Khẩu <span class="text-danger">*</span></label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="col-12 col-md-6 mb-4">
                            <label for="confirmPassword" class="form-label">Nhập Lại Mật Khẩu <span
                                    class="text-danger">*</span></label>
                            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control">
                        </div>

                        <div class="col-12 col-md-6 mb-4">
                            <label for="phone" class="form-label">Số Điện Thoại </label>
                            <input type="text" name="phone" id="phone" class="form-control" ng-model="phone">
                        </div>

                        <div class="col-12 col-md-6 mb-4"></div>

                        <div class="col-12 col-md-4 mb-4">
                            <label class="form-label">Chọn tỉnh / thành phố</label>
                            <select class="form-control">
                                <option value="">Chọn một tỉnh/thành phố</option>
                            </select>
                        </div>

                        <div class="col-12 col-md-4 mb-4">
                            <label for="district" class="form-label">Quận/Huyện</label>
                            <select class="form-control">
                                <option value="">Chọn một quận/huyện</option>
                            </select>
                        </div>

                        <div class="col-12 col-md-4 mb-4">
                            <label for="ward" class="form-label">Phường/Xã</label>
                            <select class="form-control">
                                <option value="">Chọn một phường/xã</option>
                            </select>
                        </div>

                        <div class="col-12 mb-4">
                            <label for="addressDetail" class="form-label">Nhập địa chỉ cụ thể</label>
                            <input type="text" name="addressDetail" id="addressDetail" class="form-control">
                        </div>

                        <div class="col-12 mb-4">
                            <label for="role" class="form-label">Uỷ Quyền</label>
                            <select name="role" id="role" class="form-select" ng-model="role" ng-init="role='user'">
                                <option value="0">Tài Khoản Khách Hàng</option>
                                <option value="1">Quản Trị Viên</option>
                            </select>
                        </div>

                        <div class="col-12 mb-4">
                            <a class="btn btn-danger" id="add">Thêm Người Dùng</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#add').on('click', function() {
            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var mobile = $('#mobile').val();
            var role = $('#role').val();

            var data = {
                name: name,
                email: email,
                password: password,
                mobile: mobile,
                role: role
            };

            var jsonString = JSON.stringify(data);
            var encodedJson = encodeURIComponent(jsonString);

            console.log(encodedJson);
            $.ajax({
                url: 'http://localhost:8080/Ecommerce-Website/admin/user/addUser/' + encodedJson,
                type: 'GET',
                success: function(queryString) {
                    console.log('AJAX request succeeded');
                    console.log(url);

                }
            });
            
        });
    });
</script>