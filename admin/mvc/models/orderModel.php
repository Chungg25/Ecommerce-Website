<?php
    class orderModel extends database {

        protected $data;

        function __construct(){
            $this->data = new Database();
        }

        public function update($id) {
            $this->data->connect();
            $sql = "UPDATE order_details SET status = 'Da giao' WHERE order_detail_id = '$id'";
            return mysqli_query($this->data->conn, $sql);
        }

        public function update_status($id, $status) {
            $this->data->connect();
            $status = str_replace('_', ' ', $status);
            $status = mysqli_real_escape_string($this->data->conn, $status);
            $id = mysqli_real_escape_string($this->data->conn, $id);
            $sql = "UPDATE order_details SET status = '$status' WHERE order_detail_id = '$id'";
            return mysqli_query($this->data->conn, $sql);
        }

        public function view(){
            $this->data->connect();
            $sql = "SELECT * FROM `orders` 
                JOIN `order_details` ON `order_details`.`order_detail_id` = `orders`.`order_id` 
                JOIN `users` ON `users`.`user_id` = `orders`.`user_id`";
            return mysqli_query($this->data->conn, $sql);
        }

        public function viewDe($id){
            $this->data->connect();
            $sql = "SELECT `order_details`.`status`, `order_details`.`order_detail_id`,
            `users`.`username`, `users`.`address`, `users`.`email`, `users`.`phone`,
            `order_details`.`created_at`, `order_details`.`quantity`,
            `products`.`image`, `products`.`price`, `products`.`name`, `product_sizes`.`size_name`,
            `product_colors`.`color_name`,
            `coupouns`.`discount`, `order_details`.`payment`, `order_details`.`shipping`

            
            FROM `orders` 
                JOIN `order_details` ON `order_details`.`order_detail_id` = `orders`.`order_id` 
                JOIN `users` ON `users`.`user_id` = `orders`.`user_id`
                JOIN `products` on `products`.`product_id` = `order_details`.`product_id`
                JOIN `product_sizes` on `product_sizes`.`size_id` = `products`.`size_id`
                JOIN `product_colors` on `product_colors`.`color_id` = `products`.`color_id`
                left JOIN `coupouns` on `coupouns`.`product_id` = `products`.`product_id`
                WHERE `order_details`.`order_detail_id` = '$id'";
            return mysqli_query($this->data->conn, $sql);
        }

        
    }
