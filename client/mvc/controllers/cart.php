<?php
require_once './mvc/models/cartModel.php';

 class cart extends controller{

    protected $cart;

    public function __construct(){
        $this->cart = new cartModel();
    }
        static public function cart($id){
            $is = new self();
            $view = $is->viewFu($id);
            $data = [];
            while($row = mysqli_fetch_assoc($view)){
                $data[] = $row;
            }
            self::view('pages/cart/cart',$data);
        }

        public function viewFu($id){
            return $this->cart->viewFu($id);
        }
        

        static public function viewIn($user,$product){
            $is = new self();
            $productId = base64_decode($product);
            $view = $is->viewFo($productId);
            $data = mysqli_fetch_array($view);
            self::view('pages/sproduct/sproduct',$data);
        }

        public function viewFo($product){
            return $this->cart->view($product);
        }

        static function add(...$data){
            $result = array();
            foreach ($data as $item) {
                list($key, $value) = explode('=', $item);
                $result[$key] = $value;
            }
            $is = new self();
            $is->addCart($result);
        }

        public function addCart($data){
            $this->cart->add($data);
        }

        static public function remove($id){
            $is = new self();
            $is->removeCart($id);
        }

        public function removeCart($id){
            $this->cart->remove($id);
        }
    }
?>