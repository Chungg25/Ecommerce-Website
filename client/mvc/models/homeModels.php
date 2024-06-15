<?php
    class homeModels extends database {
        public function view(){
            $a = new Database();
            $a->connect();
            $sql = "SELECT * FROM products where flash = 1";
            return mysqli_query($a->conn, $sql);
        }
    }
?>