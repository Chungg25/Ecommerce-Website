<?php

class app {

    protected $controller="login";
    protected $action="login";
    protected $params=[];

    function __construct() {
        require_once "./" . DIRECTORY_SEPARATOR . "mvc" . DIRECTORY_SEPARATOR . "controllers" . DIRECTORY_SEPARATOR . 'dashboard.php';
        $arr = $this->url_process();
        if (is_array($arr) && count($arr) > 0) {
            $controllerPath = "./" . DIRECTORY_SEPARATOR . "mvc" . DIRECTORY_SEPARATOR . "controllers" . DIRECTORY_SEPARATOR . $arr[0] . ".php";
            if(file_exists($controllerPath)){
                $this->controller = $arr[0];
                unset($arr[0]);
            }
        }
        require_once "./" . DIRECTORY_SEPARATOR . "mvc" . DIRECTORY_SEPARATOR . "controllers" . DIRECTORY_SEPARATOR . $this->controller . ".php";
        
        if(isset($arr[1])){
            if(method_exists($this->controller, $arr[1])){
                $this->action = $arr[1];
                unset($arr[1]);
            }
        }
        
        $this->params = $arr?array_values($arr):[];

        if(count($this->params) != 0 && $this->params[0] == "fail"){
            $this->params = ["Login Fail"];
        }

        if($this->action == "login"){
            call_user_func_array(["login", "login"], $this->params);
        }
        else {
            call_user_func_array(["dashboard", "index"], $this->params);
        }

    }

    function url_process(){
        if (isset($_GET['url'])) {
            return explode("/", filter_var(rtrim($_GET['url'], "/"), FILTER_SANITIZE_URL));
        }
    }

    public function getAction() {
        return $this->action;
    }

    public function getController() {
        return $this->controller;
    }

    public function getParams() {
        return $this->params;
    }


}
?>