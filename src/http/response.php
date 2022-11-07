<?php

class Response{

    public $status;

    public function status($status){
        $newStatus = intval($status);
        $this->status = ($newStatus > 500 or $newStatus < 100) ? 500 : $newStatus ;
    }
    public function send($content){
        http_response_code($this->status ? $this->status : 200);
        echo json_encode($content);
        die();
    }
}