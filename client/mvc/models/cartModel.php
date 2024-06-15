<?php
    class cartModel extends database {

        protected $data;

        function __construct(){
            $this->data = new Database();
        }

        public function view($id){
            $this->data->connect();
            $sql = "SELECT * FROM products INNER JOIN categories ON products.category_id = categories.category_id WHERE product_id = '$id'";
            return mysqli_query($this->data->conn, $sql);
        }

        public function add($data){
            $this->data->connect();
            $sql = "INSERT INTO cart (user_id, product_id, size, color, quantity, price) VALUES ('$data[user_id]', '$data[product_id]', '$data[size]', '$data[color]', '$data[quantity]', '$data[price]')";
            return mysqli_query($this->data->conn, $sql);
        }

        public function viewFu($id){
            $this->data->connect();
            $sql = "SELECT cart.cart_id, products.image, products.name, products.price, cart.quantity FROM cart
            INNER JOIN products ON cart.product_id = products.product_id WHERE cart.user_id = '$id'";
            return mysqli_query($this->data->conn, $sql);
        }
        
        public function remove($id){
            $this->data->connect();
            $sql = "DELETE FROM cart
            WHERE cart_id = '$id' ";
            return mysqli_query($this->data->conn, $sql);
        }
    }
?>