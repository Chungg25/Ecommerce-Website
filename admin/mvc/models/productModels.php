<?php

    class productModel extends database {

        protected $data;

        function __construct(){
            $this->data = new Database();
        }

        public function view(){
            $this->data->connect();
            $sql = "SELECT * FROM products join categories on products.category_id = categories.category_id
            left join coupouns on products.product_id = coupouns.product_id";
            
            return mysqli_query($this->data->conn, $sql);
        }

        public function update($id){
            $this->data->connect();
            $id = mysqli_real_escape_string($this->data->conn, $id);
            $sql = "UPDATE products SET flash = NOT flash WHERE product_id = '$id'";
            return mysqli_query($this->data->conn, $sql);
        }
        public function viewCategory(){
            $this->data->connect();
            $sql = "SELECT category_name FROM categories";
            return mysqli_query($this->data->conn, $sql);
        }
        
        public function add($data1){
            $this->data->connect();

            $jsonString = urldecode($data1);
            $data = json_decode($jsonString, true);

            $name = $data['name'];
            $category = 1;
            $price = $data['price'];
            $sale = $data['sale'];
            $isFlashSale = $data['isFlashSale'];
            $color = $data['color'];
            $size = $data['size'];
            $quantity = $data['quantity'];
            $image = "../mvc/assets/img/products/image.png";
            $stmt = $this->data->conn->prepare("INSERT INTO products (name, category_id, price, coupon_id, flash, color_id, size_id, quantity, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssss", $name, $category, $price, $sale, $isFlashSale, $color, $size, $quantity, $image);
            $stmt->execute();
        }

    }