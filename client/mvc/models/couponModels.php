<?php
    class coupon extends database {
        protected $data;

        function __construct(){
            $this->data = new Database();
        }
        

        public function addCoupon($coupon_code){
            $this->data->connect();
            $sql = "SELECT * from coupons where counpon_code = '$coupon_code'
        ";
            return mysqli_query($this->data->conn, $sql);
        }
    }
?>