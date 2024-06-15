<?php 
    class checkoutModel extends database {
        protected $data;

        function __construct(){
            $this->data = new Database();
        }
        public function view($id){
            $this->data->connect();
            $sql = "SELECT orders.user_id
            FROM orders join products on orders.product_id = products.product_id
            WHERE orders.user_id = '$id'";
            return mysqli_query($this->data->conn, $sql);
        }
        public function viewDe($id){
            $this->data->connect();
            $sql = "SELECT products.image, products.name, categories.category_name, products.price, order_details.quantity
            FROM products 
                    join order_details on products.product_id = order_details.product_id
                    join categories on categories.category_id = products.category_id
                    join orders on products.product_id = orders.product_id
                    where orders.user_id = '$id'";
            return mysqli_query($this->data->conn, $sql);
        }
    }
?>