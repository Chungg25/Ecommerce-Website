<?php
require_once "./mvc/models/couponModel.php";
class coupon extends controller{

    protected $data;

    function __construct(){
        $this->data = new couponModel();
    }

    static public function add(){
        self::view('pages/coupon/add',[]);
    }

    static public function coupon(){
        $instance = new self();
        $result = $instance->viewDe();
        $data = [];
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        self::view('pages/coupon/coupon',$data);
    }

    public function viewDe(){
        return $this->data->view();
    }
}