<?php
    class accountModel extends database {

        protected $data;

        function __construct(){
            $this->data = new Database();
        }

        public function view($id){
            $this->data->connect();
            $sql = "SELECT * FROM users WHERE user_id = '$id'";
            return mysqli_query($this->data->conn, $sql);
        }
        
        public function update($data){
            $this->data->connect();
            $sql = "UPDATE users SET phone = '{$data['phone']}', username = '{$data['username']}', email = '{$data['email']}' 
                        WHERE user_id = '{$data['dataId']}'";
            return mysqli_query($this->data->conn, $sql);
        }
        public function myorder($id){
            $this->data->connect();
            $sql = "SELECT products.image, products.name, categories.category_name, products.price, order_details.quantity, order_details.created_at, order_details.status
                    FROM products 
                    join order_details on products.product_id = order_details.product_id
                    join categories on categories.category_id = products.category_id
                    join orders on products.product_id = orders.product_id
                    where order_details.status = 'Da giao' and  orders.user_id = '$id'";
            return mysqli_query($this->data->conn, $sql);
        }

}
?>