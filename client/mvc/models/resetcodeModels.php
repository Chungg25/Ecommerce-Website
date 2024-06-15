<?php
    class resetcodeModels extends database {
        public function resetcode($code){
            include './mvc/core/sendMail.php';
            $a = new Database();
            $a->connect();
            $b = checkUser3($code);
            if ($b == TRUE){
                // file_put_contents("temp.txt", $code);
                header('Location: http://localhost:8080/Ecommerce-Website/client/changepass/changepass');
            }else {
                $txt_error = "Incorrect code.";
            }
        }
    }
?>