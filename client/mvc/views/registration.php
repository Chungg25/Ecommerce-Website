<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <base href="http://localhost:8080/Ecommerce-Website/client/mvc/assets">
    <link rel="stylesheet" href="../mvc/assets/css/registration.css">
</head>

<body>
    <div class="register">
        <h1>Registration</h1>
        <form action="http://localhost:8080/Ecommerce-Website/client/registration/registerAction" method="post">
            <div class="input-box">
                <input type="text" placeholder="Enter Your Name" required name="name">
            </div>
            <div class="input-box">
                <input type="email" placeholder="Enter Your Email" required name="email">
            </div>
            <div class="input-box">
                <input type="text" placeholder="Create Password" required name="pass">
            </div>
            <!-- <div class="policy">
                <input type="checkbox">
                <h3>I accept terms & conditions</h3>
            </div> -->
            <div class="bt">
                <input type="submit" value="Register Now" name="sign">
            </div>
            <div class="text">
                <h3>Already have an account? <a href="http://localhost:8080/Ecommerce-Website/client/login">Login Here</a></h3>
            </div>
        </form>
    </div>

</body>

</html>