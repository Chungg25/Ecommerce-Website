<?php
require_once './mvc/models/shopModels.php';

 class shop extends controller{

    protected $shop;
    public function __construct(){
        $this->shop = new shopModels();
    }

    static public function shop($id=1,$s=0,$e=200){  
        $current_page = substr($id, -1);
        $is = new self();
        $view = $is->viewProducts($current_page,$s,$e);
        list($products, $total_pages) = $view;
        $data = [
            "product" => $products,
            "total_pages" => $total_pages,
            "s" => $s,
            "e" => $e
        ];
        self::view('pages/shop/shop', $data);
    }

    public function viewProducts($current_page,$s,$e){
        return $this->shop->getPagination($current_page,$s,$e);
    }

}
?>