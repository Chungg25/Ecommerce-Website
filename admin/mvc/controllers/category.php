<?php
require_once "./mvc/models/categoryModel.php";
class category extends controller{

    protected $data;

    function __construct(){
        $this->data = new categoryModel();
    }

    static public function add(){
        self::view('pages/category/add',[]);
    }

    static public function addCategory($name){
        $instance = new self();
        $instance->add_category($name);
    }

    static public function viewDetail($id){
        $instance = new self();
        $view = $instance->viewDe($id);
        $data = [];
        while ($row = mysqli_fetch_assoc($view)) {
            $data[] = $row;
        }
        self::view('pages/category/view',$data);
    }

    static public function category(){
        $instance = new self();
        $view = $instance->viewCategory();
        $data = [];
        while ($row = mysqli_fetch_assoc($view)) {
            $data[] = $row;
        }
        self::view('pages/category/category',$data);
    }

    static public function remove($id){
        $instance = new self();
        $view = $instance->removeProduct($id);
    }

    static public function removeCate($id){
        $instance = new self();
        $view = $instance->remove_cate($id);
    }



    function viewCategory(){
        $result = $this->data->view();
        return $result;
    }

    function viewDe($id){
        $result = $this->data->viewDe($id);
        return $result;
    }

    function removeProduct($id){
        $this->data->remove_product($id);
    }

    function remove_cate($id){
        $this->data->remove_cate($id);
    }

    function add_category($name){
        $this->data->add($name);
    }



}