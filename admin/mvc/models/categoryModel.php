<?php
    class categoryModel extends database {

        protected $data;

        function __construct(){
            $this->data = new Database();
        }

        public function view(){
            $this->data->connect();
            $sql = "SELECT categories.category_name, categories.category_id, SUM(products.quantity) as sum
                    FROM categories 
                    LEFT JOIN products ON categories.category_id = products.category_id 
                    GROUP BY categories.category_id";
            return mysqli_query($this->data->conn, $sql);
        }

        public function viewDe($id){
            $this->data->connect();
            $sql = "SELECT * FROM products WHERE products.category_id = '$id'";
            return mysqli_query($this->data->conn, $sql);
        }

        public function remove_product($id){
            $this->data->connect();
            $sql = "DELETE FROM products WHERE product_id = '$id' and quantity = 0";
            return mysqli_query($this->data->conn, $sql);
        }

        public function remove_cate($id){
            // $this->data->connect();
            // $sql = "DELETE FROM categories WHERE category_id = '$id'";
            // return mysqli_query($this->data->conn, $sql);
            $this->data->connect();
            $sql = "DELETE FROM categories 
                    WHERE category_id = '$id' 
                    AND '$id' IN (
                        SELECT categories.category_id
                        FROM categories 
                        LEFT JOIN products ON categories.category_id = products.category_id 
                        GROUP BY categories.category_id
                        HAVING COALESCE(SUM(products.quantity), 0) = 0
                    )";
            return mysqli_query($this->data->conn, $sql);
        }

        public function add($name){
            $this->data->connect();
            $stmt = $this->data->conn->prepare("INSERT INTO categories (category_name) VALUES (?)");
            $stmt->bind_param("s", $name);
            $stmt->execute();
        }

    }
