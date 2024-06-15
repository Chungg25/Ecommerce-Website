<?php
require_once "./mvc/models/userModel.php";
class user extends controller{

    protected $data;

    function __construct(){
        $this->data = new userModel();
    }

    static public function add(){
        self::view('pages/user/add',[]);
    }

    static public function user(){
        $instance = new self();
        $view = $instance->viewUser();
        $data = [];
        while ($row = mysqli_fetch_assoc($view)) {
            $data[] = $row;
        }
        self::view('pages/user/user',$data);
    }

    static public function remove($userId){
        $instance = new self();
        $view = $instance->removeUser($userId);
    }

    static public function updateActive($userId){
        $instance = new self();
        $view = $instance->update_active($userId);
    }

    static public function edit($userId){
        $instance = new self();
        $view = $instance->editUser($userId);
        self::view('pages/user/edit', mysqli_fetch_assoc($view));
    }

    static public function update($data){
        $instance = new self();
        $view = $instance->updateUser($data);
    }

    static public function addUser($data){
        $instance = new self();
        $view = $instance->add_user($data);
    }

    function viewUser(){
        $result = $this->data->view();
        return $result;
    }

    function removeUser($userId){
        $this->data->remove($userId);
    }

    function editUser($userId){
        $result = $this->data->edit($userId);
        return $result;
    }

    function update_active($userId){
        $this->data->updateActive($userId);
    }

    function updateUser($data){
        $this->data->update_user($data);
    }

    function add_user($data){
        $this->data->addUser($data);
    }
}