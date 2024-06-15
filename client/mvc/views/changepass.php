<?php
    // if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //     $pass1 = $_POST['pass1'];
    //     $pass2 = $_POST['pass2'];
    //     include __DIR__ . '/../../models/connect.php';
    //     include __DIR__ . '/../../models/user.php';
    //     $code = file_get_contents("temp.txt");
    //     $a = checkUser4($pass1, $code);
    //     if ($pass1 == $pass2){
    //         if ($a == TRUE){
    //             header('Location: /PTTKYC_WEB_FINAL/src/views/Login/index.php');
    //         }
    //     else {
    //         $txt_error = "Incorrect password.";
    //         }
    //     }
    // }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Verification</title>
    <link rel="stylesheet" href="../mvc/assets/css/forgot-pass.css">
</head>

<body>
    <div class="container" id="container">
        <div class="form-container">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <h1>Reset Password</h1>
                <h2>Enter new password</h2>
                <p>Please enter your new password.</p>
                <div class="box">
                    <input name="pass1" type="password" id="password" placeholder="New Password" required />
                    <input name="pass2" type="password" id="confirmPassword" placeholder="Confirm Password" required />
                    <?php
                        if(isset($txt_error) && $txt_error!=""){
                            echo "<p style='color: red; padding-bottom: 10px;'>".$txt_error."</p>";
                        }
                    ?>
                    <input type="submit" name="send" value="Continue" style="background:#512da8;color:#fff">
                </div>
            </form>
        </div>
    </div>

</body>

</html>