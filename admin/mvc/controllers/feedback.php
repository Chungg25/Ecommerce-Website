<?php
class feedback extends controller{

    static public function feedback(){
        self::view('pages/feedback/feedback',[]);
    }

    static public function detail(){
        self::view('pages/feedback/feedback-detail',[]);
    }
}