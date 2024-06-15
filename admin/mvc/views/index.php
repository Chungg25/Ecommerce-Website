<!DOCTYPE html>
<html lang="en" ng-app="TokyoLife">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <base href="http://localhost:8080/Ecommerce-Website/admin/mvc/assets">
    <link rel="stylesheet" href="../mvc/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../mvc/assets/css/style.css">
    
    <!--fontawesome-->
    <script src="https://kit.fontawesome.com/d99fedf711.js" crossorigin="anonymous"></script>

    <!--sweetalert-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--pdfmake-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/vfs_fonts.js"></script>

    <!--chartjs-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!--excel-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js"></script>
    <script lang="javascript" src="https://cdn.sheetjs.com/xlsx-0.20.2/package/dist/xlsx.full.min.js"></script>

    <script src="./src/app.js"></script>

    <!--switchery-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.js"></script>
    <div class="wrapper">
        <?php include('./mvc/views/layouts/sidebar.php'); ?>
        <?php
             
        ?>
        <div class="main">

            <?php include('./mvc/views/layouts/header.php'); ?>
            <div class="content">
                <?php
                    $app = new app();
                    $a = $app->getAction();
                    if($a == "index"){
                        include('dashboard.php');
                    }else{
                        call_user_func_array([$app->getController(), $a], $app->getParams());
                    }
                ?>

            </div>

        </div>
        
    </div>

</html>