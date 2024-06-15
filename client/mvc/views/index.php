<!DOCTYPE html>
<html lang="en" ng-app="TokyoLife">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <base href="http://localhost:8080/Ecommerce-Website/client/mvc/assets">
 
    <link rel="stylesheet" href="../mvc/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../mvc/assets/css/style.css">
    
    <!--fontawesome-->
    <script src="https://kit.fontawesome.com/d99fedf711.js" crossorigin="anonymous"></script>

    <!--sweetalert-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--switchery-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.js"></script>
    <div class="wrapper">
        <div class="main">
            <?php include('./mvc/views/layouts/header.php'); ?>
            <div id="content">
                <?php
                    $app = new app();
                    $a = $app->getAction();

                    if($a == "index"){
                        include('./mvc/views/pages/home/index.php');
                    }else{
                        call_user_func_array([$app->getController(), $a], $app->getParams());
                    }
                ?>
            </div>
            <div class="footer">
                <?php include('./mvc/views/layouts/footer.php'); ?>
            </div>
        </div>
    </div>

</html>