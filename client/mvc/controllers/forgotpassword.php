<?php
require_once './mvc/models/forgotpassModels.php';
    class forgotpassword extends controller{

        protected $forgotpassword;

        public function __construct(){
            $this->forgotpassword = new forgotpassModels();
        }

        static public function forgotpassword(){
            self::view('forgotpassword',[]);
        }

        static public function send(){
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $email = $_POST['email'];
            }
            $is = new self();
            
            if($is->sendMail($email)){
                header('Location: http://localhost:8080/Ecommerce-Website/client/resetcode/resetcode');
            } else {
                header('Location: http://localhost:8080/Ecommerce-Website/client/forgotpassword/forgotpassword');
            }
        }

        public function sendMail($email){
            if($this->forgotpassword->forgotpass($email)){
                return TRUE;
            }
            return FALSE;
        }


    }
    
?>