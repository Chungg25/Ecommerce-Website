<?php
require_once "./mvc/models/productModels.php";
class product extends controller{

    protected $data; 

    function __construct(){
        $this->data = new productModel();
    }

    static public function add(){
        $is = new self();
        $view = $is->viewCategory();
        $data = [];
        if ($view !== null) {
            while ($row = mysqli_fetch_array($view)) {
                $data[] = $row;
            }
        }
        self::view('pages/product/add',$data);
    }

    static public function edit(){
    self::view('pages/product/edit',[]);
    }

    static public function update_flash($id){
    $instance = new self();
    $instance->update($id);
    }

    static public function product(){
    $instance = new self();
    $view = $instance->viewProduct();
    $data = [];
    while ($row = mysqli_fetch_assoc($view)) {
    $data[] = $row;
    }
    self::view('pages/product/product',$data);
    }

    public function viewProduct(){
    return $this->data->view();
    }

    public function update($id){
    $this->data->update($id);
    }
    public function viewCategory(){
    return $this->data->viewCategory();
    }

    static function addProduct($data){
        $instance = new self();
        $view = $instance->add_product($data);
    }

    public function add_product($data){
        return $this->data->add($data);
        }


    }