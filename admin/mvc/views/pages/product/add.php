<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Thêm Sản Phẩm Mới</h5>
    </div>


    <div class="px-5">
        <form class="row my-5">
            <div class="col-12 col-md-6 mb-4">
                <label for="name">Tên Sản Phẩm</label>
                <input type="text" class="form-control" id="name">
            </div>

            <div class="col-12 col-md-6 mb-4">
                <label for="category" class="form-label">Loại Sản Phẩm</label>
                <select id="category" class="form-select">
                    <option value="">Chọn Loại Sản Phẩm</option>
                    <option value="">T-Shirt</option>
                    <option value="0">Shirt</option>
                    <option value="1">Pants</option>
                    <option value="2">Shoes</option>
                </select>
            </div>

            <div class=" col-12 col-md-6 mb-4">
                <label for="price">Giá </label>
                <input type="number" class="form-control" id="price" ng-model="price">
            </div>

            <div class="col-12 col-md-6 mb-4">
                <label for="sale">Giảm Giá</label>
                <input type="number" class="form-control" id="sale" ng-model="sale">
            </div>

            <div class="col-12 col-md-6 mb-4">
                <label for="isFlashSale" class="form-label">Tuỳ Chọn Sản Phẩm</label>
                <select id="isFlashSale" class="form-select">
                    <option value="">Chọn</option>
                    <option value="0">Mặc Định</option>
                    <option value="1">Flash Sale</option>
                </select>
            </div>

            <div class="col-12 mb-4">
                <label for="image" class="form-label">Ảnh</label>
                <input type="file" class="form-control" id="images" multiple file-model="images">
            </div>

            <div class="row">
                <div class="col-4 mb-4">
                    <label for="color">Màu Sắc</label>
                    <input type="text" class="form-control" id="color">
                </div>

                <div class="col-4 mb-4">
                    <label for="size">Kích Thước</label>
                    <input type="text" class="form-control" id="size">
                </div>

                <div class="col-4 mb-4">
                    <label for="quantity">Số Lượng</label>
                    <input type="number" class="form-control" id="quantity">
                </div>
            </div>

            <div class="col-12 mb-4">
                <button class="btn btn-danger">
                    Thêm
                    <i class="fas fa-plus"></i>
                </button>
            </div>

            <div class="col-12 mb-4">
                <label for="description">Mô Tả</label>
                <textarea id="description" cols="30" rows="4"
                    class="form-control"> </textarea>
            </div>

            <div class="col-12 mb-4">
                <button class="btn btn-danger" id="add">Thêm Sản Phẩm</button>
            </div>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#add').on('click', function() {
            event.preventDefault();
            var name = $('#name').val();
            var category = "T-Shirt";
            var price = $('#price').val();
            var sale = $('#sale').val();
            var isFlashSale = $('#isFlashSale').val();

            // Assuming there is only one variant for simplicity
            var color = $('#color').val();
            var size = $('#size').val();
            var quantity = $('#quantity').val();

            console.log('Name: ' + name);
            console.log('Category: ' + category);
            console.log('Price: ' + price);
            console.log('Sale: ' + sale);
            console.log('Is Flash Sale: ' + isFlashSale);
            console.log('Color: ' + color);
            console.log('Size: ' + size);
            console.log('Quantity: ' + quantity);

            var data = {
                name: name,
                category: category,
                price: price,
                sale: sale,
                isFlashSale: isFlashSale,
                color: color,
                size: size,
                quantity: quantity
            };
            var jsonString = JSON.stringify(data);
            var encodedJson = encodeURIComponent(jsonString);

            console.log(encodedJson);
            $.ajax({
                url: 'http://localhost:8080/Ecommerce-Website/admin/product/addProduct/' + encodedJson,
                type: 'GET',
                success: function(queryString) {
                    console.log('AJAX request succeeded');
                }
            });
            
        });
    });
</script>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
        if (!isset($_FILES["avatar"])) {
            echo "Dữ liệu không đúng cấu trúc";
            die;
        }

        if ($_FILES["avatar"]['error'] != 0) {
            echo "Dữ liệu upload bị lỗi";
            die;
        }

        $maxfilesize = 800000;
        $allowtypes = array('jpg', 'png', 'jpeg', 'gif');
        $target_dir = './mvc/uploads/';
        $target_file = $target_dir . $data['user_id'] . '.png';

        if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["avatar"]["tmp_name"]);
        if($check !== false) {
        $allowUpload = true;
        } else {
        echo "Không phải file ảnh.";
        $allowUpload = false;
        }
        }

        if ($_FILES["avatar"]["size"] > $maxfilesize) {
        echo "Không được upload ảnh lớn hơn " . $this->maxfilesize . " (bytes).";
        $allowUpload = false;
        }

        $imageFileType = strtolower(pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION));
        if (!in_array($imageFileType, $allowtypes)) {
        echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
        $allowUpload = false;
        }

        if ($allowUpload) {
            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
            echo  "Đã upload thành công.";
            require_once './mvc/models/database.php';
            $database = new Database();
            $database->connect();
            $sql = "UPDATE users SET avatar_url = '$target_file' WHERE user_id = '$data[user_id]'";
            mysqli_query($database->conn, $sql);
            $database->closeDatabase();
            header("Refresh:0");
            
            } else {
            echo "Có lỗi xảy ra khi upload file.";
            }
            } else {
            echo "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
        }
    }
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#update").click(function(e) {
        e.preventDefault();
        var username = $('#username').val();
        console.log(username);
        var email = $('#email').val();
        console.log(email);
        var location = $('#location').val();
        console.log(location);
        var dataIdValue = $('#a').data('id');
        console.log(dataIdValue);

        var phoneValue = $('#tel').val().replace(/\s/g, '');

        var data = {
            phone: phoneValue,
            username: username,
            email: email,
            location: location,
            dataId: dataIdValue
        };

        var queryString = $.param(data);
        queryString = queryString.replace(/&/g, '/');
        console.log(queryString);
        $.ajax({
            url: 'http://localhost:8080/Ecommerce-Website/client/account/update/' + queryString,
            type: 'post',
            success: function(response) {
                console.log(response);
            }
        });
    });
});
</script>
<script>
$(document).ready(function() {
    $("#avatar").click(function() {
        $("#avatarInput").click();
    });
    $("#avatarInput").change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

            // Create a FormData object
            var formData = new FormData();
            // Add the file to the FormData object
            formData.append('avatar', this.files[0]);
        }
    });
});
</script>