<?php
require_once '../src/repositories/IUserRepository.php';
require_once '../src/entities/user.php';

class GetUser{

    function __construct(
        public iUser $userImplementation
    ){}
    function get(String $username){
        $user = $this->userImplementation->get($username);
        if($user == null) throw new Exception('User not registered', 401);
        return $user;
    }
}