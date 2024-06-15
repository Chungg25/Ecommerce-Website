<?php
    class shopModels extends database {
        public function view(){
            $a = new Database();
            $a->connect();
            $sql = "SELECT * FROM products";
            return mysqli_query($a->conn, $sql);
        }
        public function getPagination($current_page,$s,$e) { 
            $a = new Database();
            $a->connect();
            $products_per_page = 6;
            $offset = ($current_page - 1) * $products_per_page;

            $sql = "SELECT COUNT(*) as total_products FROM products";
            $result = $a->conn->query($sql);
            $total_products = $result->fetch_assoc()['total_products'];
            $total_pages = ceil($total_products / $products_per_page);
        
            $stmt = $a->conn->prepare("SELECT * FROM products WHERE price >= ? and price <= ? order by price LIMIT ?, ? ");
            $stmt->bind_param("iiii", $s, $e, $offset, $products_per_page);
          
            $stmt->execute();
            $result = $stmt->get_result();

            $products = $result->fetch_all(MYSQLI_ASSOC);

            $a->conn->close();
            return [$products, $total_pages];
        }

        
}
?>