<?php
require_once '../src/repositories/IUserRepository.php';
require_once '../src/entities/user.php';

class Login{
    function __construct(
        public IUser $userImplementation
    ){}

    function execute(string $email, string $password){
        $user = $this->userImplementation->getByEmail($email);
        if($user == null) throw new Exception("User not found", 404);
        if($user['pass'] == $password){ 
            return $user;
        }
        throw new Exception('Wrong email or password.', 401);
    }
}