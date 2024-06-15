<?php
class app {

    protected $controller="home";
    protected $action="index";
    protected $params=[];

    function __construct() {
        $arr = $this->url_process();
        require_once "./" . DIRECTORY_SEPARATOR . "mvc" . DIRECTORY_SEPARATOR . "controllers" . DIRECTORY_SEPARATOR ."login.php";
        require_once "./" . DIRECTORY_SEPARATOR . "mvc" . DIRECTORY_SEPARATOR . "controllers" . DIRECTORY_SEPARATOR ."home.php";
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

        if($this->controller == "login" && $this->action == "index"){
            $this->action = "login";
        }

        $this->params = $arr?array_values($arr):[];

        if(count($this->params) != 0 && $this->params[0] == "failed"){
            $this->params = ["Login Fail"];
        }

        if($this->action == "login"){
            call_user_func_array(["login", "login"], $this->params);
        }
        elseif($this->action == "registration"){
            require_once "./" . DIRECTORY_SEPARATOR . "mvc" . DIRECTORY_SEPARATOR . "controllers" . DIRECTORY_SEPARATOR ."registration.php";
            call_user_func_array(["registration", "registration"], $this->params);
        }
        elseif($this->action == "forgotpassword"){
            require_once "./" . DIRECTORY_SEPARATOR . "mvc" . DIRECTORY_SEPARATOR . "controllers" . DIRECTORY_SEPARATOR ."forgotpassword.php";
            call_user_func_array(["forgotpassword", "forgotpassword"], $this->params);
        }
        elseif($this->action == "resetcode"){
            require_once "./" . DIRECTORY_SEPARATOR . "mvc" . DIRECTORY_SEPARATOR . "controllers" . DIRECTORY_SEPARATOR ."resetcode.php";
            call_user_func_array(["resetcode", "resetcode"], $this->params);
        }
        elseif($this->action == "changepass"){
            require_once "./" . DIRECTORY_SEPARATOR . "mvc" . DIRECTORY_SEPARATOR . "controllers" . DIRECTORY_SEPARATOR ."changepass.php";
            call_user_func_array(["changepass", "changepass"], $this->params);
        }elseif($this->action=="successOrder"){
            require_once "./" . DIRECTORY_SEPARATOR . "mvc" . DIRECTORY_SEPARATOR . "controllers" . DIRECTORY_SEPARATOR ."successOrder.php";
            call_user_func_array(["successOrder", "successOrder"], $this->params);
        }
        else {
            call_user_func_array(["home", "index"], $this->params);
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