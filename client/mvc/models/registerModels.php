<?php
    class registerModels extends database {
        public function registerUser($name, $password, $email){
            $a = new Database();
            $a->connect();
            $stmt = $a->conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $password, $email);
            return $stmt->execute();
        }
    }
?>
