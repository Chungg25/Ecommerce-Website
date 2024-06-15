<?php
require_once './mvc/models/homeModels.php';
class home extends controller{

    protected $home;
    public function __construct(){
        $this->home = new homeModels();
    }

    static public function index(){
        $is = new self();
        $view = $is->viewProducts();
        $data = [];
        while($row = mysqli_fetch_assoc($view)){
            $data[] = $row;
        }
        self::view('index', $data);
    }

    public function viewProducts(){
        return $this->home->view();
    }
}
?>