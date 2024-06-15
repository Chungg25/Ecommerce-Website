<?php
    class registration extends controller{
        static public function registration(){
            self::view('registration', []);
        }

        static public function registerAction(){
            require_once "./mvc/models/registerModels.php";
            $name = $_POST['name'];
            $password = $_POST['pass'];
            $email = $_POST['email'];
            $registerModel = new registerModels();
            $registerModel->registerUser($name, $password, $email);
            if ($registerModel) {
                header('Location: http://localhost:8080/Ecommerce-Website/client/login/login');
            }else {
                echo "Registration failed";
            }
        }
    }
?>