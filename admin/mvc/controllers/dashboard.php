<?php
require_once "./mvc/models/dashboardModel.php";
class dashboard extends controller{
    
    protected $data;

    function __construct(){
        $this->data = new dasboardModels();
    }

    static public function index(){
        $instance = new self();

        $data = [
            "product" => $instance->product(),
            "order" => $instance->order(),
            "revenue" => $revenue = $instance->revenue(),
            "status" => $instance->status()
        ];
        self::view('index',$data);
    }

    public function product(){
        $result = $this->data->product();
        return $result;
    }

    public function order(){
        $result = $this->data->order();
        $row = mysqli_fetch_array($result);
        return $row[0];
    }

    public function revenue(){
        $result = $this->data->revenue();
        $row = mysqli_fetch_array($result);
        return $row[0];
    }

    public function status(){
        $result = $this->data->order_status();        
        return $result;
    }


}