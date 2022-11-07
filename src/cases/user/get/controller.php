<?php
require_once './src/cases/user/get/get.php';
require_once './src/entities/user.php';
require_once './src/utils/checkKeys.php';


class GetController{

    function __construct(
        public GetUser $getUser,
    ){}

    function execute($req, $res){
        try{
            $username = array_key_exists('username', $req->params) ? $req->params['username'] : null;
            if($username == null){
                throw new Exception('Missing credentials', 406);
            }
            $user = $this->getUser->get($username);
            $res->send($user);
        }catch(Exception $e){  
            $res->status(($e->getCode()));
            $res->send(['message' => $e->getMessage()]);
        }
    }
}