<?php
    class logout extends controller{
        static public function a(){
            session_start();
            unset($_SESSION["data"]);
            session_destroy();
            header("location: http://localhost:8080/Ecommerce-Website/client/home/index");
        }   
    }
?>