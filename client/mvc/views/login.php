<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Tech2etc Ecommerce Tutorial</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <base href="http://localhost:8080/Ecommerce-Website/client/mvc/assets">
    <link href="../mvc/assets/css/login.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
	// include '../views/socialLogin/facebook_source.php';
	// // include './google_source.php';
	?>
    <div class="login">
        <h1>Login</h1>
        <form action="http://localhost:8080/Ecommerce-Website/client/login/loginAction" method="post">
            <label for="username">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="email" placeholder="Email" id="email" required>
            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="password" placeholder="Password" id="password" required>


            <div class="remember-row">
                <div class="ck">
                    <input type="checkbox" value="remember-me">
                    <span class="label-text">Remember me</span>
                </div>
                <div class="forgot">
                    <p class="forgotPwd">
                        <a class="lnk-toggler"
                            href="http://localhost:8080/Ecommerce-Website/client/forgotpassword/forgotpassword">Forgot
                            password?</a>
                    </p>
                </div>
            </div>
            <input type="submit" value="Login">
            <div id="register">
                <span style="margin-right: 5px;">Do you haven't account?</span> <a
                    href="http://localhost:8080/Ecommerce-Website/client/registration/registration"> Register</a>
            </div>

        </form>

        
        <?php
            if (count($data) != 0) {
                echo "<p class='error-message' >Login failed! Invalid email-id or password!</p>";
            }
        ?>


    </div>
</body>

</html>