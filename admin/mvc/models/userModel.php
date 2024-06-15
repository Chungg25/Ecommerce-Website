<?php
    class userModel extends database {

        protected $data;

        function __construct(){
            $this->data = new Database();
        }

        public function view(){
            $this->data->connect();
            $sql = "SELECT * FROM users";
            return mysqli_query($this->data->conn, $sql);
        }

        public function remove($userId){
            $this->data->connect();
            $sql = "DELETE FROM users WHERE user_id = $userId";
            return mysqli_query($this->data->conn, $sql);
        }

        public function edit($userId){
            $this->data->connect();
            $sql = "SELECT * FROM users WHERE user_id = $userId";
            return mysqli_query($this->data->conn, $sql);
        }

        public function update_user($data1){
            $this->data->connect();

            $jsonString = urldecode($data1);
            $data = json_decode($jsonString, true);

            $userId = $data['id'];
            $name = $data['name'];
            $email = $data['email'];
            $mobile = $data['mobile'];
            $role = $data['role'];
            
            $stmt = $this->data->conn->prepare("UPDATE users SET username = ?, email = ?, phone = ?, authority = ? WHERE user_id = ?");
            $stmt->bind_param("sssss", $name, $email, $mobile, $role, $userId);
            $stmt->execute();
        }

        public function updateActive($userId){
            $this->data->connect();
            $sql = "UPDATE users SET is_active = IF(is_active=1, 0, 1) WHERE user_id = $userId";
            return mysqli_query($this->data->conn, $sql);
        }

        public function addUser($data1){
            $this->data->connect();

            $jsonString = urldecode($data1);
            $data = json_decode($jsonString, true);

            $name = $data['name'];
            $email = $data['email'];
            $pass = $data['password'];
            $mobile = isset($data['mobile']) ? $data['mobile'] : null;
            $role = $data['role'];

            $stmt = $this->data->conn->prepare("INSERT INTO users (username, email, phone, password, authority) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $name, $email, $mobile, $pass, $role);
            $stmt->execute();
        }

    }