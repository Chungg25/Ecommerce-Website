<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <base href="http://localhost:8080/Ecommerce-Website/admin/">

    <link rel="stylesheet" href="./mvc/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../mvc/assets/css/style.css">


    <script src="https://kit.fontawesome.com/d99fedf711.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>



    <!--chartjs-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-chart.js/0.10.2/angular-chart.js"></script>
</head>

<body>

    <div class="container my-5 w-25 m-auto">
        <div class="w-100 d-flex align-items-center">
            <img src="./mvc/assets/img/logo.png" class="d-block w-100 m-auto">
        </div>
        <p class="my-3 fw-medium text-center fs-1">Quản Trị Viên</p>
        

        <form method="post" action="login/loginAction">
            <div class="form-group mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label for="password" class="form-label">Mật Khẩu</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <div class="form-group my-3">
                <button type="submit" class="btn btn-danger w-100">Đăng Nhập</button>
            </div>

        </form>
        <?php

            if (count($data) != 0) {
                echo "<p class='text-danger'>$data[0]</p>";
            }
        ?>
        
    </div>

</body>

</html>