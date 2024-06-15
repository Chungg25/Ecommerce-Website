
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Forgot</title>
    <link rel="stylesheet" href="../mvc/assets/css/forgot-pass.css">
</head>

<body>
    <div class="container" id="container">
        <div class="form-container">
            <form action="http://localhost:8080/Ecommerce-Website/client/forgotpassword/send" method="post">
                <h1>Forgot Password</h1>
                <h2>Mail Address More</h2>
                <p>
                    Enter your email and we'll send you a link to get back
                    into your account.
                </p>
                <input type="email" name='email' placeholder="Email" required />
                <!-- <?php
                if(isset($txt_error) && $txt_error!=""){
                    echo "<p style='color: red; padding-bottom: 10px;'>".$txt_error."</p>";
                }
                ?> -->
                <input class="send" type="submit" name="send" value="Recover Password"  >
            </form>
        </div>
    </div>

</body>


</html>