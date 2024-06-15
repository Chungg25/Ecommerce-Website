<?php
    class dasboardModels extends database {
        public function product(){
            $a = new Database();
            $a->connect();
            $sql = "SELECT sum(quantity) as sum_quantity from `products`";
            $result = mysqli_query($a->conn, $sql);
            $row = mysqli_fetch_assoc($result);
            return $row['sum_quantity'] - $this->product_a();
        }
        
        public function product_a(){
            $a = new Database();
            $a->connect();
            $sql = "SELECT sum(quantity) as count_total_amount from `order_details` WHERE status = 'Da giao'";
            $result = mysqli_query($a->conn, $sql);
            $row = mysqli_fetch_assoc($result);
            return $row['count_total_amount'];
        }

        public function order(){
            $a = new Database();
            $a->connect();
            $sql = "SELECT count(*) from `order_details` WHERE status = 'Da giao'";
            return mysqli_query($a->conn, $sql);
        }

        public function revenue(){
            $a = new Database();
            $a->connect();
            $sql = "SELECT sum(price) from `order_details` WHERE status = 'Da giao'";
            return mysqli_query($a->conn, $sql);
        }

        public function order_status(){
            $a = new Database();
            $a->connect();
            $sql = "SELECT * FROM `orders` 
                JOIN `order_details` ON `order_details`.`order_detail_id` = `orders`.`order_id` 
                JOIN `users` ON `users`.`user_id` = `orders`.`user_id`
                WHERE `order_details`.`status` != 'Da giao'";
            return mysqli_query($a->conn, $sql);
        }

    }