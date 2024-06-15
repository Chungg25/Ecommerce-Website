<?php
    class orderModel extends database {

        protected $data;

        function __construct(){
            $this->data = new Database();
        }
        public function add($id, $product){
            $this->data->connect();
            $id = mysqli_real_escape_string($this->data->conn, $id);
            $product = mysqli_real_escape_string($this->data->conn, $product);
            $sql = "INSERT INTO orders (user_id, product_id, amount) 
            VALUES ('$id', '$product', 1)";
            return mysqli_query($this->data->conn, $sql);
        }
    
    }
?>