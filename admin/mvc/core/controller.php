<?php
class controller{
    static function view($view, $data=[]){
        include_once "./mvc/views/".$view.".php";
    }
}
?>