<link rel="stylesheet" href="../mvc/assets/css/style_temp.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

<?php
    $data1 = $data['data1'];
    $data = $data['data']; 
?>

<body>
    <div class="container">
        <div class="left-content-avatar">
            <h4>Personal Profile</h4>
            <img id="avatar"
                src="<?php echo isset($data['avatar_url']) ? '.' . $data['avatar_url'] : '../mvc/assets/img/avatar.jpg'; ?>"
                alt="" style="width: 150px; height: 150px; object-fit: cover; border-radius:50%">
            <form method="post" enctype="multipart/form-data">
                <input type="file" name="avatar" id="avatarInput" style="display: none;">
                <input type="submit" name="submit" value="Upload" id="a" style="margin-top: 10px; align:center"
                    data-id="<?php echo $data['user_id']; ?>">
            </form>
        </div>
        <div class="right-content form">
            <div>
                <label for="username">Username</label>
                <div class="icon-container">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" id="username" name="username" value="<?php echo $data['username']; ?>" required>
                </div>
            </div>

            <div>
                <label for="email">Email</label>
                <div class="icon-container">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="text" id="email" name="email" value="<?php echo $data['email']; ?> " required>
                </div>
            </div>

            <div>
                <label for=" tel">Telephone</label>
                <div class="icon-container">
                    <i class="fa-solid fa-phone"></i>
                    <input type="text" id="tel" name="tel" value="<?php echo $data['phone']; ?>" required>
                </div>
            </div>

            <div>
                <label for=" location">Location</label>
                <div class="icon-container">
                    <i class="fa-solid fa-location-dot"></i>
                    <input type="text" id="location" name="location" value="<?php echo $data['address']; ?>" required>
                </div>
            </div>
            <button class=" normal save" id="update">Save change</button>
        </div>
    </div>

    <table class=" table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Type</th>
                <th>Price</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data1 as $order) {
                echo "<tr>";
                echo "<td><img style='width: 50px;' src='{$order['image']}' alt='Order Image'></td>";
                echo "<td>{$order['name']}</td>";
                echo "<td>{$order['category_name']}</td>";
                echo "<td>{$order['price']}</td>";
                echo "<td>{$order['quantity']}</td>";
                echo "<td>{$order['created_at']}</td>";
                echo "<td>{$order['status']}</td>";
                echo "<td>
                    <button class='btn btn-danger'>
                        <i class='fas fa-trash'></i>
                    </button>
                    <button class='btn btn-primary'>
                        <i class='fas fa-edit'></i>
                    </button>
                </td>";
                echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>

</html>
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