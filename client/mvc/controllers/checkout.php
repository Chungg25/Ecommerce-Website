<?php
require_once './mvc/models/checkoutModel.php';

    class checkout extends controller{
        protected $data; 

        
        function __construct(){
            $this->data = new checkoutModel();
        }

        static public function checkout($id){
            $is = new self();
            $view = $is->viewIn($id);
            $data = mysqli_fetch_array($view);
            $view1 = $is->viewDe($id);
            $data1 = [];
            while($row = mysqli_fetch_assoc($view1)){
                $data1[] = $row;
            }
            $bigData = [
                'data' => $data,
                'data1' => $data1
            ];
            self::view('pages/checkout/checkout', $bigData);
        }

        public function viewDe($id){
            return $this->data->viewDe($id);
        }
        public function viewIn($id){
            return $this->data->view($id);
        }
        
    }
?>