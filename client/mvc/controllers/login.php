<?php
class login extends controller{
    static public function login(...$params){
        self::view('login', $params);
    }

    
    static public function loginAction(){
        require "./mvc/models/loginModels.php";
        session_start();
        $email = $_POST['email'];
        $password = $_POST['password'];
        echo $_SESSION["data"];
        $a = new loginModels();
        $result = mysqli_num_rows($a->login($email, $password));
        $data = mysqli_fetch_array($a->login($email, $password));
        if ($result == 1) {
            $_SESSION["data"] = $data;
            header('Location: http://localhost:8080/Ecommerce-Website/client/home/index');
        } else {
            header('Location: http://localhost:8080/Ecommerce-Website/client/login/login/failed');
        }
    }
    
}