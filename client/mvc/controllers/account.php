<?php
require_once './mvc/models/accountModel.php';

    class account extends controller{

        protected $data; 

        
        function __construct(){
            $this->data = new accountModel();
        }
        
        static public function account($id){
            $is = new self();
            $view = $is->viewIn($id);
            $data = mysqli_fetch_array($view);
            $view1 = $is->my_order($id);
            $data1 = [];
            while($row = mysqli_fetch_assoc($view1)){
                $data1[] = $row;
            }
            $bigData = [
                'data' => $data,
                'data1' => $data1
            ];
            self::view('pages/account/account', $bigData);
        }

        public function viewIn($id){
            return $this->data->view($id);
        }

        static public function update(...$data){
            $result = [];
            foreach ($data as $item) {
                list($key, $value) = explode('=', $item);
                $result[$key] = $value;
            }
            $is = new self();
            $view = $is->updateIn($result);
        }

        public function updateIn($data){
            return $this->data->update($data);
        }
       
        public function my_order($id){
            return $this->data->myorder($id);
        }
        static public function my_orderIn(){
            $is = new self();
            $view = $is->my_order($id);
            $data = [];
            while($row = mysqli_fetch_assoc($view)){
                $data[] = $row;
            }
            self::view('pages/account/account', $data);
        }
    }
?>