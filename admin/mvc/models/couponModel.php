<?php
    class couponModel extends database {

        protected $data;

        function __construct(){
            $this->data = new Database();
        }

        public function view(){
            $this->data->connect();
            $sql = "SELECT * FROM coupouns";
            return mysqli_query($this->data->conn, $sql);
        }
    
    }

?>