<?php
require_once './src/repositories/IUserRepository.php';
require_once './src/entities/user.php';
require_once './src/DTOs/userDTO.php';

class CreateUser{

    function __construct(
        public iUser $userImplementation
    ){}
    function save(UserInputDTO $userDto){
        $checkUsername = $this->userImplementation->get($userDto->username);
        $checkUser = $this->userImplementation->get($userDto->email);

        if($checkUsername != null) throw new Exception('Username already registered', 401);
        if($checkUser != null) throw new Exception('User already registered', 401);
        
        $user = new User($userDto);

        return $this->userImplementation->save($user);
    }
}