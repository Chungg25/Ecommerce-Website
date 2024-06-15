<?php
    class loginModels extends database {
        public function login($email, $password){
            $a = new Database();
            $a->connect();
            $sql = "SELECT * FROM users where email = '$email' and password = '$password' and is_active =1 ";
            return mysqli_query($a->conn, $sql);
        }
    }
?>